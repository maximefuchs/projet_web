<?php 
$data = User::getUserById($_GET['userId']);
?>
<p>Vous êtes connecté <?php echo $data->nom." ".$data->prenom ?></p>