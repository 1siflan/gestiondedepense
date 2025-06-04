<?php 
session_start();


if($_SESSION['user_connecter'] > 0){

}else{
	header("location:index.php");
}

include("assets/include/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?=$titre?></title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/css/all.css">
	<script type="text/javascript" src="assets/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/datatable.css">
	<script type="text/javascript" src="assets/js/datatable.js"></script>

</head>
<body class="bg-light">
	


	<nav class="navbar navbar-expand-lg bg-success" data-bs-theme="dark">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">GS-DEPENSE</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

	        <li class="nav-item">
	          <a class="nav-link " aria-current="page" 
	          href="?pages=dash"><i class="fa fa-house"></i> Acceuil</a>
	        </li>

	         <li class="nav-item">
	          <a class="nav-link " aria-current="page" 
	          href="?pages=categorie"><i class="fa fa-tag"></i>   Catégories</a>
	        </li>

	         <li class="nav-item">
	          <a class="nav-link " aria-current="page" 
	          href="?pages=depense"><i class="fa fa-dollar"></i> Dépenses</a>
	        </li>

	         <li class="nav-item">
	          <a class="nav-link " aria-current="page" 
	          href="?pages=user"><i class="fa fa-users"></i> Utilisateur</a>
	        </li>
	        
	      </ul>


	      <div class="mx-5 text-light">
	      	<a href="assets/include/logout.php">
	      	<i class="fa fa-lock"></i>
	      	</a>

	      	 <?=$_SESSION['user_name']?>
	      </div>
	      
	    </div>
	  </div>
	</nav>




	<div class="container mt-5">
		

		<div class="card">
			<div class="card-body">
				<?php 

					

					if(isset($_GET['pages'])){
						
						if($_GET['pages'] == "depense"){
							include 'pages/depense.php';
						}

						if($_GET['pages'] == "categorie"){
							include 'pages/categorie_depense.php';
						}

						if($_GET['pages'] == "user"){
							include 'pages/users.php';
						}

						if($_GET['pages'] == "dash"){
							include 'pages/tableau_de_bord.php';
						}


					}else{

						include 'pages/tableau_de_bord.php';
					}

					





				 ?>
			</div>
		</div>

	</div>



	<script type="text/javascript" src="assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/all.js"></script>
</body>
</html>
