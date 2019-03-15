<?php $user = $args['user']; ?>
<h2>Vos Informations</h2>
<h4><?php $type = $user->role(); echo $type;?></h4>
<table>
	<tr>
		<th>Login : </th>
		<td><?php echo $user->login(); ?></td>
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
		<td><?php echo $user->email(); ?></td>
	</tr>
	<?php require_once('profil'.$type.'.php'); ?>
</table>

