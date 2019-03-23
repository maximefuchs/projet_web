<div id="newQuestionnaire">


	<h2>Nouveau Questionnaire</h2>

	<?php
	//Gestion des erreurs dans le validateQuestionnaire à faire...
	// if(isset($args['questaireErrorText']))
	// 	echo '<span class="error">' . $args['questaireErrorText'] . '</span>';
	if(isset($args['dateErrorText']))
		echo '<span class="error">' . $args['dateErrorText'] . '</span>';
	$user = $args['user'];
	?>
	<form action="index.php" method="post">
		<table>
				<tr>
					<td><input type="text" name="titreQuestaire" required maxlength="100" placeholder="Titre" /></td>
				</tr>
				<tr>
					<td><textarea name="descripQuestaire" required rows="3" cols="40"placeholder="Description" onkeyup="adjust_textarea(this)"></textarea></td>
				</tr>
				<tr>

					<td id="date">
						<input type="date" name="date_ouverture" required placeholder="Date ouverture"/>
					</td>
					<td id="date">
						<input type="time" name="time_ouverture" required placeholder="Heure ouverture"/>
					</td>
				</tr>
				<tr>
					
					<td id="date">
						<input type="date" name="date_fermeture" required placeholder="Date fermeture"/>
					</td>
					<td>
						<input type="time" name="time_fermeture" required placeholder="Heure fermeture"/>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value="Creer questionnaire" /></td>
				</tr>
			</table>
		</form>
	</div>
	<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
