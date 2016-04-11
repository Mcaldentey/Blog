<!DOCTYPE html>
<html lang="en">
<head>        
	<meta charset="utf-8">
	<title>View Users</title> 
	<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
</head>
<body>

	<?php include('menu.php');?>
	
	<div class="entries">

		<?php
		echo anchor(base_url()."index.php/users/new_user/", "Add User", 'class="buttonGrey"') . '<br/>' // Shows the option to add an user
		?>
		</br>
		<table id="users" class="display" cellspacing="0" width="100%"> 
			<thead> <!-- Sets the thread of the table -->
				<tr>
					<th><p>Id</p></th>
					<th><p>Name</p></th>
					<th><p>Username</p></th>
				</tr>
			</thead>

			<tbody> <!-- Sets the body of the table -->
				<?php if (!empty($all_users)) : ?>
					<?php foreach($all_users as $usu) : ?>
						
						<tr>
							<td><p><?= $usu -> id ?></p></td>
							<td><p><?= $usu -> name ?></p></td>
							<td><p><?= $usu -> username ?></p></td>
						</tr>

					<?php endforeach; ?>        
				<?php endif; ?>
			</tbody>
		</table>
	</div>			
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

	<script>
		$(function(){
			$("#users").dataTable();
		})
	</script>
	</br></br>
	<?php include('footer.php');?>    


</body>
</html>