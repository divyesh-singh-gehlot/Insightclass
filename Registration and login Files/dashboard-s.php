<?php
require 'config.php';

if (isset($_POST["feedback-submit"])) {
    $feedback = $_POST["feedback"];
    $rollnumber = $_POST["rollNumber"];
    $subject = $_POST["subject"];

    $student_check = mysqli_query($conn, "SELECT * FROM student_marks WHERE roll_number='$rollnumber'");
    
    if (mysqli_num_rows($student_check) == 0) {
        echo "<script>alert('Roll number does not exist in the database');</script>";
    } 
    else {
        $duplicate_check = mysqli_query($conn, "SELECT * FROM student_marks WHERE roll_number='$rollnumber' AND subject='$subject' AND student_feedback IS NOT NULL");
        
        if (mysqli_num_rows($duplicate_check) > 0) {
            echo "<script>alert('Feedback for this subject already exists');</script>";
        } 
        else {
            $query = "UPDATE student_marks SET student_feedback='$feedback' WHERE roll_number='$rollnumber' AND subject='$subject'";            
            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Feedback submitted successfully!');</script>";
            } else {
                echo "<script>alert('Could not insert feedback!');</script>";
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
    <title>Student Dashboard - InsightClass</title>
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
                    <ul><a href="logout-s.php"><button class="login">Logout</button></a></ul>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-container">
        <h2 class="dashboard-s-h2">Welcome STUDENT!</h2>

        <form action="" method="POST" class="form" autocomplete="off">
            <label for="rollnumber">Enter your Roll Number:</label>
            <input type="text" id="rollnumber" name="rollNumber" placeholder="Enter your roll number" required>

            <div class="button-student">
                <button type="submit" class="register" name="submit">See Marks</button>
            </div>
        </form>

        <h3 class="dashboard-s-h3">Your Subjects and Marks</h3>

        <table class="marks-table">
            <tr>
                <th>Subject</th>
                <th>Marks</th>
                <th>Feedback</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "dbms_project");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if (isset($_POST['submit'])) {
                $roll = $_POST["rollNumber"];
                $sql = "SELECT roll_number, subject, marks, student_feedback FROM student_marks WHERE roll_number = '$roll' AND marks IS NOT NULL";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row["subject"] . "</td><td>" . $row["marks"] . "</td><td>
                        <form action='' method='POST' class='feedback-form' autocomplete='off'>
                            <input type='hidden' name='rollNumber' value='" . htmlspecialchars($roll) . "'>
                            <input type='hidden' name='subject' value='" . htmlspecialchars($row["subject"]) . "'>
                            <textarea name='feedback' placeholder='Enter your feedback...' required>" . htmlspecialchars($row["student_feedback"]) . "</textarea>
                            <button type='submit' class='feedback-button' name='feedback-submit'>Submit</button>
                        </form>
                        </td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<tr><td colspan='3'>No Data Found</td></tr>";
                }
            }

            $conn->close();
            ?>
        </table>
    </div>

    <footer class="dashboard-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
