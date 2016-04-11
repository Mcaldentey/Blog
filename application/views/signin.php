<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Sign In</title> 
</head>
<body>
	<?php include('menu.php');?>
	<div class="entries">
		<?=form_open(base_url().'index.php/users/validate/')?>  <!-- Open the form to Sign in -->
		<?php echo (isset($error)) ? '<p>Incorrect Data!</p>' : '';?>
		<p>Username: <br/><?=form_input('username')?></p>   
		<p>Password: <br/><?=form_password('password')?></p> 
		<?=form_submit('submit', 'Log In', 'class="buttonGrey"')?> <!-- Submit the form -->
	</div>   
</body>
</html>