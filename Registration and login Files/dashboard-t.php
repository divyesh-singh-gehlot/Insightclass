<?php
echo "<script>alert('LOGIN SUCCESSFUL!');</script>";
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
                    <label for="studentRollNumber">Student Roll Number:</label>
                    <input type="text" id="studentRollNumber" name="studentRollNumber" required>

                    <label for="marks">Marks Obtained(Out of 100):</label>
                    <input type="number" id="marks" name="marks" required min="0" max="100">

                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>

                    <button type="submit" class="register">Submit</button>
                </form>
            </div>

            <div class="feedback-section">
                <h3>Student Feedback</h3>
                <div class="feedback">
                    <div class="feedback-item">
                        <p><strong>Student Roll Number:</strong> 101</p>
                        <p><strong>Feedback:</strong> Great performance! Keep up the good work.</p>
                    </div>
                    <div class="feedback-item">
                        <p><strong>Student Roll Number:</strong> 102</p>
                        <p><strong>Feedback:</strong> Needs improvement in time management.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="registeration-t-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
