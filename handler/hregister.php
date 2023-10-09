
<?php

include 'functions.php';
session_start() ;

$errors = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
         foreach ($_POST as $key => $value) {


            $$key = sanitizeInput($value);
        }


        if(requiredVal($firstname)){
            $errors['firstname']= "firstname is required"  ;
         }

         if(requiredVal($lastname)){
            $errors['lastname']= "lastname is required"  ;
         } 
         if(requiredVal($address)){
            $errors['address']= "address is required"  ;
         }

         if(requiredVal($gender)){
            $errors['gender']= "gender is required"  ;
         } 
         if(requiredVal($email)){
            $errors['email']= "email is required"  ;
         } elseif(!emailVal($email)){
             $errors['email']= "please enter a valid email"  ;

         }

         if(requiredVal($username)){
            $errors['username']= "username is required"  ;
         } elseif(minVal($username,3)){
            $errors['username']="name must be greater than 3 chars" ;
         }

         if(requiredVal($password)){
            $errors['password']= "password is required"  ;
         } elseif(minVal($password,8)){
            $errors['password']="password must be greater than 8 chars" ;
         }



        $pdo = new PDO("mysql:host=localhost;dbname=iti", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $profileImage = $_FILES['profileImage']['name'];
        $uploadDirectory = "uploads/";
        $targetFilePath = $uploadDirectory . basename($profileImage);
        move_uploaded_file($_FILES['profileImage']['tmp_name'], $targetFilePath);

        if(empty($errors)){

        $stmt = $pdo->prepare("INSERT INTO iti (first_name, last_name, address, country, gender,email, username, password, department, profile_image) 
         VALUES (:firstname, :lastname, :address, :country, :gender,:email, :username, :password, :department, :profileImage)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':country', $_POST['country']);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':username', $gender);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':department', $_POST['department']);
        $stmt->bindParam(':profileImage', $profileImage);
        $stmt->execute();
        $lastUserId = $pdo->lastInsertId();
        var_dump($lastUserId) ;
      //   $skillsStmt = $pdo->prepare("INSERT INTO skills (user_id, skill_name) VALUES (:user_id, :skill_name)");
      //   foreach ($_POST['skills'] as $skill) {
      //       $skillsStmt->bindParam(':user_id', $lastUserId);
      //       $skillsStmt->bindParam(':skill_name', $skill);
      //       $skillsStmt->execute();
      //   }

    }else{
        $_SESSION['errors']=$errors ;
        redirect("/day1/register.php") ;
        die() ;
     }
        $pdo = null;
      //   header("Location:/day1/dashboard.php");

        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

