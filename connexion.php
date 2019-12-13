<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="design.css" type="text/css">
</head>


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
        <a class="nav-link" href="suiviremb.php">Remboursement</a>
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
<legend class="con">Connexion</legend>
<?php

$titre="Connexion";
include("identifiants.php");


	

if (!isset($_POST['login'])) //On est dans la page de formulaire
{
	echo '<form method="post" action="connexion.php">
	<fieldset>
  <p>
	<label for="login" class="id2">Identifiants :</label><input class="inid" name="login" type="text" id="login" /><br />
	<label for="password" class="id2">Mot de Passe :</label><input class="inid2" type="password" name="password" id="password" />
	</p>
	</fieldset>
	<p><input class="id" type="submit" value="Connexion" /></p></form>
	<a href="./register.php" class="id">Pas encore inscrit ?</a>
	 
	</div>
	</body>
	</html>';
}
else
{
    $message='';
    if (empty($_POST['login']) || empty($_POST['password']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="./connexion.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe
    {
        $stmt = mysqli_prepare('SELECT nom, prenom, login, mdp/*,type*/,id, id_cat
        FROM visiteur WHERE login = :login');
        $stmt = bindValue(':login',$_POST['login'], PDO::PARAM_STR);
        $query = execute();
        $data=$stmt->fetch();
	if ($data['mdp'] == ($_POST['password'])) // Acces OK !
	{
	    $_SESSION['login'] = $data['login'];
	    //$_SESSION['level'] = $data['type'];
	    $_SESSION['id'] = $data['id'];
	    $message = '<p>Bienvenue '.$data['nom'].$data['prenom'].', 
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a> 
      pour revenir à la page d accueil</p>';  
  
	}
	else // Acces pas OK !
	{
        
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="./connexion.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />Cliquez <a href="./index.php">ici</a> 
	    pour revenir à la page d accueil</p>';
	}
    $stmt->CloseCursor();
    }
    echo $message.'</div></body></html>';

}



?>