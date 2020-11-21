<?php
include("connect/cnx.inc.php");

$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or exit(mysqli_error($cnx));
if(isset($_POST['submit']))
{
	$numero=htmlentities($_POST['numero']);
$requete =
 "DELETE  FROM personne WHERE numero='$numero'";
 $requete = mysqli_query($cnx,$requete) or die(mysqli_error($cnx));
if($requete)
{
$sup="<script type=text/javascript>alert(' Suppression reussit')</script>";
header("location:affichage.php");
}
else
{
$error="<script type=text/javascript>alert('Echec de suppresion')</script>";
}

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="#" />
	<link rel="stylesheet" href="style/entete.css" />
	<title>supprimer personne</title>
</head>
<body>
<div id="bloc_page">
  <?php include("entete.php");?>

<h1>BIENVENUE DANS L'ESPACE SUPPRESSION DE DONNEES</h1>
<p>cet espace vous permettra de supprimer des données dans la base de données de l'application</p>

<h2><em>Veillez confirmer le numéro à supprimer</em></h2>

<form method="POST" action="supprimer.php" enctype="multipart/form-data">
	numero <input type="text" name="numero">
    <input type="submit" name="submit" value="SUPPRIMER">
    <input type="reset" name="button" value="ANNULER">
    <p><?php if(isset($sms)){header("location:affichage.php");}?></P>

</form>

</div>
</body>
</html>