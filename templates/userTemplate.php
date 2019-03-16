<div style="padding: 10px;">
	<table>
		<tr>
			<th>id : </th>
			<td><?php echo $user->id(); ?></td>
		</tr>
		<tr>
			<th>Login : </th>
			<td><?php echo $user->login(); ?></td>
		</tr>
		<tr>
			<th>Mot de passe : </th>
			<td><?php echo $user->mdp(); ?></td>
		</tr>
		<tr>
			<th>Nom :</th>
			<td><?php echo $user->nom(); ?></td>
		</tr>
		<tr>
			<th>Prenom :</th>
			<td><?php echo $user->prenom(); ?></td>
		</tr>
		<tr>
			<th>Email :</th>
			<td><?php echo $user->mail(); ?></td>
		</tr>
		<tr>
			<th>Role :</th>
			<td><?php echo $user->role(); ?></td>
		</tr>
		<?php require('profil'.$user->role().'.php'); ?>
	</table>
</div>