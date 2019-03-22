<?php

Model::addSqlQuery('QUESTIONNAIRE_LIST',
	'SELECT * FROM '.Questionnaire::$table_name.' ORDER BY TITRE');

Model::addSqlQuery('QUESTIONNAIRE_CREATE',
	'INSERT INTO '.Questionnaire::$table_name.' ('.Questionnaire::$colId.', '.Questionnaire::$colIdConsigne.', '.Questionnaire::$colIdUser.', '.Questionnaire::$colTitre.', '.Questionnaire::$colDescQue.', '.Questionnaire::$colDateOuv.', '.Questionnaire::$colDateFerm.', '.Questionnaire::$colEtat.') VALUES (NULL, :id_c,:userId, :titre, :des_qu, :d_o, :d_f, :etat)');

Model::addSqlQuery('GET_QUESTIONNAIRE_BY_ID',
	'SELECT * FROM '.Questionnaire::$table_name.' WHERE '.Questionnaire::$colId.' = :id_q');

Model::addSqlQuery('GET_QUESTIONNAIRES_BY_IDUSER',
	'SELECT Q.* FROM '.Questionnaire::$table_name.' Q JOIN CREER C ON Q.'.Questionnaire::$colId.'=C.ID_QUESTIONNAIRE WHERE C.ID_USER=:id_user');

	?>
