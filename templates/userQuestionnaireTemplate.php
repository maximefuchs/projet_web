<div style="padding: 10px;">
	<span><?php echo $q->id(); ?></span><br>
	<b><?php echo $q->titre(); ?></b><br>
	<span style="font-size: 20px;"><?php echo $q->description_questionnaire(); ?></span><br>
	<span style="margin-left: 2%;">
		Disponible du <?php echo $q->date_ouverture(); ?>
		au <?php echo $q->date_fermeture(); ?>
	</span>
</div>
