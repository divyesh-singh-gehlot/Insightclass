<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $rollnumber = $_POST["rollNumber"];
    $fullname = $_POST["fullName"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmPassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM student_user WHERE roll_number='$rollnumber'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Roll number already exists');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO student_user (roll_number, full_name, password) VALUES ('$rollnumber', '$fullname', '$password')";
            $query2 = "INSERT INTO student_marks (roll_number) VALUES ('$rollnumber')";
            mysqli_query($conn, $query2);
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful!');</script>";
        } else {
            echo "<script>alert('Password does not match :(');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration - InsightClass</title>
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
                    <ul>About</ul>
                    <ul><button class="login"><a href="login-s.php">Login</a></button></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="registration-form">
        <h2>Student Registration</h2>
        <form action="" autocomplete="off" method="POST" class="form">

            <label for="rollNumber">Roll Number:</label>
            <input type="text" id="rollNumber" name="rollNumber" required>

            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="password">Password:</label>
            <input type="TEXT" id="password" name="password" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="text" id="confirmPassword" name="confirmPassword" required>

            <div class="button-student">
                <button type="submit" class="register" name="submit">Register</button>
            </div>

            <h4>Already Registered? <a href="login-s.php">Login</a></h4>
            <h4>Not a student? <a href="registeration-t.php">Register</a> as Teacher</h4>
        </form>
    </div>

    <footer class="registeration-s-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>


