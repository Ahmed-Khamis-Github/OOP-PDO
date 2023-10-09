<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=iti", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("SELECT * FROM iti WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            echo "Record not found.";
            exit();
        }
        $skillsStmt = $pdo->prepare("SELECT skill_name FROM skills WHERE user_id = :id");
        $skillsStmt->bindParam(':id', $id);
        $skillsStmt->execute();
        $skills = $skillsStmt->fetchAll(PDO::FETCH_COLUMN);

     } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=iti", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("UPDATE iti SET first_name = :firstname, last_name = :lastname, address = :address, 
                               country = :country, gender = :gender , username = :username, 
                               password = :password, department = :department WHERE id = :id");
        $stmt->bindParam(':id', $_POST['id']);
        $stmt->bindParam(':firstname', $_POST['firstname']);
        $stmt->bindParam(':lastname', $_POST['lastname']);
        $stmt->bindParam(':address', $_POST['address']);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':gender', $_POST['gender']);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':department', $_POST['department']);
        $stmt->execute();
        $id = $_POST['id'];
        $skills = $_POST['skills'];
        $deleteSkillsStmt = $pdo->prepare("DELETE FROM skills WHERE user_id = :id");
        $deleteSkillsStmt->bindParam(':id', $id);
        $deleteSkillsStmt->execute();
        $insertSkillsStmt = $pdo->prepare("INSERT INTO skills (user_id, skill_name) VALUES (:id, :skill)");
        foreach ($skills as $skill) {
            $insertSkillsStmt->bindParam(':id', $id);
            $insertSkillsStmt->bindParam(':skill', $skill);
            $insertSkillsStmt->execute();
        }
        $pdo = null;
        header("Location: dashboard.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>