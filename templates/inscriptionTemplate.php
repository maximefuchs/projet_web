<div class="inscription">
	<h2>Inscription</h2>
	<?php
	if(isset($args['inscErrorText']))
		echo '<span class="error">' . $args['inscErrorText'] . '</span>';
	?>
	<form action="index.php" method="post">
		<table>
			<tr>
				<tr>
					<td><input type="text" name="inscLogin" required maxlength="50" placeholder="Login" autofocus/></td>
				</tr>
				<tr>
					<td><input type="password" name="inscPassword" required minlength="8" maxlength="50" placeholder="Mot de passe" /></td>
				</tr>
				<tr>
					<td><input type="text" name="nom" required maxlength="30" placeholder="Nom" /></td>
				</tr>
				<tr>
					<td><input type="text" name="prenom" required maxlength="30" placeholder="Prénom" /></td>
				</tr>
				<tr>
					<td><input type="text" name="mail" required maxlength="100" placeholder="Email" /></td>
				</tr>

				<tr>
					<td>
						<input onclick="afficherPourEtudiant(); enleverPourEnseignant();"
						type="radio" name="role" value="Etudiant" required><span>Etudiant</span>
						<input onclick="afficherPourEnseignant(); enleverPourEtudiant();"
						type="radio" name="role" value="Enseignant" required><span>Enseignant</span>
					</td>
				</tr>

				<tr class="eleve">
					<td><input class="eleveInput" type="number" name="Promo" placeholder="Promo"/></td>
				</tr>

				<tr class="eleve">
					<td><input class="eleveInput" type="number" name="Groupe" placeholder="Groupe de demi promo" /></td>
				</tr>

				<tr class="eleve">
					<td><input class="eleveInput" type="number" name="td" placeholder="Groupe TD"/></td>
				</tr>

				<tr class="enseignant">
					<td><input class="enseignantInput" type="number" name="Matricule" maxlength="10" placeholder="Matricule" /></td>
				</tr>

				<tr class="enseignant">
					<td><input class="enseignantInput" type="text" name="Mat_enseignee" maxlength="30" placeholder="Matière enseignée"/></td>
				</tr>

				<tr class="enseignant">
					<td>
						<span>Inervenant Extérieur :</span>
						<input type="checkbox" name="Int_Ext">
					</td>
				</tr>

				<tr>
					<td><input type="submit" value="Creer mon compte" /></td>
				</tr>
			</tr>
		</table>
	</form>
</div>
