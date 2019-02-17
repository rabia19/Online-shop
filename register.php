<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/fm.revealator.jquery.css">
	<script src="js/fm.revealator.jquery.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">


</head>
<body style="background-color: #f2f2f2;">
 <div class="container ">
  <div class="wrap">	
	<div class="header">
		<img src="sdu.png" width="80px">
		<h2 style="font-weight: bold;">Sign Up</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

		<div class="input_group">
			<i class="far fa-user"></i>
			<input class = "form-control" style="border:none; margin: 5px;"type="text" id="username" placeholder="Username" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input_group">
			<i class="far fa-envelope"></i>
			<input type="email" style="border:none; margin: 5px;" class = "form-control" id="email" placeholder="Email"  name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input_group">
			<i class="fas fa-lock-open"></i>
			<input  class = "form-control" style="border:none; margin: 5px;" type="password" id="password1" placeholder="Password" name="password_1">
		</div>
		<div class="input_group">
			<i class="fas fa-lock"></i>
			<input  class = "form-control" style="border:none;margin: 5px;" type="password" id="password2" placeholder="Confrim Password" name="password_2">
		</div>
		
			<button  class="btn btn-primary btn-block mt-5"style="border-radius: 50px" type="submit"  name="reg_user">SIGN UP</button>
		
		<div class="bottom">
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</div>
		</form>
	</div>
</div>

</body>
</html>