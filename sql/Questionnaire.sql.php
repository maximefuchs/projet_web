<?php

Model::addSqlQuery('QUESTIONNAIRE_LIST',
	'SELECT * FROM '.Questionnaire::$table_name.' ORDER BY TITRE');

Model::addSqlQuery('QUESTIONNAIRE_CREATE',
	'INSERT INTO '.Questionnaire::$table_name.' ('.Questionnaire::$colId.', '.Questionnaire::$colIdConsigne.', '.Questionnaire::$colIdUser.', '.Questionnaire::$colTitre.', '.Questionnaire::$colDescQue.', '.Questionnaire::$colDateOuv.', '.Questionnaire::$colDateFerm.', '.Questionnaire::$colEtat.', '.Questionnaire::$colPromo.', '.Questionnaire::$colGroupe.', '.Questionnaire::$colTD.') VALUES (NULL, :id_c, :userId, :titre, :des_qu, :d_o, :d_f, :etat, :promo, :groupe, :td)');

Model::addSqlQuery('GET_QUESTIONNAIRE_BY_ID',
	'SELECT * FROM '.Questionnaire::$table_name.' WHERE '.Questionnaire::$colId.' = :id_q');

Model::addSqlQuery('GET_QUESTIONNAIRES_BY_IDUSER',
	'SELECT * FROM '.Questionnaire::$table_name.' WHERE '.Questionnaire::$colIdUser.'=:id_user');

Model::addSqlQuery('GET_QUESTIONNAIRES_BY_ETUDIANT',
	'SELECT * FROM '.Questionnaire::$table_name.' WHERE
	('.Questionnaire::$colPromo.'=:promo AND '.Questionnaire::$colTD.' IS NULL AND '.Questionnaire::$colGroupe.' IS NULL)
	OR ('.Questionnaire::$colPromo.'=:promo AND '.Questionnaire::$colTD.'=:td)
	OR ('.Questionnaire::$colPromo.'=:promo AND '.Questionnaire::$colGroupe.'=:groupe)');

Model::addSqlQuery('UPDATE_ETAT_QUESTIONNAIRES',
'UPDATE '.Questionnaire::$table_name.' SET '.Questionnaire::$colEtat.' = \'Terminé\' WHERE '.Questionnaire::$colDateFerm.' < NOW();'.
'UPDATE '.Questionnaire::$table_name.' SET '.Questionnaire::$colEtat.' = \'En cours\' WHERE '.Questionnaire::$colDateOuv.' < NOW() AND '.Questionnaire::$colDateFerm.' > NOW();'.
'UPDATE '.Questionnaire::$table_name.' SET '.Questionnaire::$colEtat.' = \'Non commencé\' WHERE '.Questionnaire::$colDateOuv.' > NOW();');

Model::addSqlQuery('GET_ID_DERNIER_QUESTIONNAIRE',
	'SELECT MAX('.Questionnaire::$colId.') FROM '.Questionnaire::$table_name);

Model::addSqlQuery('SET_PARTICIPATION',
	'INSERT INTO PARTICIPE (ID_USER, ID_QUESTIONNAIRE) VALUES (:idUser, :idQuestionnaire)');


Model::addSqlQuery('USER_A_PARTICIPE_QUESTIONNAIRE',
	'SELECT Q.* FROM '.Questionnaire::$table_name.' Q JOIN PARTICIPE P ON 
	Q.'.Questionnaire::$colId.' = P.'.Questionnaire::$colId.
	' WHERE P.'.User::$colId.' = :idUser AND Q.'.Questionnaire::$colId.' = :idQuestionnaire');

	?>
