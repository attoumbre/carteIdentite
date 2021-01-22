<?php
include ("connect.php");

if(isset($_GET['id_personne'])){

	$numero=htmlentities($_GET['id_personne']);
	delete_personne($numero);
	header('location:affichage.php');

}

?>
