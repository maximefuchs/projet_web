<?php 
$user = $args['user'];
$questionnaires = Questionnaire::getQuestionnaireByEtudiant($user->promo(),$user->grp_demiPromo(),$user->td());
$nonParticipations = 0;
foreach ($questionnaires as $q) {
	$aParticipe = Questionnaire::aParticipe($user->id(), $q->id());
	if($aParticipe == false)
		$nonParticipations++;
}

?>


<div class="container">
	<div class="row">
		<div class="col-sm-5">
			<h1><span class="badge badge-dark"><?php echo sizeof($questionnaires);?></span></h1>
			<h3>questionnaires concernés</h3>
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-5">
			<h1>
				<span class="compteur badge badge-dark"><?php echo $nonParticipations; ?></span>
			</h1>
			<h3>en attente de réponse</h3>
		</div>
	</div>
</div>