<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=gsb_frais', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
?>
