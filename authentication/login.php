<?php
session_start();
include("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM form1 WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if (password_verify($password, $user_data['pass'])) {
                header("location: index.php");
                exit;
            } else {
                echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
            }
        } else {
            echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Please enter both email and password')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <label>Email</label>
            <input type="email" name="email" required>
            <label>Password</label>
            <input type="password" name="pass" required>
            <input id="sub" type="submit" value="submit">
        </form>
        <p>Create an account  <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>