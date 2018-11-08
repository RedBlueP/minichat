<?php
session_start();
try {
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(PDOException $e) {
	die('Erreur');
}

function generateRandomString($length = 10) {
	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

if(isset($_POST['Rpassword']) && isset($_POST['Rpseudo'])) {
	$pass_hache = password_hash($_POST['Rpassword'], PASSWORD_DEFAULT);
	$req = $bdd->prepare('INSERT INTO utilisateur (pseudo, password) VALUES(?, ?)');
	$req->execute([$_POST['Rpseudo'], $pass_hache]);
}
if(isset($_POST['Lpassword']) && isset($_POST['Lpseudo'])) {
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = ?');
	$req->execute([$_POST['Lpseudo']]);
	$result = $req->fetch();
	if($result) {
		if(password_verify($_POST['Lpassword'], $result['password'])) {
			$cookie = generateRandomString(32);
			$req = $bdd->prepare('UPDATE utilisateur SET cookie = ? WHERE pseudo = ?');
			$req->execute([$cookie, $_POST['Lpseudo']]);
			$_SESSION['auth'] = $cookie;
		}
		else echo "pas valide";
	}
	else echo "no result";
	exit;
}
if(isset($_POST['message'])) {
	$req = $bdd->prepare('INSERT INTO minichat (message, utilisateurId) VALUES(?, ?)');
	$req->execute(array( $_POST['pseudo'], $pass_hache));
}

header('Location: minichat.php');