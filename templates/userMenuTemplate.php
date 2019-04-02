<?php 
$array = array('index' => 'Home', 'deconnexion' => 'Déconnexion', 'profil' => 'Mes informations');
require_once('menu'.$args['user']->role().'.php'); 
?>