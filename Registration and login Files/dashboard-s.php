<?php
echo "<script>alert('LOGIN SUCCESSFUL!');</script>";
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
        <h2>Welcome STUDENT!</h2>
        <h3>Your Subjects and Marks</h3>

        <!-- Subjects and Marks Table -->
        <table class="marks-table">
                <tr>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Feedback</th>
                </tr>
                <tr>
                    <td>Mathematics</td>
                    <td>85</td>
                    <td>
                        <form action="submit_feedback.php" method="POST" class="feedback-form">
                            <input type="hidden" name="subject" value="Mathematics">
                            <textarea name="feedback" placeholder="Enter your feedback..." required></textarea>
                            <button type="submit" class="feedback-button">Submit</button>
                        </form>
                    </td>
                </tr>
        </table>
    </div>

    <footer class="dashboard-footer">
        <p>Designed by <strong>DIVYESH SINGH GEHLOT</strong> (IC-2K23-32)</p>
    </footer>
</body>
</html>
