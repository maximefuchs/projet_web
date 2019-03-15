<h2>Inscription</h2>
<?php
if(isset($args['inscErrorText']))
	echo '<span class="error">' . $args['inscErrorText'] . '</span>';
?>
<style type="text/css">
	.eleve, .enseignant{
		visibility: collapse;
	}
</style>
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
			<!-- <tr>
				<th> Rôle : </th>
				<td>
					<select class="" name="role">
						<option selected>Etudiant</option>
						<option onclick="afficherPourEtudiant();">Professeur</option>
					</select>
				</td>
			</tr> -->

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
				<th>Groupe :</th>
				<td><input type="text" name="Groupe"></td>
			</tr>

			<tr class="eleve">
				<th>Td :</th>
				<td><input type="text" name="td"></td>
			</tr>

			<tr class="enseignant">
				<th>Matricule :</th>
				<td><input type="text" name="Matricule"></td>
			</tr>

			<tr class="enseignant">
				<th>Matière enseignée :</th>
				<td><input type="text" name="Mat_enseignee"></td>
			</tr>

			<tr>
				<th />
				<td><input type="submit" value="Creer mon compte" /></td>
			</tr>
		</table>
		<p onclick="afficherPourEtudiant()">test</p>
	</form>

	<script type="text/javascript">

		function afficherPourEtudiant(){
			var eleEleves = document.getElementsByClassName("eleve");
			for(var i = 0; i< eleEleves.length; i++){
				eleEleves[i].setAttribute('style', 'visibility: visible;');
			}
		}
		function enleverPourEtudiant(){
			var eleEleves = document.getElementsByClassName("eleve");
			for(var i = 0; i< eleEleves.length; i++){
				eleEleves[i].setAttribute('style', 'visibility: collapse;');
			}
		}

		function afficherPourEnseignant(){
			var eleEnseignant = document.getElementsByClassName("enseignant");
			for(var i = 0; i< eleEnseignant.length; i++){
				eleEnseignant[i].setAttribute('style', 'visibility: visible;');
			}
		}
		function enleverPourEnseignant(){
			var eleEnseignant = document.getElementsByClassName("enseignant");
			for(var i = 0; i< eleEnseignant.length; i++){
				eleEnseignant[i].setAttribute('style', 'visibility: collapse;');
			}
		}

	</script>
