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
      <li class="nav-item active">
        <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Fiche frais<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="suiviremb.php">Remboursement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="validation.php">Validation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Se déconnecter</a>
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
<form method="post" action="Fichesaisie.php">



  <?php
  $titre="Connexion";
  include("Identifiants.php");
  //$mois = $_POST['mois'];
 // $annee = $_POST['annee'];
  if (empty($_POST['mois'])){
    echo '<form method="post" action="Fichesaisie.php">
    <fieldset>
    <p class="pe"> PERIODE DENGAGEMENT </p>
    <legend> Saisie </legend>
    <p> 
    <label class="txtmois" for="mois">Mois (2 chiffres) :</label><input class="mois" name="mois" type="text" id="mois" /><br />
     <label class="txtannee for="txtAnnee">Année (4 chiffres) :</label><input class="annee" name="Annee" type="text" id="annee" />
    </p>
    </fieldset></html>';}
  else {
    $stmt = mysqli_prepare($link, "INSERT INTO fichefrais(idVisiteur, mois, idEtat) VALUES(?, ?, ?, ?)");
  
     mysqli_stmt_execute(array($_SESSION['id'], $_POST['mois'], $text= "CR"));
}
 echo '<div >
<p><input class="effacer" type="submit" value="Valider" /></p>
</div>'

?>