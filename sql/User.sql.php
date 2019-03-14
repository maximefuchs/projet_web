<?php

Model::addSqlQuery('USER_LIST',
	'SELECT * FROM USER ORDER BY LOGIN');

Model::addSqlQuery('USER_GET_WITH_LOGIN_AND_PASSWORD',
	'SELECT * FROM USER WHERE LOGIN=:login');

//à modifier
Model::addSqlQuery('USER_CREATE',
	'INSERT INTO `user` (`user_id`, `user_login`, `user_motdepasse`, `user_mail`, `user_nom`, `user_prenom`) VALUES (NULL, :login, :mdp, :email, :nom, :prenom)');

Model::addSqlQuery('USER_CONNECT',
	'SELECT * FROM USER WHERE LOGIN=:login and PASSWORD=:mdp');

Model::addSqlQuery('USER_GET_BY_ID',
	'SELECT * FROM USER WHERE ID_USER=:id');

Model::addSqlQuery('USER_IS_LOGIN_USED',
	'SELECT * FROM USER WHERE LOGIN=:login');


?>
