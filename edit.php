
<?php include('inc/header.php') ; ?>

<?php include 'handler/hedit.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit Record</h2>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required value="<?php echo $row['first_name']; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required value="<?php echo $row['last_name']; ?>">
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="4" required><?php echo $row['address']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country" name="country" required>
                    <option value="Egypt" <?php if ($row['country'] == 'Egypt') echo 'selected'; ?>>EG</option>
                    <option value="USA" <?php if ($row['country'] == 'USA') echo 'selected'; ?>>USA</option>
                    <option value="Canada" <?php if ($row['country'] == 'Canada') echo 'selected'; ?>>Canada</option>
                    <option value="UK" <?php if ($row['country'] == 'UK') echo 'selected'; ?>>UK</option>
                </select>
            </div>

            <div class="form-group">
                <label>Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?> required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?> required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>

            <div class="form-group">
                <label for="skills">Skills</label>
                <select class="form-control" id="skills" name="skills[]" multiple required>
                    <option value="PHP" <?php if (in_array('PHP', $skills)) echo 'selected'; ?>>PHP</option>
                    <option value="HTML" <?php if (in_array('HTML', $skills)) echo 'selected'; ?>>HTML</option>
                    <option value="CSS" <?php if (in_array('CSS', $skills)) echo 'selected'; ?>>CSS</option>
                    <option value="JavaScript" <?php if (in_array('JavaScript', $skills)) echo 'selected'; ?>>JavaScript</option>
                </select>
            </div>


            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required value="<?php echo $row['username']; ?>">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required value="<?php echo $row['password']; ?>">
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="<?php echo $row['department']; ?>" readonly>
            </div>

            <button type="submit" class="btn btn-primary">submit</button> 
            <!-- <a href="handler/hedit.php" class="btn btn-primary" >Update</a> -->
        </form>

    </div>
</body>

</html>





 