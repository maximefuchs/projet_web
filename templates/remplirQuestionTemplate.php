<script>
	var numQuestion = 2;
	$(document).ready(function(){
		$("#ajouterQuestion").click(function(){
			url =window.location.origin+"/projet_web/?controller=ajax&action=questionNew&num="+numQuestion;
			console.log(url);
			$.ajax({
				url: url
			}).done(function(data) {
				$( "#questionsPourQuestionnaire" ).append( data );
				numQuestion++;
			});
		});
	});
</script>
<form action="index.php" method="post">
	<section id="questionsPourQuestionnaire">
		<button id="ajouterQuestion" class="btn btn-secondary">Ajouter une question</button>
		<?php require("nouvelleQuestionTemplate.php"); ?>
	</section>
	<input class="btn btn-primary" type="submit" name="addQuestions" value="Valider">
</form>