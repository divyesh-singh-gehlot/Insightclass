<?php
session_start();
require 'config.php';

if (isset($_POST["submit"])) {
    $facultyid = $_POST["facultyid"];
    $password = $_POST["password"];
    $result=mysqli_query($conn , "SELECT * FROM faculty_user WHERE faculty_id=$facultyid");

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if ($password==$row["password"]) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: dashboard-t.php");
        } 
        else {
            echo "<script>alert('Wrong Password!');</script>";
        }
    } else {
        echo "<script>alert('No Account found! Register First.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Login - InsightClass</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="section-1">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <h1 class="logo-text">InsightClass</h1>
                </div>
                <div class="nav-links">
                    <ul><a href="../homepage.html">Home</a></ul>
                    <ul>Contact</ul>
                    <ul><button class="login"><a href="registeration-t.php">Register</a></button></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="login-form">
        <h2>Teacher Login</h2>
        <form action="" method="POST" class="form" autocomplete="off">
            <label for="facultyid">Faculty ID:</label>
            <input type="text" id="facultyid" name="facultyid" required>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required>

            <div class="button-teacher">
                <button type="submit" class="register" name="submit">Login</button>
            </div>

            <h4>New to InsightClass? <a href="registeration-t.php">Register as a Teacher</a></h4>
            <h4>Not a teacher? <a href="login-s.php">Sign in</a> as Student.</h4>
        </form>
    </div>

    <footer class="registeration-t-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
