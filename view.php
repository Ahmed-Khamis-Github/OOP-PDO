<?php include('inc/header.php') ; ?>

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <div class="container mt-5">
        <h2>View Record</h2>
        <table class="table table-bordered">
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>First Name</td>
                <td><?php echo $row['first_name']; ?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $row['last_name']; ?></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><?php echo $row['address']; ?></td>
            </tr>
            <tr>
                <td>Country</td>
                <td><?php echo $row['country']; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $row['gender']; ?></td>
            </tr>
            <tr>
                <td>Skills</td>
                <td>
                    <?php
                    if (!empty($skills)) {
                        echo implode(', ', $skills);
                    } else {
                        echo "-";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo $row['username']; ?></td>
            </tr>
            <tr>
                <td>Department</td>
                <td><?php echo $row['department']; ?></td>
            </tr>
        </table>
        <a href="dashboard.php" class="btn btn-secondary">Back to List</a>
    </div>
</body>

</html>