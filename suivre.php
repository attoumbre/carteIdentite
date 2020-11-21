<?php

include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));

if(isset($_GET['numero']))
{
$id_personne=$_GET['numero'];
$requete="SELECT * FROM personne,sexe WHERE 'personne.id_sexe'='sexe.id_sexe' and numero='numero' ";
$result=$cnx->query($requete);
$liste=$result->$ligne=mysqli_fetch_assoc($requete);
   $photo=$liste['lien_photo'];
   $nom=$liste["nom"];
   $prenom=$liste["prenom"];  
   $date=$liste["date_naiss"];
   $sexe=$liste["lib_sexe"];
}
if(isset($_POST['submit']) && isset($_POST['hidden']))
{
	$id_hidden=$_POST["hidden"];
	$requete="DELETE FROM personne WHERE numero=$id_hidden ";
	$result=$cnx->query($requete);
    if($result)
	  {$sms="<script type=text/javascript>alert('suppression terminée')</script>";}
        else 
	  {$sms="suppression echouée";}	
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

<h2><em>VOULEZ VOUS VRAIMENT SUPPRIMER CETTE PERSONNE DE LA BASE ?</em></h2>

<form method="POST" action="supprimer.php" enctype="multipart/form-data">
<table>
<tr><td>nom<input type="text" value="<?php if(isset($nom)){echo $nom;}?>"></td>
    <td>prenom<input type="text" value="<?php if(isset($prenom)){echo $prenom;}?>"></td>
	<td>date<input type="text" value="<?php if(isset($date)){echo $date;}?>"></td>
	<td>sexe<input type="text" value="<?php if(isset($sexe)){echo $sexe;}?>"></td>
	<td height=5%><img src="images/<?php if(isset($photo)){echo $photo;}?>" width=15% height=100%></td>
	<input type="hidden" name="hidden" value="<?php if(isset($_GET['numero'])){echo $_GET['numero'];}?>" />
</tr>

    
</table>
    <input type="submit" name="submit" value="SUPPRIMER">
    <input type="button" name="button" value="ANNULER">
</form>
<p><?php if(isset($sms)){header("location:affichage.php");}?></P>

</div>
</body>
</html>
