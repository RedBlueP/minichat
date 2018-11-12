<!DOCTYPE html>
	<html>
	<head>
		<script type="text/javascript" src="lib/js/jquery.js"></script>
		<script src="lib/js/bootstrap.js"></script>
		<link rel="stylesheet" href="lib/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="src/css/style.css">
		<meta charset="utf-8">
		<title>Mini-Chat</title>
	</head>
	<body class="bg-dark">
		<div style="color:white">
		<?php
			print_r($_SESSION);
		 ?>
</div>

		<div class="container centered p-3">
			<a data-toggle="modal" class="btn btn-danger" data-target="#exampleModal1">Connexion</a>
			<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			    <div class="modal-dialog" role="document">
			       <div class="modal-content">
				        <form action="index.php" method="post">
				             <div class="modal-body">
				               <div class="form-group">
				                   <label for="exampleInputEmail1">Pseudo</label>
				                   <input type="text" class="form-control" name="Lpseudo" id="pseudo" placeholder="Pseudo" aria-describedby="emailHelp">
				               </div>
				               <div class="form-group">
				                   <label for="exampleInputPassword1">Mot de passe</label>
				                   <input type="password" class="form-control" name="Lpassword" id="password" placeholder="Mot de passe">
				               </div>
				             </div>
				            <div class="modal-footer">
				               <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
				               <button type="submit" class="btn btn-danger">Connexion</button>
				            </div>
				        </form>
			       	</div>
			    </div>
			</div>
			<a data-toggle="modal" class="btn btn-danger" data-target="#exampleModal2">S'inscrire</a>
			<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		    	<div class="modal-dialog" role="document">
		       		<div class="modal-content">
		         		<form action="index.php" method="post">
		             		<div class="modal-body">
		               			<div class="form-group">
		                   			<label for="exampleInputEmail1">Pseudo</label>
		                   			<input type="text" class="form-control" name="Rpseudo" id="pseudo" placeholder="Pseudo" aria-describedby="emailHelp">
		               			</div>
		               			<div class="form-group">
		               				<label for="exampleInputPassword1">Password</label>
		                   			<input type="password" class="form-control" name="Rpassword" id="password" placeholder="Password">
		               			</div>
		             		</div>
		             		<div class="modal-footer">
		               			<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fermer</button>
		               			<button type="submit" class="btn btn-danger">S'inscrire</button>
		             		</div>
		             		<div class="text-danger"><?=$messageErreur ?></div>
		         		</form>
		       		</div>
		     	</div>
   			</div>

   			<form action="index.php" method="POST">
   				<input type="hidden" name="deconnexion">
   				<button type="submit" class="btn btn-outline-danger float-right" id="deconnexion">Déconnexion</button>
   			</form>
   			<div class="form-group">
				<div class="form-control shadow-lg bg-white rounded text-center font-weight-bold border-danger text-danger bg-light" id="nomchat">Chat</div>
  					<div class="border-top-0 form-control shadow-lg p-3 h-25 bg-white rounded border-dark bg-light" id="zonetexte">
	  					<?php
							while ($donnees = $reponse->fetch()) {
								echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> :' . htmlspecialchars($donnees['message']) . '</p>';
							}
						?>
					</div>
			    <form action="index.php" method="post">
			        <div class="input-group">
			        	<div class="input-group-prepend">
			        		<input type="text" size="135" name="message" id="message" class="form-control border-danger bg-light" placeholder="Message" aria-label="message" aria-describedby="button-addon2"/>
							<div class="input-group-append">
    							<button class="btn btn-outline-danger" type="submit" id="button-addon2">Envoyer</button>
  							</div>
						</div>
					</div>
				</form>
			</div>
	</body>
</html>