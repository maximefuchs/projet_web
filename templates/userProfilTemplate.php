<?php $user = $this->args['user']; ?>
<div id="content">
	<h2>Vos Informations</h2>
	<table>
		<tr>
			<th>Login : </th>
			<td><?php echo $user['user_login'] ?></td>
		</tr>
		<tr>
			<th>Nom :</th>
			<td><?php echo $user['user_nom'] ?></td>
		</tr>
		<tr>
			<th>Prenom :</th>
			<td><?php echo $user['user_prenom'] ?></td>
		</tr>
		<tr>
			<th>Mail :</th>
			<td><?php echo $user['user_mail'] ?></td>
		</tr>
	</table>
</div>
