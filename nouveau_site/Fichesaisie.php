<?php
if (session_start())
{
  echo $_SESSION['login'];
}
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
        <a class="nav-link" href="Fichesaisie.php">Fiche frais</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="suiviremb.php">Remboursement</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="validation.php">Validation</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="deconnexion.php">Déconnexion</a>
        </li>
      
       
    
    </ul>
    
  </div>
</nav>
</body>
</html>
<?php
$titre="Connexion";
include("identifiants.php");
$user = $_SESSION['login'];

$query=$db->prepare(
  'SELECT visiteur.id AS id,
  visiteur.login AS login
  FROM visiteur 
  WHERE visiteur.login = :user ');
  $query->bindValue(':user', $user, PDO::PARAM_STR);
  $query->execute();
if ($data=$query->fetch())
{

echo '<form method="post" action="Fichesaisie.php">
<fieldset>
<p class="pe"> PERIODE DENGAGEMENT </p>
<legend> Saisie </legend>
<p> 
<label class="txtmois" for="mois">Mois (2 chiffres) :</label><input class="mois" name="mois" type="text" id="mois" /><br />
<label class="txtannee for="txtAnnee">Année (4 chiffres) :</label><input class="annee" name="annee" type="text" id="Annee" />
</p>
</fieldset></html>';
if(empty($_POST['mois']))
{
    echo '<p>Veuillez entrer un mois</p>';
}
else
{
  $req = $db->prepare("INSERT INTO fichefrais(idVisiteur, mois, annee) 
                      VALUES(?, ?, ?)");
 if ($req->execute(array($data['id'], $_POST['mois'], $_POST['annee'])))
 {
   echo '<p>Data saved</p>';
 }
 else
 {
   echo '<p>Not saved</p>';
 }
}
}


echo '<form method="post" action="Fichesaisie.php">
<fieldset>
<legend> Frais au forfait  </legend>
<p>
<label class="labfrais" for="txtRepas">Repas midi :</label><input class="infrais" name="Repas" type="Repas" id="Repas" /><br />
<label class="labfrais" for="txtNuitee">Nuitée :</label><input class="infrais2" name="Nuitee" type="text" id="Nuitee" /><br />
<label class="labfrais" for="txtEtape">Étape :</label><input class="infrais3" name="Etape" type="text" id="Etape" /><br />
<label class="labfrais" for="txtkm">Km :</label><input class="infrais4" name="Km" type="text" id="Km" /><br />
</p>
</fieldset></html>';
if(empty($_POST['Repas']))
{
    echo '<p>Veuillez entrer un mois</p>';
}
else
{
  $req2 = $db->prepare("INSERT INTO frais_forfait(repas_midi, nuitee, etape, km) VALUES(?, ?, ?, ?)");
  if ($req2->execute(array($_POST['Repas'], $_POST['Nuitee'], $_POST['Etape'], $_POST['Km'])))
  {
    echo '<p>Data saved</p>';
  }
  else
  {
    echo '<p>Not saved</p>';
  }
}

echo '<form method="post" action="Fichesaisie.php">
<fieldset>
<legend> Hors forfait  </legend>
<p>
<label class="labhf" for="txtDate">Date :</label><input class="inhf1" name="Date" type="Repas" id="Date" /><br />
<label class="labhf" for="txtLibellé">Libellé :</label><input class="inhf2" name="Libellé" type="text" id="Libellé" /><br />
<label class="labhf" for="txtQté">Qté :</label><input class="inhf3" name="Qté" type="text" id="Qté" /><br />
</p>
</fieldset>';
if(empty($_POST['Date']))
{
  echo '<p>Veuillez entrer une date</p>';
}
else
{
$req3 = $db->prepare("INSERT INTO frais_hf (date, libelle, Qte) VALUES(?, ?, ?)");
if ($req3->execute(array($_POST['Date'], $_POST['Libellé'], $_POST['Qté'])))
{
  echo '<p>Data saved</p>';
}
else
{
  echo '<p>Not saved</p>';
}
}

echo'
<fieldset>
<legend> Hors classification </legend>
<p>
<label class="labhf" for="txtNbrJust">Nombre justificatifs :</label><input class="inhc1" name="NbrJust" type="Repas" id="NbrJust" /><br />
<label class="labhf" for="txtMonTot">Montant total :</label><input class="inhc2" name="MonTot" type="text" id="MonTot" /><br />
</p>
</fieldset>';
if(empty($_POST['NbrJust']))
{
  echo '<p>Veuillez entrer une date</p>';
}
else
{
$req4 = $db->prepare("INSERT INTO horsclassification (nbr_just, mont) VALUES(?, ?)");
if ($req4->execute(array($_POST['NbrJust'], $_POST['MonTot'])))
{
  echo '<p>Data saved</p>';
}
else
{
  echo '<p>Not saved</p>';
}
}


echo '
<div>
<p><input class="effacer" type="submit" value="Effacer" /></p>
</div>
<div>
<p><input class="effacer" type="submit" value="Valider" /></p>
</div>
</body>
</html>';
?>