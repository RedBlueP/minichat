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
				               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
		               			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		               			<button type="submit" class="btn btn-primary">S'inscrire</button>
		             		</div>
		             		<div class="text-danger"><?=$messageErreur ?></div>
		         		</form>
		       		</div>
		     	</div>
   			</div>
   			<div class="form-group">
				<div class="form-control shadow-lg bg-white rounded text-center font-weight-bold border-danger text-danger bg-light" id="nomchat">Chat</div>
  					<div class="border-top-0 form-control shadow-lg p-3 mb-5 h-25 bg-white rounded border-dark bg-light" id="zonetexte">
	  					<?php
							while ($donnees = $reponse->fetch()) {
								echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> :' . htmlspecialchars($donnees['message']) . '</p>';
							}
						?>
					</div>
			    <form action="index.php" method="post">
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
		<a href="controller/deconnexion.php"><button type="submit" class="btn btn-outline-danger" id="deconnexion">Déconnexion</button></a>
	</body>
</html>