<a class="btn btn-outline-light" role="button"
 id='<?php echo "repondre".$q->id(); ?>'
 href='<?php echo "index.php?action=repondreQuestionnaire&idQuestionnaire=".$q->id(); ?>'>Répondre</a>
<a class="btn btn-outline-light" role="button"
href=<?php echo "'index.php?action=resultatUserQuestionnaire&idQuestionnaire=".$q->id()."'"; ?>>Voir mes résultats</a>

<script type="text/javascript">
	var etat = $(<?php echo "'#etat".$q->id()."'"; ?>);
	console.log(etat.html());
	if(etat.html() != 'En cours'){
		$('<?php echo "#repondre".$q->id(); ?>').addClass("disabled");
	}
</script>
