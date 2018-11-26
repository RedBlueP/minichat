<?php
require('model/modele.php');
if(isset($_POST['message']) && isset($_SESSION['idUtilisateur'])){
	sendMessage($_POST['message']); 
}

$reponse = showMessage();

if(isset($_POST['deconnexion'])) {
	$_SESSION=array(); 
	session_destroy(); 
}

$messageErreur = "";
if(isset($_POST['Rpassword']) && isset($_POST['Rpseudo'])) {
	$existPas = checkUser($_POST['Rpseudo']);
	if(!$existPas) {
		insertUser($_POST['Rpseudo'], $_POST['Rpassword']);
		$messageErreur = "!";
	} else {
		$messageErreur = "*Le pseudo est déjà pris.";
	}
}

if(isset($_POST['Lpassword']) && isset($_POST['Lpseudo'])){
	$req = loginUser($_POST['Lpseudo'], $_POST['Lpassword']);
	while ($donnees = $req->fetch()){
		$_SESSION['idUtilisateur']=$donnees['id'];
	}
}


require_once 'vendor/autoload.php';

$loader = new Twig_Loader_Filesystem('view');
$twig = new Twig_Environment($loader);

$twig->addGlobal('session', $_SESSION);

$template = $twig->loadTemplate('index.twig.html');

echo $twig->render($template, array(
	'messageErreur' => $messageErreur,
	'reponse' => $reponse,
	'param3' => 'reo'
));


//require_once 'view/minichatView.php';