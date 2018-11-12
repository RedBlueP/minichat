<?php


session_start();

function co(){
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
		return $bdd;
	} catch(PDOException $e) {
		die('Erreur');
	}
}

function checkUser($pseudo) {
	$bdd = co();
	$req = $bdd->prepare('SELECT ID FROM utilisateur WHERE pseudo = :pseudo');
	$req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
	$req->execute();
	return $req->rowCount();
}

function insertUser($pseudo, $pwd) {
	$bdd = co();
	$req = $bdd->prepare('INSERT INTO utilisateur (pseudo, password) VALUES(:pseudo, :password)');
	$req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
	$req->bindParam(':password', $pwd, PDO::PARAM_STR);
	$req->execute();
	return $req;
}

function showMessage() {
	$bdd = co();
	$reponse = $bdd->query('
		SELECT pseudo, message 
		FROM minichat 
		LEFT JOIN utilisateur
			ON utilisateur.id = minichat.utilisateurId
		ORDER BY minichat.id DESC 
		LIMIT 0, 10
		');
	return $reponse;
}

function loginUser($pseudo, $pwd) {
	$bdd = co();
	$req = $bdd->prepare('SELECT * FROM utilisateur WHERE pseudo = :pseudo AND password = :password');
	$req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
	$req->bindParam(':password', $pwd, PDO::PARAM_STR);
	$req->execute();
	return $req;
}

function sendMessage ($msg) {
	$bdd = co();
	$req = $bdd->prepare('INSERT INTO minichat (message, utilisateurId) VALUES(?, ?)');
	$req->execute(array( $msg, $_SESSION['idUtilisateur']));
}