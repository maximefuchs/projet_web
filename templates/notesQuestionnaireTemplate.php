<?php $resultats = $this->args['resultats']; ?>
<table class="table">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Note</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$rang = 1;
		foreach ($resultats as $r) {
			echo "<tr>";
			echo "<th scope='row'>".$rang."</th>";
			echo "<td>".$r->nom()."</td>";
			echo "<td>".$r->prenom()."</td>";
			echo "<td>".$r->note()."</td>";
			echo "</tr>";
			$rang++;
		}
		 ?>
	</tbody>
</table>