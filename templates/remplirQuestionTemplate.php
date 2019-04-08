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

<button id="ajouterQuestion" class="btn btn-secondary sticky-top" style="z-index: 10000; top: 10px;">
	Ajouter une question
</button>
<form action="index.php" method="post">
	<section id="questionsPourQuestionnaire">
		<?php require("nouvelleQuestionTemplate.php"); ?>
	</section>
	<input type="hidden" name="idQuestionnaire" value="<?php echo $args['idQuestionnaire']; ?>">
	<input class="btn btn-primary" type="submit" name="addQuestions" value="Valider">
</form>