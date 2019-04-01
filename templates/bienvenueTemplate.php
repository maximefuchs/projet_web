<img class="displayed" src="assets/Fichier3.png" alt="sabres">
<h1 style="text-align: center;">BIENVENUE</h1>


<?php 
$nbQuestions = count(Question::getList());
$nbQuestionnaires = count(Questionnaire::getList());
$nbUsers = count(User::getList());
$nbReponse = count(Reponse::getList());


 ?>

<div class="container">
  <div class="row">
    <div class="col-sm-6 compteur">
    	<h1><?php echo $nbUsers;?></h1>
      <h3>utilisateurs</h3>
    </div>
    <div class="col-sm-6 compteur">
    	<h1><?php echo $nbQuestionnaires; ?></h1>
      <h3>questionnaires</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 compteur">
    	<h1><?php echo $nbQuestions; ?></h1>
      <h3>questions</h3>
    </div>
    <div class="col-sm-6 compteur">
    	<h1><?php echo $nbReponse; ?></h1>
      <h3>réponses</h3>
    </div>
  </div>
</div>
