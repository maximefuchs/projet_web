<!-- <?php
		// echo "<tr>";
		// echo "<td>". $q->id(). "</td>";
		// echo "<td>". $q->titre(). "</td>";
		// echo "<td>". $q->description_questionnaire(). "</td>";
		// echo "<td>". $q->date_ouverture(). "</td>";
		// echo "<td>". $q->date_fermeture(). "</td>";
		// echo "<td>". $q->etat(). "</td>";
		// echo "<td>". $q->promo(). "</td>";
		// echo "<td>". $q->groupe(). "</td>";
		// echo "<td>". $q->td(). "</td>";
		// echo "</tr>";
?> -->
<th>
	<div class="unQuestionnaire">
		<div style="float: right">
			<span><?php echo "Ouverture : ".Questionnaire::afficheDate($q->date_ouverture()); ?></span><br>
			<span><?php echo "Fermeture : ".Questionnaire::afficheDate($q->date_fermeture()); ?></span><br>
			<span><?php echo "Etat : ".$q->etat(); ?></span>
		</div>
		<h4><?php echo $q->titre(); ?></h4>
		<p><?php echo $q->description_questionnaire(); ?></p>
	</div>
</th>
