<?php
session_start();

// Check if the user is a teacher
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'teacher') {
    header('location: login_teacher.php');
    exit();
}

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'StudentProject');

// Initialize message variable
$message = '';

// Add or update marks
if (isset($_POST['submit'])) {
    $student_username = mysqli_real_escape_string($db, $_POST['student_username']);
    $english = mysqli_real_escape_string($db, $_POST['english']);
    $maths = mysqli_real_escape_string($db, $_POST['maths']);
    $science = mysqli_real_escape_string($db, $_POST['science']);

    // Add or update marks for each subject
    $subjects = ['english' => $english, 'maths' => $maths, 'science' => $science];
    foreach ($subjects as $subject => $marks) {
        $query = "INSERT INTO marks (student_username, subject, marks) VALUES ('$student_username', '$subject', '$marks')
                  ON DUPLICATE KEY UPDATE marks='$marks'";
        mysqli_query($db, $query);
    }

    $message = "Marks updated successfully.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enter Marks</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .header {
            position: absolute;
            top: 95px;
            text-align: center;
            width: 100%;
            font-size: 50px;
            font-weight: bold;
            color: #fff;
            background-color: #ff6347;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .container {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top: 110px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form div {
            margin: 10px 0;
        }
        label {
            margin-right: 10px;
        }
        input[type="text"], input[type="number"] {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #ff6347;
            color: #fff;
            cursor: pointer;
        }
        a {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: #ff6347;}
            
    </style>
</head>
<body>
<div class="header">
    Enter Marks For Students  
</div>
    <?php if ($message != '') : ?>
        <p><?php echo $message; ?></p>
    <?php endif ?>
    <div class="container">
    <form method="post" action="teacher_marks.php">
        <div>
            <label>Student Username:</label>
            <input type="text" name="student_username" required>
        </div>
        <div>
            <label>English:</label>
            <input type="number" name="english" required>
        </div>
        <div>
            <label>Maths:</label>
            <input type="number" name="maths" required>
        </div>
        <div>
            <label>Science:</label>
            <input type="number" name="science" required>
        </div>
        <div>
            <button type="submit" name="submit">Submit</button>
        </div>
        

    <a href="index.php">Back to Home</a>
    </div>
</body>
</html>
