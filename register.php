<?php include('inc/header.php') ; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">

 

        <form action="handler/hregister.php" method="POST" enctype="multipart/form-data" class="mb-4">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
                <?php if (isset($_SESSION['errors']['firstname'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['firstname'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <?php if (isset($_SESSION['errors']['lastname'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['lastname'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="4"></textarea>
                <?php if (isset($_SESSION['errors']['address'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['address'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <select class="form-control" id="country" name="country">
                    <option value="Egypt">EG</option>
                    <option value="usa">USA</option>
                    <option value="Canada">Canada</option>
                    <option value="united kingdom">UK</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">Female</label>
                </div>
                <?php if (isset($_SESSION['errors']['gender'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['gender'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="skills">Skills</label>
                <select class="form-control" id="skills" name="skills[]" multiple required>
                    <option value="PHP">PHP</option>
                    <option value="HTML">HTML</option>
                    <option value="CSS">CSS</option>
                    <option value="JavaScript">JavaScript</option>
                </select>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
                <?php if (isset($_SESSION['errors']['username'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['username'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>



            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <?php if (isset($_SESSION['errors']['email'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['email'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <?php if (isset($_SESSION['errors']['password'])) : ?>

                    <div class="alert alert-danger" role="alert">
                        <?php echo $_SESSION['errors']['password'] ?>
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" value="IT" readonly>
            </div>
            <div class="form-group">
                <label for="profileImage">Profile Image</label>
                <input type="file" class="form-control-file" id="profileImage" name="profileImage">
            </div>

            <div class="form-group">
                <label for="code">Enter the Code Sh68sa</label>
                <input type="text" class="form-control" id="code" name="code">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </form>
        <?php unset($_SESSION['errors']); ?>
    </div>
</body>

</html>