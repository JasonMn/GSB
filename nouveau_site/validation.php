<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="design.css" type="text/css">
</head>

<?php
//Cette fonction doit être appelée avant tout code html
session_start();

//On donne ensuite un titre à la page, puis on appelle notre fichier debut.php
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
      <li class="nav-item">
        <a class="nav-link" href="Fichesaisie.php">Fiche frais</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="suiviremb.php">Remboursement</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Validation<span class="sr-only">(current)</span></a>
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
<?
//session_start();
$titre="Connexion";
include("identifiants.php");

echo '<form method="post" action="connexion.php">
<fieldset>
<legend> Validation des frais par visiteur : </legend>
<p>
<label for="txtPeriode" class="txtmois">Choisir les visiteurs :</label>
<select class="choixvis" name="visiteur" id="vis_select">
<option value=""> --Choisir le visiteur-- </option>

</select>


<br />
</p>
</fieldset>

<fieldset>
<legend>Frais au forfait</legend>
<table class="table">
<thead>
<tr>
    <th>Repas midi</th>
    <th>Nuitée</th>
    <th>Étape</th>
    <th>Km</th>
    <th>Situation</th>
</tr>
</thead>
<tbody>
<tr>
    <td><input name="Repas" type="Repas" id="Repas" /> </td>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><select class="choixvis" name="visiteur" id="vis_select">
    <option value="">Enregistré</option>
    <option value="">Validé</option>
    <option value="">Remboursé</option>
    </select></td>
    
</tr>
</tbody>
</table>
</fieldset>

<fieldset>
<legend>Hors forfait</legend>
<table class="table">
<thead>
<tr>
    <th>Date</th>
    <th>Libellé</th>
    <th>Montant</th>
    <th>Situation</th>
</tr>
</thead>
<tbody>
<tr>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><select class="choixvis" name="visiteur" id="vis_select">
    <option value="">Enregistré</option>
    <option value="">Validé</option>
    <option value="">Remboursé</option>
    </select> </td>
</tr>
</tbody>
</table>
</fieldset>

<fieldset>
<legend>Hors classification</legend>
<table class="table">
<thead>
<tr>
    <th>Nbr justificatifs</th>
    <th>Montant</th>
    <th>Situation</th>
</tr>
</thead>
<tbody>
<tr>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><input name="Repas" type="Repas" id="Repas" /></td>
    <td><select class="choixvis" name="visiteur" id="vis_select">
    <option value="">Enregistré</option>
    <option value="">Validé</option>
    <option value="">Remboursé</option>
    </select></td>
</tr>
</tbody>
</table>
</fieldset>
<div >
<p><input class="effacer" type="submit" value="Effacer" /></p>
</div>
<div >
<p><input class="effacer" type="submit" value="Valider" /></p>
</div>
</body>
</html>