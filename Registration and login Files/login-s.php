<?php
session_start();
require 'config.php';

if (isset($_POST["submit"])) {
    $rollnumber = $_POST["rollNumber"];
    $password = $_POST["password"];

    // Prepare the SQL query to fetch the user from the database
    $stmt = $conn->prepare("SELECT * FROM student_user WHERE roll_number=?");
    $stmt->bind_param("s", $rollnumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verify the password using password_verify
        if ($password==$row["password"]) {
            // Password is correct, log the user in
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("location: dashboard-s.php");
            exit;
        } else {
            // Incorrect password
            echo "<script>alert('Wrong Password!');</script>";
        }
    } else {
        // No account found
        echo "<script>alert('No Account found! Register First.');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - InsightClass</title>
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
                    <ul><button class="register"><a href="registeration-s.php">Register</a></button></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="login-form">
        <h2>Student Login</h2>
        <form action="" method="POST" class="form">
            <label for="username">Roll Number:</label>
            <input type="text" id="rollnumber" name="rollNumber" placeholder="Enter your roll number" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <div class="button-student">
                <button type="submit" class="register" name="submit">Login</button>
            </div>

            <h4>Don't have an account? <a href="registeration-s.php">Register</a> as Student.</h4>
            <h4>Not a Student? <a href="login-t.php">Login</a> as teacher.</h4>
        </form>
    </div>

    <footer class="login-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
