
<?php


include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));
$req="SELECT * FROM personne,sexe WHERE personne.id_sexe=sexe.id_sexe";
$result=$cnx->query($req) or die($cnx->error);
$nbre=$result->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style/affichage.css" />
<link rel="stylesheet" href="style/entete.css" />
<title>affichage personne</title>
</head>
<body>
<div id="bloc_page">
  <?php include("entete.php");?>
<h2>BIENVENUE DANS L'ESPACE D'AFFICHAGE DES PERSONNES</h2>
<p>cet espace vous permettra d'afficher les personnes,de faire des modifications <br/>
et meme de supprimer des personnes de la base de données.

<h2>il y'a <?php echo $nbre; ?> enregistrements </h2>
<div class="table_result">
<?php if(isset($nbre) && $nbre>0){?>
  <table border=1 solid>		

<tr>
<th> numero</th>
<th> Nom </th>
<th> Prenom</th>
<th> Date de naissance</th>
<th> Lieu de naissance</th>
<th> Contact</th>
<th> Taille</th>
<th> Profession</th>
<th> Nom du pere </th>
<th> Date naiss pere</th>
<th> Nom du mere </th>
<th> Date naiss mere </th>
<th> Sexe </th>
<th> Nationalite </th>
<th> Lien photo </th>
<th> Lien empreinte </th>
<th> Lien signature </th>
<th> Numero extrait </th>
<th> Visa de l enroleur </th>
<th> Lieu enrolement </th>
<th> Date enrolement </th>
<th> Supprimer </th>
<th> Modifier </th>
<th> Cni </th>
<th> Cei </th>
<th> Photo </th>
</tr>
<?php
while($liste=$result->fetch_assoc())
{ ?>
<tr>
<td> <?php echo $liste ['numero'] ; ?></td>
<td> <?php echo $liste ['nom']; ?> </td>
<td> <?php echo $liste ['prenom']; ?> </td>
<td> <?php echo $liste ['date_naiss']; ?> </td>
<td> <?php echo $liste ['lieu_naiss']; ?> </td>
<td> <?php echo $liste ['contact']; ?> </td>
<td> <?php echo $liste ['taille']; ?> </td>
<td> <?php echo $liste ['profession']; ?> </td>
<td> <?php echo $liste ['nom_pere']; ?> </td>
<td> <?php echo $liste ['date_pere']; ?> </td>
<td> <?php echo $liste ['nom_mere']; ?> </td>
<td> <?php echo $liste ['date_mere']; ?> </td>
<td> <?php echo $liste ['id_sexe']; ?> </td>
<td> <?php echo $liste ['id_nationalite']; ?> </td>
<td> <?php echo $liste ['lien_photo']; ?> </td>
<td> <?php echo $liste ['lien_empreinte']; ?> </td>
<td> <?php echo $liste ['lien_signature']; ?> </td>
<td> <?php echo $liste ['numero_extrait']; ?> </td>
<td> <?php echo $liste ['visa_enroleur']; ?> </td>
<td> <?php echo $liste ['lieu_enrolement']; ?> </td>
<td> <?php echo $liste ['date_enrolement']; ?> </td>

		<td><a href="supprimer.php?id_personne= <?php echo $liste ['numero'] ; ?>"> SUPPRIMER</a></td>
		<td><a href="modifier.php?id_personne= <?php echo $liste ['numero']; ?>"> MODIFIER</a></td>
		<td><a href="cni.php?id_personne= <?php echo $liste ['numero']; ?>"> CNI</a></td>
		<td><a href="ce.php?id_personne= <?php echo $liste ['numero']; ?>"> CE</a></td>
		<td width=2% height=6%> <img src="images/<?php echo $liste ['lien_photo'] ;?>" width=50% height=1% /></td>
	</tr>
	<?php } ?>
  </table>
 <?php }?>	
</div>		
<footer>
  <a href="acceuil.php"><input type="button" value="retour"></a>
</footer>
</body>
</html>