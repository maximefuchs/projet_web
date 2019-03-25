<th>
	<a href=
	<?php echo "'index.php?action=questionsEtreponses&idQuestionnaire=".$q->id()."'"; ?>>
		<div class="unQuestionnaire">
			<div style="float: right">
				<span><?php echo "Ouverture : ".Questionnaire::afficheDate($q->date_ouverture()); ?></span><br>
				<span><?php echo "Fermeture : ".Questionnaire::afficheDate($q->date_fermeture()); ?></span><br>
				<span><?php echo "Etat : ".$q->etat(); ?></span>
			</div>
			<h4><?php echo $q->titre(); ?></h4>
			<p><?php echo $q->description_questionnaire(); ?></p>
			<i>
				Destiné à  
				<?php
				if(!is_null($q->promo()))
					echo ' la promo '.$q->promo();
				else
					echo 'tous';
				if(!is_null($q->groupe()))
					echo ', demi promo '.$q->groupe();
				if(!is_null($q->td()))
					echo ', groupe de td '.$q->td();
				?>
			</i>
		</div>
	</a>
</th>
