<?php

User::addSqlQuery('USER_LIST',
	'SELECT * FROM USER ORDER BY USER_LOGIN');

User::addSqlQuery('USER_GET_WITH_LOGIN_AND_PASSWORD',
	'SELECT * FROM USER WHERE USER_LOGIN=:login');

User::addSqlQuery('USER_CREATE',
	'INSERT INTO `user` (`user_id`, `user_login`, `user_motdepasse`, `user_mail`, `user_nom`, `user_prenom`) VALUES (NULL, :login, :mdp, :email, :nom, :prenom)');

User::addSqlQuery('USER_CONNECT',
	'SELECT * FROM USER WHERE USER_LOGIN=:login and USER_MOTDEPASSE=:mdp');

User::addSqlQuery('USER_GET_BY_ID',
	'SELECT * FROM USER WHERE USER_ID=:id');

User::addSqlQuery('USER_IS_LOGIN_USED',
	'SELECT * FROM USER WHERE USER_LOGIN=:login');


?>
