<?php 

include 'config.php';




if(isset($_POST['btn_ajouter'])){
	$nom = $_POST['nom'];
	$login = $_POST['login'];
	$pwd = $_POST['pwd'];
	$role = $_POST['role'];


	$cnx->query("INSERT INTO `users`(`id_user`, `nom`, `login`, `pwd`, `role`)  VALUES  (NULL,'$nom','$login','$pwd','$role')");


	header("location:../../home.php?pages=user");
	

}




if(isset($_POST['btn_modifier'])){

	$nom = $_POST['nom'];
	$login = $_POST['login'];
	$pwd = $_POST['pwd'];
	$role = $_POST['role'];
	$id = $_POST['id'];




	$cnx->query("UPDATE `users` SET `nom`='$nom',`login`='$login',`pwd`='$pwd',`role`='$role' WHERE id_user='$id'");


	header("location:../../home.php?pages=user");
	

}





if(isset($_GET['id_user_sup'])){

	$id = $_GET['id_user_sup'];
	

	$cnx->query("DELETE FROM `users` WHERE id_user = '$id'");


	header("location:../../home.php?pages=user");
	

}






// code pour la page catégorie 




if(isset($_POST['btn_ajouter_cat'])){
	$nom = $_POST['nom'];
	
	$cnx->query("INSERT INTO `categorie_depense`(`id_cat`, `nom`) VALUES (NULL,'$nom')");

	header("location:../../home.php?pages=categorie");
	

}


if(isset($_POST['btn_modifier_cat'])){

	$nom = $_POST['nom'];
	
	$id = $_POST['id'];


	$cnx->query("UPDATE `categorie_depense` SET `nom`='$nom' WHERE id_cat='$id'");


	header("location:../../home.php?pages=categorie");
	

}


if(isset($_GET['id_cat_sup'])){

	$id = $_GET['id_cat_sup'];
	
	$cnx->query("DELETE FROM `categorie_depense` WHERE id_cat = '$id'");

	header("location:../../home.php?pages=categorie");
	

}


// fin code page catégorie 










// code pour la page depense 




if(isset($_POST['btn_ajouter_depense'])){
	
	$nom = $_POST['nom'];
	$date_dep = $_POST['date_dep'];
	$montant = $_POST['montant'];
	$note = $_POST['note'];
	$id_cat = $_POST['id_cat'];
	$id_user = $_POST['id_user'];
	 

	$cnx->query("INSERT INTO `depense`(`id_depense`, `nom`, `date_dep`, `montant`, `note`, `id_cat`, `id_user`) VALUES (NULL,'$nom','$date_dep','$montant','$note','$id_cat','$id_user')");

	header("location:../../home.php?pages=depense");
	

}


if(isset($_POST['btn_modifier_depense'])){

	$nom = $_POST['nom'];
	
	$id = $_POST['id'];


	$cnx->query("UPDATE `categorie_depense` SET `nom`='$nom' WHERE id_cat='$id'");


	header("location:../../home.php?pages=depense");
	

}


if(isset($_GET['id_depense_sup'])){

	$id = $_GET['id_cat_sup'];
	
	$cnx->query("DELETE FROM `categorie_depense` WHERE id_cat = '$id'");

	header("location:../../home.php?pages=depense");
	

}


// fin code page depense 