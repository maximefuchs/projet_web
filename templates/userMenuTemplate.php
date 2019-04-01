<?php 
$array = array('profil');
require_once('menu'.$args['user']->role().'.php'); 
?>

<li class="foot-menu">
	<ul>
		<a href="logout.php">
			<li>Déconnexion</li>
		</a>
		<a href="index.php">
			<li>Home</li>
		</a>
	</ul>
</li>