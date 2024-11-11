<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $rollnumber = $_POST["RollNumber"];
    $subject = $_POST["subject"];
    $marks = $_POST["marks"];

    $student_check = mysqli_query($conn, "SELECT * FROM student_marks WHERE roll_number='$rollnumber'");
    
    if (mysqli_num_rows($student_check) == 0) {
        echo "<script>alert('Roll number does not exist in the database');</script>";
    } 
    else {
        $duplicate_check = mysqli_query($conn, "SELECT * FROM student_marks WHERE roll_number='$rollnumber' AND subject='$subject'");
        
        if (mysqli_num_rows($duplicate_check) > 0) {
            echo "<script>alert('Marks for this subject already exist');</script>";
        } 
        else {
            $query = "INSERT INTO student_marks (roll_number, subject, marks) VALUES ('$rollnumber', '$subject', '$marks')";            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Marks fed successfully!');</script>";
            } else {
                echo "<script>alert('Could not insert marks!');</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - InsightClass</title>
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
                    <ul><a href="logout-t.php"><button class="login">Logout</button></a></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-content">
        <h2>Welcome, Teacher!</h2>
        <div class="marks-form">
            <h3>Enter Marks</h3>
            <form action="" method="POST" class="form">
                <label for="RollNumber">Student Roll Number:</label>
                <input type="text" id="RollNumber" name="RollNumber" required>

                <label for="marks">Marks Obtained (Out of 100):</label>
                <input type="number" id="marks" name="marks" required min="0" max="100">

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <button type="submit" class="register" name="submit">Submit</button>
            </form>
        </div>

        <div class="feedback-section">
            <table class="marks-table">
                <tr>
                    <th>Roll No</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Feedback</th>
                </tr>
                <?php
                 $conn = mysqli_connect("localhost", "root", "", "dbms_project");
                 if ($conn->connect_error) {
                     die("Connection failed: " . $conn->connect_error);
                 }
                $sql = "SELECT roll_number, subject,marks,student_feedback FROM student_marks";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["roll_number"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["marks"] . "</td><td>" . $row["student_feedback"] . "</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No Data Found</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>

    <footer class="registeration-t-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
