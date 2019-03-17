<?php 

$question = $this->args['questions'];
$reponses = $this->args['reponses'];

foreach ($question as $q) {
	$q_id = $q->id();
	$rep_associee = array();
	foreach ($reponses as $r) {
		if($r->idQuestion() == $q_id){
			array_push($rep_associee, $r);
		}
	}
	require('questionEtreponse.php');
}

 ?>