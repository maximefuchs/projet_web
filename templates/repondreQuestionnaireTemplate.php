<form action="index.php" method="post">

	<?php 
	$questions = $this->args['questions'];
	$reponses = $this->args['reponses'];
	// pour la sauvegarde des elements du questionnaire
	// permet de ne pas avoir à rechercher ces éléments lors de la correction
	foreach ($questions as $q) {
		$q_id = $q->id();
		$reps_associees = array();
		foreach ($reponses as $r) {
			if($r->idQuestion() == $q_id){
				array_push($reps_associees, $r);
			}
		}
		require('QetRTemplate.php');
	}
	?>
	<input type="submit" name="ValiderReponses">
<!-- <?php //echo "'Valider".$this->args['idQu']."'" ?> -->
</form>