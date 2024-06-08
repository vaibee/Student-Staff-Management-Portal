<?php 
$errors = array(); // Initialize $errors array
include('server_teacher.php');


if (isset($_POST['login_user'])) {
    // (login logic here)
    // ...
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'teacher';
        $_SESSION['success'] = "You are now logged in";
        header('location: teacher_marks.php');
    } else {
        array_push($errors, "Wrong username/password combination");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login As Teacher</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Teacher Login</h2>
  </div>
	
  <form method="post" action="login_teacher.php">
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
  		Not yet a member? <a href="register_teacher.php">Register</a>
  	</p>
  </form>
</body>
</html>
