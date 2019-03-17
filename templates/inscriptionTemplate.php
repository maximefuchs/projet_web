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
				<td><input type="text" name="inscLogin" required maxlength="50" /></td>
			</tr>
			<tr>
				<th>Mot de passe* :</th>
				<td><input type="password" name="inscPassword" required minlength="8" maxlength="50" /></td>
			</tr>
			<tr>
				<th>Nom* :</th>
				<td><input type="text" name="nom" required maxlength="30" /></td>
			</tr>
			<tr>
				<th>Prénom* :</th>
				<td><input type="text" name="prenom" required maxlength="30" /></td>
			</tr>
			<tr>
				<th>Mail :</th>
				<td><input type="text" name="mail" required maxlength="100" /></td>
			</tr>

			<tr>
				<th> Rôle : </th>
				<td>
					<input onclick="afficherPourEtudiant(); enleverPourEnseignant();"
					type="radio" name="role" value="Etudiant" required>Etudiant
					<input onclick="afficherPourEnseignant(); enleverPourEtudiant();"
					type="radio" name="role" value="Enseignant" required>Enseignant
				</td>
			</tr>

			<tr class="eleve">
				<th>Promo :</th>
				<td><input class="eleveInput" type="number" name="Promo"></td>
			</tr>

			<tr class="eleve">
				<th>Groupe de demi promo :</th>
				<td><input class="eleveInput" type="number" name="Groupe"></td>
			</tr>

			<tr class="eleve">
				<th>Td :</th>
				<td><input class="eleveInput" type="number" name="td"></td>
			</tr>

			<tr class="enseignant">
				<th>Matricule :</th>
				<td><input class="enseignantInput" type="number" name="Matricule" maxlength="10"></td>
			</tr>

			<tr class="enseignant">
				<th>Matière enseignée :</th>
				<td><input class="enseignantInput" type="text" name="Mat_enseignee" maxlength="30"></td>
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
