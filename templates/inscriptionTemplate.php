<div class="inscription">
  <h2>Inscription</h2>
  <?php
  if(isset($args['inscErrorText']))
  echo '<span class="error">' . $args['inscErrorText'] . '</span>';
  ?>
  <form action="index.php" method="post">
    <div class="form-group">
      <input class="form-control" id="loginInscription" type="text" name="inscLogin" placeholder="Login" required maxlength="50" autofocus>
    </div>
    <div class="form-group">
      <input class="form-control" id="PwdInscription" type="password" name="inscPassword" placeholder="Mot de passe" required minlength="8" maxlength="50">
    </div>
    <div class="form-group">

      <input class="form-control" id="nomInscription" type="text" name="nom" placeholder="Nom" required maxlength="30">
    </div>
    <div class="form-group">
      <input class="form-control" id="prenomInscription" type="text" name="prenom" placeholder="Nom" required maxlength="30">
    </div>
    <div class="form-group">
      <input class="form-control" id="mailInscription" type="email" name="email" placeholder="Email" required maxlength="100">
    </div>
    <div class="form-groupe">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="etudiant" value="Etudiant" onclick="afficherPourEtudiant(); enleverPourEnseignant();">
        <label class="form-check-label" for="etudiant">Etudiant</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="enseignant" value="Enseignant" onclick="afficherPourEnseignant(); enleverPourEtudiant();">
        <label class="form-check-label" for="enseignant">Enseignant</label>
      </div>
    </div>
    <div class="eleve form-group ">
      <input class="form-control" type="number" name="Promo" placeholder="Promo">
    </div>
    <div class="eleve form-group">
      <input class="form-control" type="number" name="Groupe" placeholder="Groupe">
    </div>
    <div class="eleve form-group">
      <input class="form-control" type="number" name="td" placeholder="TD">
    </div>
    <div class="enseignant form-group" >
      <input class="form-control" type="number" name="Matricule" maxlength="10" placeholder="Matricule">
    </div>
    <div class="enseignant form-group">
      <input class="form-control" type="text" name="Mat_enseignee" maxlength="30" placeholder="Matière enseignée">
    </div>
    <div class="enseignant form-group">
      <label class="form-check-label" for="inlineCheckbox1">Intervenant Extérieur :</label>
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1" name="Int_Ext">
    </div>
    <button type="submit" class="btn btn-primary">Creer mon compte</button>
  </form>
</div>
