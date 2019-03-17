<?php $user = $args['user'];
$questionnaires = $args['questionnaires'];
foreach ($questionnaires as $q) {
	require('userQuestionnaireTemplate.php');
}
?>
