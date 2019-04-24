<form action="index.php?action=questionnaires" method="post" style="display: inline;" 
onsubmit="return confirm('Voulez vous supprimer cet élément ?');">
<input type="hidden" name="idQuestionnaire" value="<?php echo $q->id(); ?>">
<input class="btn btn-light btn-outline-orange" type="submit" name="suppression" value="Supprimer">
</form>
<a class="btn btn-light btn-outline-grey" role="button"
href=<?php echo "'index.php?action=voirQuestionnaire&idQuestionnaire=".$q->id()."'"; ?>>Afficher</a>
<a class="btn btn-light btn-outline-blue" role="button"
href="<?php echo "index.php?action=voirResultatsQuestionnaire&idQuestionnaire=".$q->id(); ?>">
Résultats
</a>