<?php

Model::addSqlQuery('REPONSE_LIST',
	'SELECT * FROM '.Reponse::$table_name.' ORDER BY '. Reponse::$colId);

Model::addSqlQuery('REPONSE_CREATE',
	'INSERT INTO '.Reponse::$table_name.' ('.Reponse::$colId.', '.Reponse::$colIdQuestion.', '.Reponse::$colEstJuste.', '.Reponse::$colColonne.', '.Reponse::$colContenu.') VALUES (NULL, :id_question, :estJuste, :colonne, :contenu)');

Model::addSqlQuery('GET_REPONSE_BY_ID',
	'SELECT * FROM '.Reponse::$table_name.' WHERE '.Reponse::$colId.' = :id_r');

Model::addSqlQuery('GET_REPONSE_BY_IDQUESTION',
	'SELECT * FROM '.Reponse::$table_name.' WHERE '.Reponse::$colIdQuestion.'=:id_question');

Model::addSqlQuery('GET_REPONSE_BY_IDQUESTIONNAIRE',
	'SELECT R.* FROM '.Reponse::$table_name.' R JOIN '.Question::$table_name.' QN ON R.'.Reponse::$colIdQuestion.'= QN.'.Question::$colId.' JOIN EST_COMPOSE EC ON QN.'.Question::$colID.'=EC.'.Question::$colId.' WHERE EC.'.Questionnaire::$colId.'=:id_questionnaire');

	?>
