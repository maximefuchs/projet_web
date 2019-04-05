<?php $resultats = $this->args['resultats']; ?>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Nom</th>
			<th scope="col">Prénom</th>
			<th scope="col">Note</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($resultats as $r) {
			echo "<tr>";
			echo "<th scope='col'>".$r->nom()."</th>";
			echo "<th scope='col'>".$r->prenom()."</th>";
			echo "<th scope='col'>".$r->note()."</th>";
			echo "</tr>";
		}
		 ?>
	</tbody>
</table>