<h2>Inscription</h2>
<?php
if(isset($args['inscErrorText']))
	echo '<span class="error">' . $args['inscErrorText'] . '</span>';
?>
<form action="index.php" method="post">
	<table>
		<tr>
			<th>Mail :</th>
			<td><input type="text" name="mail"/></td>
		</tr>
		<tr>
		<tr>
			<th>Login* :</th>
			<td><input type="text" name="inscLogin"/></td>
		</tr>
		<tr>
			<th>Mot de passe* :</th>
			<td><input type="password" name="inscPassword"/></td>
		</tr>
		<tr>
			<th>Mail :</th>
			<td><input type="text" name="mail"/></td>
		</tr>
		<tr>
			<th> Rôle : </th>
			<td><select class="" name="role">
				<option selected>Etudiant</option>
				<option>Professeur</option>
			</select>
			</td>
		</tr>

		<tr>
			<th />
			<td><input type="submit" value="Creer mon compte" /></td>
		</tr>
	</table>
</form>
