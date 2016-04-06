<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign In</title> 
</head>
<body>
	<?php include('menu.php');?>
	
	<?=form_open(base_url().'index.php/users/validate/')?> 
	<?php echo (isset($error)) ? '<p>Incorrect Data!</p>' : '';?>
	<p>Username: <?=form_input('username')?></p>   
	<p>Password: <?=form_password('password')?></p> <!-- Open one input from user and one passowrd  -->
	<?=form_submit('submit', 'Log In', 'class="buttonGrey"')?>
</body>
</html>