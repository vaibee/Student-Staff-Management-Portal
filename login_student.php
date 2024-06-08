<?php 
$errors = array(); // Initialize $errors array
include('server_student.php');
if (isset($_POST['login_user'])) {
    // (login logic here)
    // ...
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'student';
        $_SESSION['success'] = "You are now logged in";
        header('location: student_marks.php');
    } else {
        array_push($errors, "Wrong username/password combination");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login As Student</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Student Login</h2>
  </div>
	
  <form method="post" action="login_student.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" >
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register_student.php">Register</a>
  	</p>
  </form>
</body>
</html>
