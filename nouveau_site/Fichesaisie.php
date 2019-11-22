<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="design.css" type="text/css">

</head>

<?php
$titre = "Index du forum";
include("identifiants.php");
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">GSB</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <?php 
      if(empty($_SESSION)){
        echo ('<li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
        </li>');}
      else {
        echo ('<li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Déconnexion</a>
        </li>');};
      
      
      
      ?>
      
      <li class="nav-item">
        <a class="nav-link" href="Fichesaisie.php">Fiche frais</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Remboursement<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="validation.php">Validation</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    
  </div>
</nav>
</body>
</html>
<?php
$titre="Connexion";
include("identifiants.php");
if (!isset($_POST['mois'])){
echo '<form method="post" action="Fichesaisie.php">
<fieldset>
<p class="pe"> PERIODE DENGAGEMENT </p>
<legend> Saisie </legend>
<p> 
<label class="txtmois" for="mois">Mois (2 chiffres) :</label><input class="mois" name="mois" type="text" id="mois" /><br />
<label class="txtannee for="txtAnnee">Année (4 chiffres) :</label><input class="annee" name="Annee" type="text" id="Annee" />
</p>
</fieldset></html>';}
else
{
  $req = $db->prepare("INSERT INTO fichefrais(idVisiteur, mois, idEtat) VALUES(?, ?, 'CR')");
  $req->execute(array($_SESSION['id'], $_POST['mois']));
}

if (!isset($_POST['mois'])){
echo '<form method="post" action="Fichesaisie.php">
<fieldset>
<legend> Frais au forfait  </legend>
<p>
<label class="labfrais" for="txtRepas">Repas midi :</label><input class="infrais" name="Repas" type="Repas" id="Repas" /><br />
<label class="labfrais" for="txtNuitee">Nuitée :</label><input class="infrais2" name="Nuitee" type="text" id="Nuitee" /><br />
<label class="labfrais" for="txtEtape">Étape :</label><input class="infrais3" name="Etape" type="text" id="Etape" /><br />
<label class="labfrais" for="txtkm">Km :</label><input class="infrais4" name="Km" type="text" id="Km" /><br />
</p>
</fieldset></html>';}
else
{
  $req = $db->prepare("INSERT INTO fraisforfait(id, , idEtat) VALUES(?, ?, 'CR')");
  $req->execute(array($_SESSION['id'], $_POST['mois']));
}

<fieldset>
<legend> Hors forfait  </legend>
<p>
<label class="labhf" for="txtDate">Date :</label><input class="inhf1" name="Date" type="Repas" id="Date" /><br />
<label class="labhf" for="txtLibellé">Libellé :</label><input class="inhf2" name="Libellé" type="text" id="Libellé" /><br />
<label class="labhf" for="txtQté">Qté :</label><input class="inhf3" name="Qté" type="text" id="Qté" /><br />
</p>
</fieldset>

<fieldset>
<legend> Hors classification </legend>
<p>
<label class="labhf" for="txtNbrJust">Nombre justificatifs :</label><input class="inhc1" name="NbrJust" type="Repas" id="NbrJust" /><br />
<label class="labhf" for="txtMonTot">Montant total :</label><input class="inhc2" name="MonTot" type="text" id="MonTot" /><br />
</p>
</fieldset>
<div >
<p><input class="effacer" type="submit" value="Effacer" /></p>
</div>
<div >
<p><input class="effacer" type="submit" value="Valider" /></p>
</div>
</body>
</html>'
?>