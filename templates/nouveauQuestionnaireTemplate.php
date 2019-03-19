<h2>Nouveau Questionnaire</h2>

<?php
//Gestion des erreurs dans le validateQuestionnaire à faire...
// if(isset($args['inscErrorText']))
// 	echo '<span class="error">' . $args['inscErrorText'] . '</span>';
$users = $args['users'];
?>
<form action="index.php?controller=user" method="post">
	<table>
		<tr>
			<tr>
				<td><input type="text" name="titreQuestaire" required maxlength="100" placeholder="Titre..." /></td>
			</tr>
			<tr>
				<td><textarea name="descripQuestaire" required placeholder="Description questionnaire" rows="3" cols="40"></textarea></td>
			</tr>
			<tr>
				<td><input type="date" name="date_ouverture" required/>
        <input type="time" name="time_ouverture" required/></td>
			</tr>
			<tr>
			     <td><input type="date" name="date_fermeture" required/>
           <input type="time" name="time_ouverture" required placeholder="Time"/></td>
			</tr>
			<tr>
				<td><input type="submit" value="Creer mon compte" /></td>
			</tr>
		</table>
	</form>
