<div class="newQuestion">

  <?php
  //Gestion des erreurs dans le validateQuestionnaire à faire...
  // if(isset($args['questaireErrorText']))
  // 	echo '<span class="error">' . $args['questaireErrorText'] . '</span>';
  $user = $args['user'];
  $type= $args['type'];
  ?>
  <form action="index.php" method="post">
    <div class="entete">
      <table>
        <tr>
          <td><h2>Nouvelle Question</h2></td>
        </tr>
      </table>
    </div>
    <div class="">
    <div class="form-row">
      <div class="form-group col-sm-3">
        <label for="inputType">Type de question*</label>
        <select name="TypeQuestion" class="form-control" id="inputType" onchange="changeType();" autofocus>
          <?php  foreach ($type as $t)
          {
            $typ=$t->type();
            echo "<option value=\"$typ\">$typ</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group col-sm-6">
        <label for="inputDescription">Description</label>
        <!-- <input type="text" name="descripQuestion"  id="inputDescription" placeholder="Groupe"> -->
        <textarea id="inputDescription" name="descripQuestion" class="form-control" required rows="3" cols="40" placeholder="Description"></textarea>
      </div>
      <div class="form-group col-sm-3">
        <label for="inputTag">Tag*</label>
        <input class="form-control" id="inputTag" type="text" name="Tag" placeholder="Maths, Physique, ..." required></td>
      </div>
    </div>
  </div>
  <div class="QCM">
    <div class="form-row">
      <div class="col-sm-9">
        <label for="inputReponse">Réponse</label>
        <input type="text" id="inputReponse" name="QCM_1" class="form-control" required>
      </div>
      <div class="form-check col-sm-2">
        <label for="inputEstJuste">Est Juste</label>
        <br>
        <input type="checkbox" class="form-check-input" id="inputEstJuste" name="EstJusteQCM_1" required>
      </div>
      <button type="button" class="close">&times;</button>
    </div>
  </div>
  <div class="QCU" style="display:none;">
    <div class="form-row">
      <div class="col-sm-9">
        <label for="inputReponse">Réponse</label>
        <input type="text" id="inputReponse" name="QCU_1" class="form-control" required>
      </div>
      <div class="form-check col-sm-2">
        <label for="inputEstJuste">Est Juste</label>
        <br>
        <input type="radio" class="form-check-input" id="inputEstJuste" name="EstJusteQCU" required>
      </div>
      <button type="button" class="close">&times;</button>
    </div>
  </div>
  <div class="Libre" style="display:none;">
    <div class="form-row">
        <label for="inputReponse">Réponse</label>
        <input type="text" id="inputReponse" name="Assignement_1_1" class="form-control" required>
    </div>
  </div>
  <div class="Assignement" style="display:none;">
    <div class="form-row">
      <div class="col-sm-5">
        <label for="inputReponse">Réponse</label>
        <input type="text" id="inputReponse" name="Assignement_1_2" class="form-control" required>
      </div>
      <div class="col-sm-1">
      <label for="icon"></label>
        <h3 id="icon">&#10234;</h3>
      </div>
      <div class="col-sm-5">
        <label for="inputReponse">Réponse</label>
        <input type="text" id="inputReponse" name="Libre" class="form-control" required>
      </div>
      <button type="button" class="close">&times;</button>
    </div>
  </div>
<button type="button" class="btn btn-success QCMbtn" value="add new QCM" style="">+</button>
<button type="button" class="btn btn-success QCUbtn" value="add new QCU" style="display:none;" >+</button>
<button type="button" class="btn btn-success Assignementbtn" value="add new Assignement" style="display:none;">+</button>
  </form>
</div>
<script type="text/javascript">
var nbreponsesQCM=1;
var nbreponsesQCU=1;
var nbreponsesAssignement=1;

function addReponsesQCM($elem){
  $elem.append($('<div class=\"form-row\"><div class=\"col-sm-9\"><label for=\"inputReponse\">Réponse</label><input type=\"text\" id=\"inputReponse\" name=\"QCM_'+nbreponsesQCM+'\" class=\"form-control\" required></div><div class=\"form-check col-sm-2\"><label for=\"inputEstJuste\">Est Juste</label><br><input type=\"checkbox\" class=\"form-check-input\" id=\"inputEstJuste\" name=\"EstJusteQCM_'+nbreponsesQCM+'\" required></div><button type=\"button\" class=\"close\">&times;</button></div>'));
}
function addReponsesQCU($elem){
$elem.append($('<div class=\"form-row\"><div class=\"col-sm-9\"><label for=\"inputReponse\">Réponse</label><input type=\"text\" id=\"inputReponse\" name=\"QCU_'+nbreponsesQCU+'\" class=\"form-control\" required></div><div class=\"form-check col-sm-2\"><label for=\"inputEstJuste\">Est Juste</label><br><input type=\"radio\" class=\"form-check-input\" id=\"inputEstJuste\" name=\"EstJusteQCU\" required></div><button type=\"button\" class=\"close\">&times;</button></div>'));
}
function addReponsesAssignement($elem){
$elem.append($('<div class=\"form-row\"><div class=\"col-sm-5\"><label for=\"inputReponse\">Réponse</label><input type=\"text\" id=\"inputReponse\" name=\"Assignement_'+nbreponsesAssignement+'_1\" class=\"form-control\" required></div><div class=\"col-sm-1\"><label for\"icon\"></label><h3 id=\"icon\">&#10234;</h3></div><div class=\"col-sm-5\"><label for=\"inputReponse\">Réponse</label><input type=\"text\" id=\"inputReponse\" name=\"Assignement_'+nbreponsesAssignement+'_2\" class=\"form-control\" required></div><button type=\"button\" class=\"close\">&times;</button></div>'));
}

function changeType(){
  console.log("Changer !");
  var selectBox = document.getElementById("inputType");
	var selectedValue = selectBox.options[selectBox.selectedIndex].value;
	switch(selectedValue){
    case 'QCM':
      $('.QCM').attr('style','display: block;');
      $('.QCMbtn').attr('style','display: inline-block;');
      $('.QCU').attr('style','display: none;');
      $('.QCUbtn').attr('style','display: none;');
      $('.Libre').attr('style','display: none;');
      $('.Assignement').attr('style','display: none;');
      $('.Assignementbtn').attr('style','display: none;');
      break;
    case 'QCU':
      $('.QCU').attr('style','display: block;');
      $('.QCUbtn').attr('style','display: inline-block;');
      $('.QCM').attr('style','display: none;');
      $('.QCMbtn').attr('style','display: none;');
      $('.Libre').attr('style','display: none;');
      $('.Assignement').attr('style','display: none;');
      $('.Assignementbtn').attr('style','display: none;');
      break;
    case 'LIBRE':
      $('.Libre').attr('style','display: block;');
      $('.QCU').attr('style','display: none;');
      $('.QCUbtn').attr('style','display: none;');
      $('.QCM').attr('style','display: none;');
      $('.QCMbtn').attr('style','display: none;');
      $('.Assignement').attr('style','display: none;');
      $('.Assignementbtn').attr('style','display: none;');
      break;
    case 'ASSIGNE':
      $('.Assignement').attr('style','display: block;');
      $('.Assignementbtn').attr('style','display: inline-block;');
      $('.QCU').attr('style','display: none;');
      $('.QCUbtn').attr('style','display: none;');
      $('.Libre').attr('style','display: none;');
      $('.QCM').attr('style','display: none;');
      $('.QCMbtn').attr('style','display: none;');
      break;
  }
}
$(document).ready(function(){
    $('.QCMbtn').click(function(){
      nbreponsesQCM=nbreponsesQCM+1;
      addReponsesQCM($('.QCM'));
    });
    $('.QCUbtn').click(function(){
      nbreponsesQCU=nbreponsesQCU+1;
      addReponsesQCU($('.QCU'));
    });
    $('.Assignementbtn').click(function(){
      nbreponsesAssignement=nbreponsesAssignement+1;
      addReponsesAssignement($('.Assignement'));
    });
    $('.QCM').on('click','.close',function(e){
      console.log(e);
      $(e.target.parentElement).remove();
    });
    $('.QCU').on('click','.close',function(e){
      console.log(e);
      $(e.target.parentElement).remove();
    });
    $('.Assignement').on('click','.close',function(e){
      console.log(e);
      $(e.target.parentElement).remove();
    });
});


</script>
