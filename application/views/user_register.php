<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Register</title> 
        
</head>
<body>
	<?php include('menu.php');?>

	<div class="entries">

        <?=form_open(base_url().'index.php/users/register/')?> <!-- Open an input to register an user  -->
        <?php echo (isset($error)) ? '<p>Please complete the fields!</p>' : '';?>
        <p>Name: <br/><?=form_input('name', '', 'id="register_name"')?></p>
        <p>Username: <br/><?= form_input('username', '', 'id="register_username"') ?></p>
        <p>Password: <br/><?=form_password('password', '', 'id="register_password"')?></p>
        <?=form_submit('submit', 'Register', 'class="buttonGrey"')?> <!-- Submit the form -->

	 </div> 
 
</body>
</html>
