<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>New Entry</title>	
</head>
<body>
	<?php include('menu.php');?>

	<?=form_open(base_url().'index.php/blog/insert_entry/')?>
	<p>Title: <br/><?=form_input('title')?></p>
	<p>Content: <br/><?=form_textarea('content', '', 'class="textarea" placeholder="Content here"')?></p>
	<p>Tags: <br/><?=form_input('tags')?> (comma separated)</p>
	<?=form_submit('submit', 'Insert', 'class="buttonGrey"')?> <!-- Creates the form to create an Entry -->
</body>
</html>