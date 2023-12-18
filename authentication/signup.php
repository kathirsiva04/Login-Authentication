<?php
session_start();
include("db.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $gender=$_POST['gen'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $hashedpassword=password_hash($password,PASSWORD_DEFAULT);
    if(!empty($email) && !empty($hashedpassword)){
        $query="insert into form1(fname,lname,gen,email,password) values('$firstname','$lastname','$gender','$email','$hashedpassword')";
        mysqli_query($conn,$query); 
       echo"<script type='text/javascript'>alert('successfully registered')</script>";
    }

    else{
        echo"<script type='text/javascript'>alert('Invalid Information')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="sign-up">
        <h1>Sign Up</h1>
        <form method="post">
            <label>First Name</label>
            <input type="text" name="fname" required>
            <label>Last Name</label>
            <input type="text" name="lname" required>
            <label>Gender</label>
            <input type="text" name="gen" required>
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input id="sub" type="submit" value="submit"> 
        </form>
        <p>Already having account?<a href="login.php">Login</a></p>

    </div>
</body>
</html>