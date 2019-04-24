<h1>Réponses</h1>
<a id="btnRetour" class="btn btn-light float-left" href="?action=questionnaires" style="margin-bottom: 15px">Retour</a>
<table class="table text-light">
	<thead>
		<tr>
			<th scope="col">Intitutlé de la question</th>
			<th scope="col">Correction</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0;
		$justes = 0;
		foreach ($this->args['res'] as $r) {
			$total++;
			echo '<tr>';
			echo '<td>'.$r->description_question().'</td>';
			if($r->estJuste() == 1){
				echo '<td>&#10004;</td>';
				$justes++;
			}
			else
				echo '<td>&#10006;</td>';
			echo '</tr>';
		}
		?>
	</tbody>
</table>
<h4>
	<span class="compteur badge badge-dark"><?php echo $justes."/".$total; ?></span>
</h4>
<h1>
	<span class="compteur badge badge-light"><?php echo substr($justes*20/$total,0,4)."/20"; ?></span>
</h1>

<script type="text/javascript">
	var test = <?php echo (Request::getController()=='Enseignant')?'true':'false'; ?>;
	if(test){
		$("#btnRetour").attr('href','#').click(function(){
			history.go(-1);
		});
	}
</script>
