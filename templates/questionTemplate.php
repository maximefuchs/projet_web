<div style="padding: 10px;">
	<span><?php echo $q->id(); ?></span><br>
	<i>#<?php echo $q->tag(); ?></i><br><b><?php echo $q->type(); ?></b><br>
	<span style="font-size: 20px;"><?php echo $q->description_question(); ?></span><br>
	<span style="margin-left: 2%;">Nombre de réponses : <?php echo $q->nombre_reponses(); ?></span>
</div>