<?php 
$tables = array('User', 'Question', 'Questionnaire');
//ajout des queries
foreach ($tables as $table) {
	require_once(__ROOT_DIR.'/sql/'.$table.'.sql.php');
}
?>