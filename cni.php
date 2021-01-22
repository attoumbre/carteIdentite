<?php include("connect.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<!--<link rel="stylesheet" href="style/cni.css" />
		<link rel="stylesheet" href="style/entete.css" />
		--><title>affichage CNI</title>
	</head>
<body>
<header>
    <?php include("entete.php");
    ?>
</header>
<div id="bloc_page">

  <h2 class="recto">recto</h2>
<section class="recto">
   <div class="devant">
     <?php  $id= $_GET['id_personne'];
       $result= recup_personneById($id);
     $liste=$result->fetch()
       ?>
      <p><h2>REPUBLIQUE DE COTE D'IVOIRE</h2></p>
      <p><h3>Carte Natinale d'Identité</h3></p>
      <p><h4>Immatriculation : CI<?php echo $liste['id_personne'];?> </h4></p>

   
   <aside class="recto">
      <p class="Identité"><img src="images/<?php echo $liste['lien_photo'];?>" width=100% height=100% alt="photo"></p>
   </aside>
   
   <article class="recto">
       <p>Nom : <?php echo $liste['nom'];?></br>Prenom : <?php echo $liste['prenom'];?></br>  
	   Sexe : <?php echo $liste['libelle_sexe'];?> Taille : <?php echo $liste['taille'];?> cm</br></br>
	   Date Naissance : <?php echo $liste['date_naissance'];?></br>
	   Lieu naissance : <?php echo $liste['lieu_naissance'];?></br>
	   Etablie le : <?php echo $liste['date_enro'];?></br>
       A : <?php echo $liste['lieu_enro'];?></p>
   </article>
   <p class="embleme_fond">
      <img src="images/embleme.jpg" width=100% height=100% alt="photo"> 
   </p>
   </div>
</section>

  <h2 class="verso">verso</h2>
  
<section class="verso">
  <aside class="verso1">
    <p>Domicile : <?php echo $liste['lieu_enro'];?> </p>
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
        Né le : <?php echo $liste['date_mere'];?></br></p>
   </article>
</section>
</div>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>carte </title>
</head>
<body>

<div class=" contient">
    <div class="laCarte">
        <div class="devant">
                <p><h2>REPUBLIQUE DE COTE D'IVOIRE</h2></p>
                <p><h3>Carte Natinale d'Identité</h3></p>
                <p><h4>Immatriculation : CI<?php echo $liste['id_personne'];?> </h4></p>



                    <p>Nom : <?php echo $liste['nom'];?></br>Prenom : <?php echo $liste['prenom'];?></br>
                        Sexe : <?php echo $liste['libelle_sexe'];?> Taille : <?php echo $liste['taille'];?> cm</br></br>
                        Date Naissance : <?php echo $liste['date_naissance'];?></br>
                        Lieu naissance : <?php echo $liste['lieu_naissance'];?></br>
                        Etablie le : <?php echo $liste['date_enro'];?></br>
                        A : <?php echo $liste['lieu_enro'];?></p>


            </div>
        <div class="derriere">

                <p>Domicile : <?php echo $liste['lieu_enro'];?> </p>

                <p>Profession : <?php echo $liste['profession'];?></p>

                <p class="texte_signe">Signature</br> du</br> titulaire</p>



            <article class="verso">
                <p>Père : <?php echo $liste['nom_pere'];?> <?php echo $liste['prenom_pere'];?></br>
                    Né le : <?php echo $liste['date_pere'];?></br>
                    Mère : <?php echo $liste['nom_mere'];?> <?php echo $liste['prenom_mere'];?></br>
                    Né le : <?php echo $liste['date_mere'];?></br></p>
            </article></div>
    </div>
</div>

<style>

    .contient{
        position: absolute;
        width: 256px;
        height: 320px;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
    }
    .laCarte{
        position: absolute;
        width: 100%;
        height: 100%;
        transform-style: preserve-3d;
        transition: all 0.5s ease;
    }

    .laCarte:hover{
        transform: rotateY(180deg);
    }

    .devant{
        position:  absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        background: NavajoWhite;
        color: lightskyblue;
        text-align: center;
        font-family: sans-serif;
        border-radius: 20px;
        font-size: 10px;
        font-weight: bold;

    }

    .derriere{
        position:  absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        transform: rotateY(180deg);
        background: NavajoWhite;
        color: brown;
        text-align: center;
        font-family: sans-serif;
        border-radius: 20px;
        font-size: 10px;
        font-weight: bold;
    }




</style>
</body>
</html>