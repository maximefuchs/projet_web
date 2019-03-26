
<div class='panel panel-default'>
	<div class='enteteQuestion'>
		<h4 class='panel-title'>
			<?php
			echo $q->description_question();
			?>
		</h4>
	</div>
	<div class='panel panel-body'>
		<?php
		switch ($q->type()) {
			case 'QCM':
			echo "<table border=1 frame=hsides rules=rows>";
			foreach ($reps_associees as $r) {
				echo "<tr><td><input type='checkbox' name='QCM".$q->id()."r".$r->id()."'></td> ";
				echo "<td>".$r->contenu()."</td>";
				echo "</tr>";
			}
			break;

			case 'QCU':
			echo "<table border=1 frame=hsides rules=rows>";
			foreach ($reps_associees as $r) {
				echo "<tr><td><input type='radio' value='".$r->id()."' name='QCU".$q->id()."'></td> ";
				echo "<td>".$r->contenu()."</td>";
				echo "</tr>";
			}
			break;

			case 'LIBRE':	
			echo "<table border=1 frame=hsides rules=rows>";
			echo "<tr><input type='text' name='LIBRE".$q->id()."'></tr>";
			break;

			case 'ASSIGNE':
			echo "<table style='text-align:center;'>";
			$rep_gauche = array();
			$rep_droite = array();
			foreach ($reps_associees as $r) {
				if($r->colonne() == '0')
					array_push($rep_gauche, $r);
				else			
					array_push($rep_droite, $r);
			}
			for($i = 0; $i<count($rep_droite); $i++){
				echo "<tr>";
				echo "<td>".$rep_gauche[$i]->contenu()."</td>";
				echo "<td>".($i+1)."</td>";
				echo "<td><input type='number' name='".$q->id()."assigne".$i."' style='width:40px;'></td>";
				echo "<td>".$rep_droite[$i]->contenu()."</td>";
				echo "</tr>";
			}
			break;
		}
		echo"</table>
		</div>
		</div>";
		?>