<tr>
	<th>Matricule :</th>
	<td><?php echo $user['MATRICULE'] ?></td>
</tr>
<tr>
	<th>Intervenant externe :</th>
	<td>
<?php if(isset($user['INTERN_EXT'])){
		echo "Oui";
	}else {
			echo "Non";
		}		
?>
</td>
</tr>
<tr>
	<th>Matiere :</th>
	<td><?php echo $user['MATIERE'] ?></td>
</tr>
