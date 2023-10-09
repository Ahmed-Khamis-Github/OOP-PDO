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
        header("Location:/day1/view.php");

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>