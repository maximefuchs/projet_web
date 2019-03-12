<?php $user = $this->args['user']; ?>
<div id="content">
	<h2>Vos Informations</h2>
	<table>
		<tr>
			<th>Login : </th>
			<td><?php echo $user->login() ?></td>
		</tr>
		<tr>
			<th>Nom :</th>
			<td><?php echo $user->nom() ?></td>
		</tr>
		<tr>
			<th>Prenom :</th>
			<td><?php echo $user->prenom() ?></td>
		</tr>
		<tr>
			<th>Mail :</th>
			<td><?php echo $user->mail() ?></td>
		</tr>
	</table>
</div>
