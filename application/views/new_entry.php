<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>New Entry</title>	
</head>
<body>

	<?php include('menu.php');?>
	<div class="entries">
		<?=form_open(base_url().'index.php/blog/insert_entry/')?> <!-- Creates the form to insert an entry-->
		<?php echo (isset($error)) ? '<p>Please complete the fields!</p>' : '';?>
		<p>Title: <br/><?=form_input('title','', 'class="title" placeholder="Title"')?></p>
		<p>Subtitle: <br/><?=form_input('subtitle','', 'class="title" placeholder="Subtitle"')?></p>
		<p>Content: <br/><?=form_textarea('content', '', 'class="textarea" placeholder="Content here"')?></p>
		<p>Image: <br/><?=form_input('image', '', 'class="title" placeholder="Image url"')?></p>
		<p>Tags: <br/><?=form_input('tags', '', 'placeholder="Comma separated"')?></p>

		<?=form_submit('submit', 'Insert', 'class="buttonGrey"')?> <!-- Submti the form -->
	</div>
	<?php include('footer.php');?>    
</body>
</html>