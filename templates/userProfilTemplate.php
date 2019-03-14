<?php $user = $this->args['user']; ?>
<h2>Vos Informations</h2>
<h4><?php $type = $user['TYPE']; echo $type;?></h4>
<table>
	<tr>
		<th>Login : </th>
		<td><?php echo $user['LOGIN'] ?></td>
	</tr>
	<tr>
		<th>Nom :</th>
		<td><?php echo $user['NOM'] ?></td>
	</tr>
	<tr>
		<th>Prenom :</th>
		<td><?php echo $user['PRENOM'] ?></td>
	</tr>
	<tr>
		<th>Email :</th>
		<td><?php echo $user['EMAIL'] ?></td>
	</tr>
	<?php require_once('profil'.$type.'.php'); ?>
</table>

