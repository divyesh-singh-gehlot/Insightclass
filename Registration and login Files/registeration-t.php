<?php
require 'config.php';
if (isset($_POST["submit"])) {
    $facultyid = $_POST["facultyid"];
    $facultycode = $_POST["faculty_code"];
    $fullname = $_POST["fullName"];
    $password = $_POST["password"];
    $department = $_POST["department"];
    $confirmpassword = $_POST["confirmPassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM faculty_user WHERE faculty_id='$facultyid'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Faculty ID already exists');</script>";
    } else {
        if ($password == $confirmpassword) {
            if($facultycode == 8085){
                $query = "INSERT INTO faculty_user (faculty_id, full_name, password, department, faculty_code) VALUES ('$facultyid', '$fullname', '$password', '$department', '$facultycode')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Successful!');</script>";
            }
            else{
                echo "<script>alert('You are not a faculty!');</script>";
            }
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
    <title>Teacher Registration - InsightClass</title>
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
                    <ul><button class="login"><a href="login-t.php">Login</a></button></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="registration-form">
        <h2>Teacher Registration</h2>
        <form action="" method="POST" class="form" autocomplete="off">
            <!-- Basic Information -->
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>
            <label for="facultyid">Faculty Id:</label>
            <input type="text" id="facultyid" name="facultyid" required>
            
            <label for="department">Department:</label>
            <select id="department" name="department" required>
                <option value="DSA">DSA</option>
                <option value="DBMS">DBMS</option>
                <option value="Probablity and Statistics">Probablity and Statistics</option>
                <option value="Chemistry">Chemistry</option>
                <option value="Financial Accounting">Financial Accounting</option>
            </select>

            <label for="faculty_code">Faculty code:</label>
            <input type="text" id="faculty_code" name="faculty_code" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
            <div class="button-teacher">
            <button type="submit" class="register" name="submit">Register</button>
        </div>
            <h4>Already Registered? <a href="login-t.php">Login</a></h4>
            <h4>Not a teacher? <a href="registeration-s.php">Register</a> as Student</h4>
        </form>
    </div>

    <footer class="registeration-t-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
