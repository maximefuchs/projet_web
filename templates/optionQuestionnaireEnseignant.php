<form action="index.php?action=questionnaires" method="post" style="display: inline;" 
onsubmit="return confirm('Voulez vous supprimer cet élément ?');">
	<input type="hidden" name="idQuestionnaire" value="<?php echo $q->id(); ?>">
	<input class="btn btn-outline-light" type="submit" name="suppression" value="Supprimer">
</form>
<a class="btn btn-outline-light" role="button"
href=<?php echo "'index.php?action=modifierQuestionnaire&idQuestionnaire=".$q->id()."'"; ?>>Modifier</a>
<a class="btn btn-outline-light" role="button"
href=<?php echo "'index.php?action=voirResultatsQuestionnaire&idQuestionnaire=".$q->id()."'"; ?>>Voir les résultats</a>