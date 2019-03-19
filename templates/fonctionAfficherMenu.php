<?php 

foreach ($array as $key) {
	echo "<a ";
	if($key == Request::getActionName())
		echo "id='selected' ";
	echo "href='index.php?controller=";
	echo Request::getController();
	echo "&action=".$key."'><li>";
	if($key == 'questionsEtreponses')
		echo "Q&A";
	else
		echo ucfirst($key);
	echo "</li></a>";
}

?>