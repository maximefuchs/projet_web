<table class="table">
	<thead>
		<tr>
			<th scope="col">Intitutlé de la question</th>
			<th scope="col">Correction</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($this->args['res'] as $r) {
			echo '<tr>';
			echo '<td>'.$r->description_question().'</td>';
			if($r->estJuste() == 1)
				echo '<td>&#10004;</td>';
			else
				echo '<td>&#10006;</td>';
			echo '</tr>';
		}
		 ?>
	</tbody>
</table>