<?php

include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));
//initialisation de données
if(isset($_POST['submit'])){
	$mot=htmlentities($_POST['motcle']);
	if(is_numeric($mot) or empty($mot)){
		$error="<script type=text/javascript>alert('erreur saisie!')</script>";}
	//rechereche de donnees
	if(!isset($error)){
	$requete="SELECT * FROM personne,sexe WHERE personne.id_sexe=sexe.id_sexe and nom LIKE '%$mot%' ";
	$result=$cnx->query($requete)or die($cnx->error);
	$nbre=$result->num_rows;
	if($nbre>0)
	  {$sms="<script type=text/javascript>alert('recherche réussie...')</script>";}
        else 
	  {$sms="<script type=text/javascript>alert('aucun nom ne correspond a ce mot clé!')</script>";}
	}
}?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="#" />
   <link rel="stylesheet" href="style/entete.css" />
   <title>recherche</title>
</head>
<body>
  <div id="bloc_page">
   <?php include("entete.php");?>
		
	<h4>BIENVENUE DANS L'ESPACE DE RECHERECHE DES PERSONNES <h4>
  <section class="section_recherche">
  <form method="POST" action="recherche.php">
  <div class="formulaire_recherche">
  <fieldset>
	<legend>entrez un mot clé</legend>
	<table>
	  <tr>
	   <td><input type="text" name="motcle"/></td>	
	   <td><input type="submit" name="submit" value="rechercher"/></td>
	   <td><a href="acceuil.php"><input type="button" value="RETOUR"/></a></td>
      </tr>
	</table>
  </fieldset>
  </div>
 </form>
 
 <?php if(isset($nbre) && $nbre>0){?>
 <h2>il y'a <?php echo $nbre; ?> enregistrements </h2>
 <table border=1 solid>		
	<tr>
	    <th>numero</th>
		<th>nom</th>
		<th>prenom</th>
		<th>date naissance</th>
		<th>lieu naissance</th>
		<th>contact</th>
		<th>taille</th>
		<th>profession</th>
		<th>sexe</th>
		<th>suppresssion</th>
		<th>modification</th>
		<th colspan="2">affichage de la carte</th>
		<th>photo</th>
	</tr>
	<?php
	while($liste=$result->fetch_assoc()) { ?>
	<tr>
	    <td> <?php echo $liste ['numero'] ; ?></td>
		<td> <?php echo $liste ['nom'] ; ?></td>
		<td> <?php echo $liste ['prenom'] ; ?></td>
		<td> <?php echo $liste ['date_naiss'] ; ?></td>
		<td> <?php echo $liste ['lieu_naiss'] ; ?></td>
		<td> <?php echo $liste ['contact'] ; ?></td>
		<td> <?php echo $liste ['taille'] ; ?></td>
		<td> <?php echo $liste['profession'] ; ?></td>
		<td> <?php echo $liste['lib_sexe'] ; ?></td>
		<td><a href="supprimer.php?id_personne= <?php echo $liste ['numero'] ; ?>"> supprimer</a></td>
		<td><a href="modifier.php?id_personne= <?php echo $liste ['numero']; ?>"> modifier</a></td>
		<td><a href="cni.php?id_personne= <?php echo $liste ['numero']; ?>"> CNI</a></td>
		<td><a href="ce.php?id_personne= <?php echo $liste ['numero']; ?>"> CE</a></td>
		<td width=6% height=15%> <img src="images/<?php echo $liste ['lien_photo'] ;?>" width=100% height=100% /></td>
	</tr>
	<?php } ?>
  </table>
  <?php } ?>
 </section>
 <?php if(isset($sms)) echo $sms;  if(isset($error)) echo $error;?>
 </div>
</body>
</html>