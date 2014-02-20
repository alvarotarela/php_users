<h1>Listado de usuarios</h1>
<a href="usuarios.php?action=insert">Insert Usuario</a>
<table class="table table-striped">
<tr><
<th>ID</th>
<th>username</th>
<th>e-mail</th>
<th>Password</th>
</tr>
<?php foreach($filas as $key => $fila):	?>
	<tr>
		<?php 
		$image=$fila['photo'];
		unset($fila['photo']);
		foreach($fila as $column):?>
			<td><?=$column;?></td>
		<?php endforeach; ?>
		<td><img src="<?=$image;?>" width="50px" /></td>
		<td>
			<a href="usuarios.php?action=update&id=<?=$key;?>">Update</a>
			<a href="usuarios.php?action=delete&id=<?=$key;?>">Delete</a>
		</td>
	</tr>
<?php endforeach;?>
</table>