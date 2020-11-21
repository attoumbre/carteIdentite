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
		<link rel="stylesheet" href="style/ce.css" />
		<link rel="stylesheet" href="style/entete.css" />
		<title>affichage CE</title>
	</head>
<body>
<div id="bloc_page">
  <?php include("entete.php");?>
  <h2 class="recto">recto</h2>
<section class="recto">
   <div class="en_haut"> 
      <h3>Carte d'Electeur</h3>
      <h2 class="en_haut">REPUBLIQUE DE COTE D'IVOIRE</h2>

   </div>
   
  <p> </p>
   <article class="electeur">
   	
      <p class="photo"><img src="images/<?php echo 
      $liste['lien_photo'];?>" width=10% height=10% alt="photo"></p>
      <div class="info_electeur">
	     <h2>INFORMATION ELECTEUR</h2>
	     Nom : <?php echo $liste['nom'];?></br>
	     Prenom : <?php echo $liste['prenom'];?></br>  
	     Né le :   <?php echo $liste['date_naiss'];?> A :      <?php echo $liste['lieu_naiss'];?></br> 
	     Sexe :    <?php echo $liste['lib_sexe'];?></br> 
		 Père :    <?php echo $liste['nom_pere'];?> <?php echo $liste['prenom_pere'];?></br> 
		 Mère :    <?php echo $liste['nom_mere'];?> <?php echo $liste['prenom_mere'];?></br>
		
	   </div>
	  
   </article>
   <article class="vote">

   <p class="emprunt_electeur"><img src="images/<?php echo $liste['lien_empreinte'];?>" width=100% height=100% alt="empreinte"></p>
<div class="info_vote">
	      <h2>INFORMATION VOTE</h2>
	     Sous-prefecture :    <?php echo $liste['lieu_enrolement'];?></br>
	     Commune :    <?php echo $liste['lieu_enrolement'];?></br>  
	     lieu de vote :   <?php echo $liste['lieu_enrolement'];?></br> 
	     
		 Numero d'électeur :   <?php echo $liste['numero'];?>
	  </div>
   </article>
</section>
  <h2 class="verso">verso</h2>
<section class="verso">
   <article class="verso1">
   <h4 class="tableau">VOTER EST UN DROIT</br>C'EST AUSSI UN DEVOIR CIVIQUE</h4>
      <div class="tableau">
	      <table border=1 solid>
			<caption><em>SCRUTINS</em></caption>
			<tr>
			  <th width=100px>scrutin N°1</th><td width=100px>      </td>
			</tr>
			<tr>
			  <th>scrutin N°2</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°3</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°4</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°5</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°6</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°7</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°8</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°9</th><td>      </td>
			</tr>
			<tr>
			  <th>scrutin N°10</th><td>      </td>
			</tr>
		  </table>
	  </div>
   </article>
   <article class="verso2">
   <h4 class="verso2">REPUBLIQUE DE</br>COTE D'IVOIRE</h4>
     <p class="verso1">Commission Electorale Indépendante</p>
      <p class="versoimage1" >
	     <img src="images/embleme.jpg" width=100% height=100% alt="embleme">
	  </p>
	  <p class="verso2">Carte d'Electeur</p>
	  <p class="versoimage2">
	     <img src="images/cei.jpg" width=100% height=100%  alt="photo2">
	  </p>
   </article>
   </section>
</div>
</body>
</html>