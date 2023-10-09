 <!doctype html>
 <?php session_start() ; ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>php project</title>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">ITI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <?php
 
            if (! isset($_SESSION["loggedin"])) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">login</a>
                </li>
            <?php endif  ?>

    <?php            if ( !isset($_SESSION["loggedin"])) : ?>

            <li class="nav-item">
                <a class="nav-link" href="register.php">register</a>
            </li>
            <?php endif  ?>

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">dashboard</a>
            </li>
        </ul>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) : ?>

        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="handler/hlogout.php">logout</a>
            </li>
        </ul>
        <?php endif  ?>


    </div>
</nav>