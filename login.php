<?php include('server.php')?>
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
<body style="background-color:#f2f2f2 ">
 <div class="revealator-slidedown revealator-once container">
  <div class="wrap">
  	 <div class="header">
  	 	
  		<h2 style="font-weight: bold;" >LogIn</h2>
  		<p>If you have an account</p>
  	</div>
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input_group" >
			 <i style="color: grey;" class="far fa-user"></i>
			<input class="form-control" style="border:none; margin: 5px;" type="text" class="border:none;" name="username" placeholder="Username">
		</div>
		<div class="input_group">
			<i style="color: grey;"class="fas fa-lock"></i>
			<input class="form-control" style="border:none; margin: 5px;" type="password" name="password" placeholder="Password">
		</div>
		<div class="check"><a href="#">Forgot password?</a>
               
            </div>
		
			<button style="border-radius: 50px" type="submit" class="btn btn-primary btn-block mt-5" name="login_user">LOGIN</button>

		
		<div class="bottom">
			
		<p>
			Don't have an account?  <a href="register.php">Sign up</a>
		</p>
	</div>
	</form>
</div>

</div>

</body>
</html>