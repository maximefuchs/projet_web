<?php

Model::addSqlQuery('QUESTION_LIST',
	'SELECT * FROM QUESTION ORDER BY TAG');

Model::addSqlQuery('QUESTION_CREATE',
	'INSERT INTO `question` (`ID_QUESTION`, `ID_CONSIGNE`, `TAG`, `TYPE_QUESTION`, `NB_REPONSES`, `DESCRIPTION_QUESTION`) VALUES (NULL, :id_c, :tag, :type, :nb_r, :des_ques)');

//à finir 

?>
