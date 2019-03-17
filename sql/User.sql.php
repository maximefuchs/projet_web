<?php

Model::addSqlQuery('USER_LIST',
	'SELECT * FROM '.User::$table_name.' ORDER BY '.User::$colLogin);

Model::addSqlQuery('USER_GET_WITH_LOGIN_AND_PASSWORD',
	'SELECT * FROM '.User::$table_name.' WHERE '.User::$colLogin.'=:login');

//à modifier
Model::addSqlQuery('USER_CREATE',
	'INSERT INTO '.User::$table_name.' ('.User::$colId.', '.User::$colLogin.', '.User::$colMdp.', '.User::$colMail.', '.User::$colNom.', '.User::$colPrenom.', '.User::$colRole.', '.User::$colPromo.', '.User::$colGroupe.', '.User::$colTD.', '.User::$colMatricule.', '.User::$colMatiere.', '.User::$colIntExt.') VALUES (NULL, :login, :mdp, :email, :nom, :prenom, :role, :promo, :groupe, :td, :matricule, :matiere, :intern_ext)');

Model::addSqlQuery('USER_CONNECT',
	'SELECT * FROM '.User::$table_name.' 
	WHERE '.User::$colLogin.'=:login 
	and '.User::$colMdp.'=:mdp');

Model::addSqlQuery('USER_GET_BY_ID',
	'SELECT * FROM '.User::$table_name.' WHERE '.User::$colId.'=:id');

Model::addSqlQuery('USER_IS_LOGIN_USED',
	'SELECT * FROM '.User::$table_name.' WHERE '.User::$colLogin.'=:login');


?>
