<!DOCTYPE html>
<head>
    <title>Student or Teacher</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        button {
            display: block;
            width: 200px;
            padding: 15px;
            margin: 20px auto;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        button.student {
            background-color: #3498db;
            color: #fff;
        }
        button.student:hover {
            background-color: #2980b9;
        }
        button.teacher {
            background-color: #2ecc71;
            color: #fff;
        }
        button.teacher:hover {
            background-color: #27ae60;
        }
        .header {
            position: absolute;
            top: 95px;
            text-align: center;
            width: 100%;
            font-size: 50px;
            color: #fff;
            background-color: #ff6347;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="header">
    Login to Student Management Portal 
</div>

<div class="container">
    <form method="GET" action="login_student.php">
        <button type="submit" name="role" value="student" class="student">Student</button>
    </form>
    <form method="GET" action="login_teacher.php">
        <button type="submit" name="role" value="teacher" class="teacher">Teacher</button>
    </form>
</div>

</body>
</html>
