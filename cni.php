<?php
include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));

$code=$_GET['id_personne'];
$requete="SELECT * FROM personne,sexe WHERE personne.id_sexe=sexe.id_sexe and numero=$code";
$result=$cnx->query($requete) or die($cnx->error);
$liste=$result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/cni.css" />
		<link rel="stylesheet" href="style/entete.css" />
		<title>affichage CNI</title>
	</head>
<body>
<div id="bloc_page">
  <?php include("entete.php");?>
  <h2 class="recto">recto</h2>
<section class="recto">
   <div class="en_haut"> 
      <p><h2>REPUBLIQUE DE COTE D'IVOIRE</h2></p>
      <p><h3>Carte Natinale d'Identité</h3></p>
      <p><h4>Immatriculation : CI<?php echo $liste['numero'];?> </h4></p> 
   </div>
   
   <aside class="recto">
      <p class="Identité"><img src="images/<?php echo $liste['lien_photo'];?>" width=100% height=100% alt="photo"></p>
   </aside>
   
   <article class="recto">
       <p>Nom : <?php echo $liste['nom'];?></br>Prenom : <?php echo $liste['prenom'];?></br>  
	   Sexe : <?php echo $liste['lib_sexe'];?> Taille : <?php echo $liste['taille'];?> cm</br></br> 
	   Date Naissance : <?php echo $liste['date_naiss'];?></br> 
	   Lieu naissance : <?php echo $liste['lieu_naiss'];?></br> 
	   Etablie le : <?php echo $liste['date_enrolement'];?></br> 
       A : <?php echo $liste['lieu_enrolement'];?></p>
   </article>
   <p class="embleme_fond">
      <img src="images/embleme.jpg" width=100% height=100% alt="photo"> 
   </p>
</section>

  <h2 class="verso">verso</h2>
  
<section class="verso">
  <aside class="verso1">
    <p>Domicile : <?php echo $liste['lieu_enrolement'];?> </p>
	<p class="obv"><img src="images/obv.jpg" width=100% height=100% alt="OBV" ></p>
	<p>Profession : <?php echo $liste['profession'];?></p>
  </aside>
  
  <aside class="verso2">
	<p class="texte_signe">Signature</br> du</br> titulaire</p> 
	<p class="signe"><img src="images/<?php echo $liste['lien_signature'];?>" width=70% height=90% alt="SIGNATURE" ></p> 
  </aside>
  
  <article class="verso">
    <p>Père : <?php echo $liste['nom_pere'];?> <?php echo $liste['prenom_pere'];?></br> 
	Né le : <?php echo $liste['date_pere'];?></br>
	Mère : <?php echo $liste['nom_mere'];?> <?php echo $liste['prenom_mere'];?></br>
	Né le : <?php echo $liste['date_mere'];?></br>
   </article>
</section>
</div>
</body>
</html>