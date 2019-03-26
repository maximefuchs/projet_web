<script>
	$(document).ready(function(){
		$("button").click(function(){
			console.log(window.location.origin);
			url =window.location.origin+"/projet_web/?controller=ajax&action=questionNew";
			$.ajax({
				url: url
			}).done(function(data) {
				$( "#questionsPourQuestionnaire" ).append( data );
			});
		});
	});
</script>
<section id="questionsPourQuestionnaire">
	<button>Ajouter une question</button>
	<?php require("nouvelleQuestionTemplate.php"); ?>
</section>