<div style="padding: 10px;">
	<span>id : <?php echo $r->id(); ?>, id question associé : <?php echo $r->idQuestion(); ?></span><br>
	<span>Cette réponse est une 
		<?php if($r->estJuste() == 1){ echo "bonne" ;} else {echo "mauvaise";} ?>
		 reponse.
	</span>
	<i>Colonne : <?php echo $r->colonne(); ?></i><br>
	<span style="font-size: 20px;"><?php echo $r->contenu(); ?></span>
</div>