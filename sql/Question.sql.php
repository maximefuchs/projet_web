<?php

Model::addSqlQuery('QUESTION_LIST',
	'SELECT * FROM '.Question::$table_name.' ORDER BY '.Question::$colTag);

Model::addSqlQuery('QUESTION_CREATE',
	'INSERT INTO '.Question::$table_name.' ('.Question::$colId.', '.Question::$colIdConsigne.', '.Question::$colTag.', '.Question::$colType.', '.Question::$colNbRep.', '.Question::$colDesQu.') VALUES (NULL, :id_c, :tag, :type, :nb_r, :des_ques)');

Model::addSqlQuery('GET_QUESTION_BY_ID',
	'SELECT * FROM '.Question::$table_name.' WHERE '.Question::$colId.' = :id_q');

Model::addSqlQuery('GET_QUESTIONS_BY_QUESTIONNAIRE',
	'SELECT Q.* FROM '.Question::$table_name.' Q JOIN EST_COMPOSE EC ON Q.'.Question::$colId.'=EC.ID_QUESTION WHERE ID_QUESTIONNAIRE = :id_q');

	?>
