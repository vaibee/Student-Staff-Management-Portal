<?php
session_start();

// Check if the user is a student
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'student') {
    header('location: login_student.php');
    exit();
}

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'StudentProject');

// Get the logged-in student's marks
$username = $_SESSION['username'];
$query = "SELECT subject, marks FROM marks WHERE student_username='$username'";
$result = mysqli_query($db, $query);
$marks = [];
while ($row = mysqli_fetch_assoc($result)) {
    $marks[$row['subject']] = $row['marks'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Marks</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
            flex-direction: column;
        }
        .header {
            text-align: center;
            width: 100%;
            font-size: 50px;
            font-weight: bold;
            color: #fff;
            background-color: #ff6347;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .container {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #ff6347;
            padding: 10px 20px;
            border: 1px solid #ff6347;
            border-radius: 5px;
            background-color: #fff;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #ff6347;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="header">
        Your Marks
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
            </tr>
            <tr>
                <td>English</td>
                <td><?php echo isset($marks['english']) ? $marks['english'] : 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Maths</td>
                <td><?php echo isset($marks['maths']) ? $marks['maths'] : 'N/A'; ?></td>
            </tr>
            <tr>
                <td>Science</td>
                <td><?php echo isset($marks['science']) ? $marks['science'] : 'N/A'; ?></td>
            </tr>
        </table>
        <a href="check.php">Logout and Go to Home</a>
    </div>
</body>
</html>
