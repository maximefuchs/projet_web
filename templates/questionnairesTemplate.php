<div class="container">
  <h2>Liste des questionnaires</h2>
  <p><span class="glyphicon glyphicon-search"></span>Rechercher parmis les questionnaires</p>
  <input class="form-control" id="myInput" type="text" placeholder="Recherche..">
  <br>
  <!-- <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Description</th>
				<th>Date ouverture</th>
        <th>Date fermeture</th>
        <th>Etat</th>
        <th>Promo</th>
        <th>Groupe</th>
        <th>TD</th>
      </tr>
    </thead>
    <tbody id="myTable">
			<?php
   //    $questionnaires = $args['questionnaires'];
			// foreach ($questionnaires as $q) {
			// 	require('questionnaireTemplate.php');
			// }
      ?>
    </tbody>
  </table> -->
  <table id="myTable">
    <tbody>
      <tr>
        <?php $questionnaires = $args['questionnaires'];
        $compteur = 0;
        foreach ($questionnaires as $q)
        {
          require('questionnaireTemplate.php');
          $compteur++;
          if($compteur%2==0){
            echo "</tr><tr>";
          }
        }
        ?>
      </tr>
    </tbody>
  </div>
  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();

        $("#myTable th").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
