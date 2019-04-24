<?php
$user = $args['user'];
?>
<p>Bienvenue <?php echo $user->nom()." ".$user->prenom(); ?></p>
<?php require_once('props'.$user->getRole().'.php'); ?>