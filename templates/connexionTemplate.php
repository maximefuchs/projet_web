<h2>Connexion</h2>
<?php
if(isset($args['connErrorText']))
	echo '<span class="error">' . $args['connErrorText'] . '</span>';
?>
<form action="index.php" method="post">
	<table>
		<tr>
			<th>Login* :</th>
			<td><input type="text" name="connLogin"/></td>
		</tr>
		<tr>
			<th>Mot de passe* :</th>
			<td><input type="password" name="connPassword"/></td>
		</tr>
		<tr>
			<th />
			<td><input type="submit" value="Connexion" /></td>
		</tr>
	</table>
</form>