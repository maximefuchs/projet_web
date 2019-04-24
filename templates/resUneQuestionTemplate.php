<button class="btn btn-light float-left" onclick="history.go(-1);" style="margin-bottom: 15px;">Retour</button>
<table class="table text-light">
	<thead>
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Prenom</th>
			<th scope="col">Réussi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$nbJustes = 0;
		$res = $args['resultats'];
		foreach ($res as $r) {
			echo '<tr>';
			echo '<td>'.$r->nom().'</td>';
			echo '<td>'.$r->prenom().'</td>';
			if($r->estJuste()){
				echo '<td>&#10004;</td>';
				$nbJustes++;
			}
			else
				echo '<td>&#10006;</td>';
			echo '</tr>';
		}
		?>
	</tbody>
</table>
<h1><span class="badge badge-light"><?php echo $nbJustes."/".sizeof($res); ?></span></h1>