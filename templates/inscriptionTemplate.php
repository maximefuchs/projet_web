<h2>Inscription</h2>
<?php
if(isset($args['inscErrorText']))
	echo '<span class="error">' . $args['inscErrorText'] . '</span>';
?>
<form action="index.php" method="post">
	<table>
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
				<td>
					<input onclick="afficherPourEtudiant(); enleverPourEnseignant();" 
					type="radio" name="role" value="Etudiant">Etudiant
					<input onclick="afficherPourEnseignant(); enleverPourEtudiant();" 
					type="radio" name="role" value="Enseignant">Enseignant
				</td>
			</tr>

			<tr class="eleve">
				<th>Promo :</th>
				<td><input type="text" name="Promo"></td>
			</tr>

			<tr class="eleve">
				<th>Groupe de demi promo :</th>
				<td><input type="text" name="Groupe"></td>
			</tr>

			<tr class="eleve">
				<th>Td :</th>
				<td><input type="text" name="td"></td>
			</tr>

			<!-- date entrée/date sortie ??? -->

			<tr class="enseignant">
				<th>Matricule :</th>
				<td><input type="text" name="Matricule"></td>
			</tr>

			<tr class="enseignant">
				<th>Matière enseignée :</th>
				<td><input type="text" name="Mat_enseignee"></td>
			</tr>

			<tr class="enseignant">
				<th>Intervenant externe :</th>
				<td><input type="checkbox" name="Int_Ext"></td>
			</tr>

			<tr>
				<th />
				<td><input type="submit" value="Creer mon compte" /></td>
			</tr>
		</table>
	</form>
