<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title> 
</head>
<body>
	<?php include('menu.php');?>

	<div class="entries">

        <?=form_open(base_url().'index.php/users/register/')?>
        <p>Name: <br/><?=form_input('name')?></p>
        <p>Username: <br/><?=form_input('username')?></p>
        <p>Password: <br/><?=form_password('password')?></p>
        <?=form_submit('submit', 'Register', 'class="buttonGrey"')?>

	 </div> 

</body>
</html>
