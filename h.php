<?php 
session_start();
include("assets/include/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$titre?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
</head>
<body class="bg-light">
	

<br>
<br>
<br>

<form action="" method="POST">
	<div class="row mt-5">

			

			<div class="col-md-4 col-12"></div>
			<div class="col-md-4 col-12">

				<div class="text-center mb-4">
					<img class="w-25" src="assets/images/logo.jpg">
				</div>
				<div class="card">
					<div class="card-body p-5">




							<?php 

							

							

								if(isset($_POST['btn_login'])){

									$login = $_POST['login'] ;
									$pwd = $_POST['pwd'] ;

									$r = $cnx->query("SELECT * FROM `users` WHERE login ='$login' and pwd='$pwd'; ");

									foreach ($r as  $valeur) {
										$_SESSION['user_name'] = $valeur["nom"] ?? "Pas de nom" ;
										$_SESSION['user_id'] = $valeur[0]  ;
									}

									if($r->rowCount()>0){
										$_SESSION['user_connecter'] = true ;
										header("location:home.php");
									}else{

											$_SESSION['user_connecter'] = false ;
										echo '<div class="alert alert-danger">Attention login ou mot de passe incorrect !</div>';
									}
								}

							 ?>


							
							
							<div class="mb-2">
								Login : 
								<input type="text" name="login" class="form-control">
							</div>


							<div class="mb-2">
								Mot de passe : 
								<input type="password" name="pwd" class="form-control">
							</div>



							<div class="mb-2">
								<button type="submit" name="btn_login" class="btn btn-success w-100">Connexion</button>
							</div>

					</div>
				</div>
			</div>
			<div class="col-md-4 col-12"></div>

	</div>

</form>

	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>
