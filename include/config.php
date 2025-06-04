<?php 


try {

$titre = "GESTION DEPENSE 25";

$nom_serveur = "localhost";
$nom_user = "root";
$mot_de_passe ="";
$dbname = "gestion_depense_billgates_soir_25";

$cnx = new PDO("mysql:host=$nom_serveur;dbname=$dbname" , "$nom_user" ,"$mot_de_passe");

	
} catch (Exception $e) {
		echo "erreur de connexion";
}

