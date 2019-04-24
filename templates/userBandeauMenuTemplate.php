<?php $p = $args['user']->prenom(); ?>
<i id="bienvenue">
	Bonjour 
	<?php
	if ($p == 'Luc')
		echo 'jedi ';
	echo $p;
	?>		
	</i>