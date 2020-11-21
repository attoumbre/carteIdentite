<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional// EN">
<html>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="#" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/entete.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
  	version = navigator.appVersion.substring(0,1);
  </script>
	<title>acceuil</title>
   <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > img 
  {
    width: 70%;
    margin: auto;
  }
  </style>

</head>
  <body>
  		<?php
  	 include("entete.php");?>
 
 	  <div class="container">
 <br>
	<div id="bloc_page" align= "center">
		
		   <h3 class="bienvenue">BIENVENUE DANS L'APPLICATION DE GESTION DE L'ENROLEMENT</h3>
		<section class="bienvenue">
		  <p class="texte_membre">Cette plateforme permettra de gerer l'enrolement de personne vivant en cote d'ivoire </br>
		  elle aboutit à la confection de la carte nationale d'identité et de la carte
		  d'electeur,</br>après l'insertion des informations réclamées par la 
		  commission nationale d'identification</p>
		</section>
		  </div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>

      <li data-target="#myCarousel" data-slide-to="6"></li>
  
    </ol>

    
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img src="ivoire.gif" alt="ivoir" width="460" height="345">
        <div class="carousel-caption">
          <h3>Cote D Ivoire</h3>
          <p>Patriote.</p>
        </div>
      </div>

      <div class="item">
        <img src="cei.jpg" alt="drap" width="460" height="345">
        <div class="carousel-caption">
          <h3>CEI</h3>
          <p>COMMISSION ELECTORALE INDEPENDANTE</p>
        </div>
      </div>
    
      <div class="item">
        <img src="index.jfif" alt="id" width="460" height="345">
        <div class="carousel-caption">
          <h3>CEI</h3>
          <p>La cie améliore les conditions de travail de ses agents</p>
        </div>
      </div>

      <div class="item">
        <img src="cei.jpg" alt="Flower" width="460" height="345">
        <div class="carousel-caption">
          <h3>CEI</h3>
          <p>logo officiel</p>
        </div>
      </div>
  
  <div class="item">
        <img src="index1.jfif" alt="id1" width="460" height="345">
        <div class="carousel-caption">
          <h3>CEI</h3>
          <p>La cei inaugure ses nouveaux equipements.</p>
        </div>
      </div>


<div class="item">
        <img src="index2.jfif" alt="id2" width="460" height="345">
        <div class="carousel-caption">
          <h3>Cote d'Ivoire</h3>
          <p>Les enrolements commencent</p>
        </div>
      </div>
 

<div class="item">
        <img src="index3.jfif" alt="id3" width="460" height="345">
        <div class="carousel-caption">
          <h3>CEI</h3>
          <p>Le president de la annoce le debut des enrolements.</p>
        </div>
      </div>

    </div>

 bouton faire passer les images
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">precédent</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">suivant</span>
    </a>
  </div>
</div>


		
  </body>
</html>