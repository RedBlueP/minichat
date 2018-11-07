<<?php 
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}

catch(Exception $e)
{
 die('Erreur');
}
$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
$req = $bdd->prepare('INSERT INTO minichat (message, utilisateurId) VALUES(?, 1)');
$req->execute(array( $_GET['message']));
$req = $bdd->prepare('INSERT INTO utilisateur (pseudo, password) VALUES(?, ?)');
$req->execute(array( $_GET['pseudo']));

header('Location: minichat.php');