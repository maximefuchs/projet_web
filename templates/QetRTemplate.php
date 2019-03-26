
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
				echo "<tr>
				<td>
				<input type='hidden' 
				name='QCM_qId:".$q->id().
				"_rId:".$r->id().
				"_juste:".$r->estJuste().
				"'
				value='off'>";
				echo "<input type='checkbox' 
				name='QCM_qId:".$q->id().
				"_rId:".$r->id().
				"_juste:".$r->estJuste().
				"'
				value='on'>
				</td>";

				// Mettre deux input qui ont le même nom :
				// Si l'élément est checked : value sera 'on' dans le post
				// Si unchecked, value sera off
				// Sans le hidden, il n'y aura rien dans le post pour cet élément si l'élément est unchecked 

				echo "<td>".$r->contenu()."</td>";
				echo "</tr>";
			}
			break;

			case 'QCU':
			echo "<table border=1 frame=hsides rules=rows>";
			foreach ($reps_associees as $r) {
				echo "<tr><td><input type='radio' 
				value='rId:".$r->id()."' 
				name='QCU_qId:".$q->id()."'></td> ";
				echo "<td>".$r->contenu()."</td>";
				echo "</tr>";
			}
			break;

			case 'LIBRE':	
			echo "<table border=1 frame=hsides rules=rows>";
			echo "<tr><input type='text' name='LIBRE_qId:".$q->id()."'></tr>";
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
				echo "<td>".$rep_gauche[$i]->contenu()." ".$rep_gauche[$i]->id()."</td>";
				echo "<td><input type='number' name='ASSIGNE_qId:".$q->id()."_rDrId:".$rep_droite[$i]->id()."' style='width:40px;'></td>";
				echo "<td>".$rep_droite[$i]->contenu()."</td>";
				echo "</tr>";
			}
			break;
		}
		?>
	</table>
</div>
</div>