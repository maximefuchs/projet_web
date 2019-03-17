<div class="container">
	<h2>Questions et réponses</h2>
	<div class="panel-group" id="accordion">
		<?php
		$question = $this->args['questions'];
		$reponses = $this->args['reponses'];
		$compteur=1;
		foreach ($question as $q) {
			$q_id = $q->id();
			$rep_associee = array();
			foreach ($reponses as $r) {
				if($r->idQuestion() == $q_id){
					array_push($rep_associee, $r);
				}
			}
			require('questionEtreponse.php');
			$compteur=$compteur+1;
		}
		?>
	</div>
</div>
