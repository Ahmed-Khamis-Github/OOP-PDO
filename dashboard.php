<?php include('inc/header.php') ; ?>

<?php
 
 if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location:/day1/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITI</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Hello <?php echo $_SESSION["name"] ?></h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Country</th>
                    <th>Gender</th>
                    <th>Skills</th>
                    <th>Username</th>
                    <th>Department</th>
                    <th>image</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $pdo = new PDO("mysql:host=localhost;dbname=iti", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $pdo->query("SELECT iti.*, GROUP_CONCAT(skills.skill_name) AS user_skills FROM iti 
LEFT JOIN skills ON iti.id = skills.user_id GROUP BY iti.id");
                while ($row = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row['first_name'] . "</td>";
                    echo "<td>" . $row['last_name'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['country'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";

                    $skills = $row['user_skills'];
                    if ($skills) {
                        echo "<td>" . $skills . "</td>";
                    } else {
                        echo "<td></td>";
                    }

                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";

                     echo "<td>";
                    if ($row['profile_image']) {
                        echo "<img src='uploads/" . $row['profile_image'] . "' alt='Profile Image' width='50'>";
                    } else {
                        echo "No Image";
                    }
                    echo "</td>";

                    echo "<td>";
                    echo "<div class='btn-group' role='group'>";
                    echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-primary'>Edit</a>";
                    echo "<a href='handler/hdelete.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>";
                    echo "<a href='view.php?id=" . $row['id'] . "' class='btn btn-success'>View</a>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
                $pdo = null;
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>