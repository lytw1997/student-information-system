<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assests/images/logo.jpeg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assests/css/login.css" />
	<title>Sign In/Sign Up</title>
</head>
<body>
	<div class="container">
        <div class="text-center mt-5 mb-5 pt-5">
            <a href="index.php"><img src="assests/images/logo.jpeg" alt="Logo"></a>
        </div>
		<div class="box">
			<form action="auth.php" method="post">
				<div class="form-group">
   					<input type="text" class="form-control" placeholder="Username" name="username" required>
  				</div>
  				<div class="form-group">
   					<input type="password" class="form-control" placeholder="Password" name="password" required>
  				</div>
				<div class="form-group" style="display:flex;">
					<div class="input-group-prepend">
       					<span class="input-group-text">Role:</span>
    				</div>
  					<select class="form-control" name="role" style="width:30%;">
    					<option value="student">Student</option>
    					<option value="staff">Staff</option>
					</select>
				</div>
				<div style="text-align:center;" class="form-group">
					<input type="submit" class="btn btn-primary" style="width:100%;" value="Sign In" name="submit">
				</div>
			</form>
			<div class="signup">
				<p>Don't have an account yet? <a href="sign.php">Create account</a></p>
			</div>
            </div>
	</div>
    <footer class="mt-5 text-white" style="text-align: center; position:absolute; height:40px; background:#222222; bottom:0; width:100%;"><p class="m-0 pt-1">&copy; 2019 WIB2005 | by <a href="https://github.com/lytw1997">LOUIS YEW</a></p></footer>
	<?php
		session_start();
		if(isset($_SESSION['errorsignin'])){
			echo '<script>alert("Invalid Username or Password")</script>';
		}
		session_destroy();
	?>
</body>
</html>
