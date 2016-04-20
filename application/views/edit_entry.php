<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Edit Entry</title>	
</head>
<body>
	<?php 
	include('menu.php'); ?>
	<div class="entries">
		<?php

	    $hidden = array('id' => $entry_data->id); //Loads the Entry id 
	    ?>
	    <?=form_open(base_url().'index.php/blog/update_entry/', '', $hidden)?> <!-- Charges the text on a form -->
	    <p>Title: <br/><?=form_input('title', $entry_data->title, 'class="title"')?></p>
	    <p>Subtitle: <br/><?=form_input('subtitle', $entry_data->subtitle, 'class="title"')?></p>
	    <p>Content: <br/><?=form_textarea('content', $entry_data->content, 'class="textarea" placeholder="Edit the Entry"')?></p>
	    <p>Image: <br/><?=form_input('image', $entry_data->image, 'class="title" placeholder="Image URL"')?></p>
	    <p>Tags: <br/><?=form_input('tags', $entry_data->tags, 'placeholder="Comma separated"')?></p>
	    <?=form_submit('submit', 'Update', 'class="buttonGrey"')?>
	</div>
	<?php include('footer.php');?>    
</body>
</html>