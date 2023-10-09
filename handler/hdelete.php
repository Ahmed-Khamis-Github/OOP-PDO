<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=iti", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("DELETE FROM iti WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $pdo = null;
        header("Location: /day1/dashboard.php"); 
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
