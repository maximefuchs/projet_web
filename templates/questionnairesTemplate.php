<div class="container">
  <h2>Liste des questionnaires</h2>
  <p>&#128269;</span>Rechercher parmis les questionnaires</p>
  <input class="form-control" id="myInput" type="text" placeholder="Recherche..">
  <br>
  <div class="row justify-content-around">
      <?php $questionnaires = $args['questionnaires'];
      $user=$args['user'];
      $compteur = 0;
      foreach ($questionnaires as $q)
      {
        require('questionnaireTemplate.php');
        $compteur++;
        if($compteur%2==0){
          echo "</div><br><div class='row justify-content-around'>";
        }
      }
      ?>
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
