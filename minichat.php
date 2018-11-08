<!DOCTYPE html>
	<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<meta charset="utf-8">
		<title>Mini-Chat</title>
	</head>
	<body class="bg-dark">
		<div class="container centered p-3">
			<h3 class="text-center text-white">LOGIN</h3>
			<form action="minichat_post.php" method="post">
				<div class="form-inline justify-content-center p-1 mb-2">
					<input type="text" class="form-control col-sm-2 border-danger bg-light" id="pseudo" name="Lpseudo" placeholder="Pseudo">
					<input type="password" class="form-control col-sm-2 border-danger bg-light" name="Lpassword" id="password" placeholder="Mot de passe">
				    <button type="submit" class="btn btn-danger">Submit</button>
				</div>
			</form>
			<h3 class="text-center text-white">REGISTER</h3>
			<form action="minichat_post.php" method="post">
				<div class="form-inline justify-content-center p-1 mb-5">
					<input type="text" class="form-control col-sm-2 border-danger bg-light" id="pseudo" name="Rpseudo" placeholder="Pseudo">
					<input type="password" class="form-control col-sm-2 border-danger bg-light" name="Rpassword" id="password" placeholder="Mot de passe">
				    <button type="submit" class="btn btn-danger">Submit</button>
				</div>
			</form>
			<div class="form-group">
				<div class="form-control shadow-lg bg-white rounded text-center font-weight-bold border-danger text-danger bg-light" id="nomchat">Chat</div>
  					<div class="border-top-0 form-control shadow-lg p-3 mb-5 h-25 bg-white rounded border-dark bg-light" id="zonetexte">
  					
	  					<?php
							try
							{
								$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
							}	
							catch(Exception $e)
							{
								die('Erreur');
							}

							session_start();
							echo $_SESSION['auth'];
							
							$reponse = $bdd->query('
								SELECT pseudo, message 
								FROM minichat 
								LEFT JOIN utilisateur
									ON utilisateur.id = minichat.utilisateurId
								ORDER BY minichat.id DESC 
								LIMIT 0, 10');

							while ($donnees = $reponse->fetch()) {
								echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> :' . htmlspecialchars($donnees['message']) . '</p>';
							}

							$reponse->closeCursor();

						?>
					</div>
			    <form action="minichat_post.php" method="post">
			        <div class="input-group mb-3">
			        	<div class="input-group-prepend">
			        		 <input type="text" name="message" id="message" class="form-control border-danger bg-light" placeholder="Message" aria-label="message" aria-describedby="button-addon2"/>
							<div class="input-group-append">
    							<button class="btn btn-outline-danger" type="submit" id="button-addon2">Envoyer</button>
  							</div>
						</div>
					</div>
				</form>
		</div>

	</body>
</html>
