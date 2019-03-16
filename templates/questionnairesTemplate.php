<?php $questionnaires = $args['questionnaires'];
foreach ($questionnaires as $q) {
	require('questionnaireTemplate.php');
} 
?>