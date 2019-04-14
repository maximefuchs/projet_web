<a class="btn btn-light btnRep" role="button"
id='<?php echo "repondre".$q->id(); ?>'
href='<?php echo "index.php?action=repondreQuestionnaire&idQuestionnaire=".$q->id(); ?>'>Répondre</a>
<a class="btn btn-outline-light" role="button"
id='<?php echo "voirRes".$q->id(); ?>'
href=<?php echo "'index.php?action=resultatUserQuestionnaire&idQuestionnaire=".$q->id()."'"; ?>>Voir mes résultats</a>

<script type="text/javascript">
	var etat = $(<?php echo "'#etat".$q->id()."'"; ?>);
	var btnRep = $('<?php echo "#repondre".$q->id(); ?>');
	var btnVoirRes = $('<?php echo "#voirRes".$q->id(); ?>');
	var aParticipe = <?php if(Questionnaire::aParticipe($args['user']->id(), $q->id()) != false){echo 'true';}else{echo 'false';} ?>;
	if(etat.html() != 'En cours' || aParticipe){
		btnRep.hide();
	}
	if(!aParticipe){
		btnVoirRes.hide();
	}
</script>
