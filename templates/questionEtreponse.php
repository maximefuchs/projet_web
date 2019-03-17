<?php
echo " <div class=\"panel panel-default\">
<div class=\"panel-heading\">
<h4 class=\"panel-title\">
<a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$compteur."\">".$q->description_question()."</a>
</h4>
</div>
<div id=\"collapse".$compteur."\" class=\"panel-collapse collapse \"><div class=\"panel-body\">";
foreach ($rep_associee as $r) {
	echo $r->contenu();
	echo "<br>";
}
echo"</div>
</div>
</div>";
?>
