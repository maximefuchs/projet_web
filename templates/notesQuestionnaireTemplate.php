<?php $resultats = $this->args['resultats']; 
$nbQ = $args['nbQuestions'];?>
<table class="table text-light">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Note sur <?php echo $nbQ; ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		$total = 0;
		$rang = 1;
		foreach ($resultats as $r) {
			echo "<tr>";
			echo "<th scope='row'>".$rang."</th>";
			echo "<td>".$r->nom()."</td>";
			echo "<td>".$r->prenom()."</td>";
			echo "<td>".$r->note()."</td>";
			$total += $r->note();
			echo "</tr>";
			$rang++;
		}
		 ?>
	</tbody>
</table>
<?php $moyenne = $total/sizeof($resultats); ?>
<h1>
	<span class="compteur badge badge-light">Moyenne : <?php echo substr($moyenne*20/$nbQ,0,4)."/20"; ?></span>
</h1>
