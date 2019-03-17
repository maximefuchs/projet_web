<?php
echo "<br>";
echo $q->description_question();
echo "<br>";
foreach ($rep_associee as $r) {
	echo $r->contenu();
	echo "<br>";
}

 ?>