
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="#" />
   <link rel="stylesheet" href="style/entete.css" />
   <title>formulaire enrollement</title>
</head>
<body>
  <div id="bloc_page">
   <?php include("entete.php");?>
		
	<h4>BIENVENUE DANS L'ESPACE D'ENROLLEMENT DES PERSONNES </h4>
  <section class="section_enrollement">
       <form method="POST" action="modifier.php" enctype="multipart/form-data">
          <div class="formulaire_enrolement">
             <fieldset>
	                <legend>serie info Titulaire</legend>
	                     <table>
		                     <tr><td>NUMERO:</td><td><input type="text" name="numero"/></td></tr>
		                         <tr>
		                            <td>NOM:</td><td><input type="text" name="nom"/></td>
		                                <td>PRENOM:</td><td><input type="text" name="prenom"/></td>
		                                      <td>DATE NAISSANCE:</td><td><input type="date" name="date"/></td>
	                                                </tr>
	                                                 <tr>
		                                               <td>LIEU NAISSANCE :</td><td><input type="text" name="lieu"/></td>
	                                                   <td>CONTACT:</td><td><input type="text" name="contact"/></td>
		                                               <td>TAILLE:</td><td><input type="text" name="taille"/></td>
	                                                     </tr>
	                                                    <tr>
		                                                <td> PROFESSION:</td><td><input type="text" name="profession"/></td>
	                                                   <td>NATIONALITE:</td><td>
			                                           <?php
	//recuperation valeurs des champs de nationalite
$cnx=mysqli_connect('localhost','root','');
$db =  mysqli_select_db($cnx,'enrolement');
$requete="select * from nationalite ";
$result=mysqli_query($cnx,$requete);
echo "<select name='nationalite' size='1'>";
while (  $ligne= mysqli_fetch_array($result)) {
	echo "<option value='".$ligne['id_nationalite']."'>".$ligne['lib_nationalite']." </option>";
}
echo "</select>";
?>
	        </td>
		<td>SEXE:</td><td>	<?php
	//recuperation valeurs des champs de nationalite
$cnx=mysqli_connect('localhost','root','');
$db =  mysqli_select_db($cnx,'enrolement');
$requete="select * from sexe ";
$result=mysqli_query($cnx,$requete);
echo "<select name='sexe' size='1'>";
while (  $ligne= mysqli_fetch_array($result)) {
	echo "<option value='".$ligne['id_sexe']."'>".$ligne['lib_sexe']." </option>";
}
echo "</select>";
?></td>
	   </tr>
	</table>
  </fieldset>
  <fieldset>
	<legend>serie info Parents</legend>
	<table><tr>
	  <td>NOM PERE:</td><td><input type="text" name="Npere"/></td>
	  <td>PRENOM PERE:</td><td><input type="text" name="Ppere"/></td>
	  <td>DATE NAISSANCE</td><td><input type="date" name="Datepere"/></td>
	</tr>
	<tr>
	  <td>NOM MERE:</td><td><input type="text" name="Nmere"/></td>
	  <td>PRENOM MERE:</td><td><input type="text" name="Pmere"/></td>
	  <td>DATE NAISSANCE</td><td><input type="date" name="Datemere"/></td>
	</tr>
	</table>
  </fieldset>
  <fieldset>
	<legend>serie info supplementaires</legend>
	<table>
	<tr>
	  <td>PHOTO:</td><td><input type="file" name="photo"/></td>
	  <td>EMPRUNTE:</td><td><input type="file" name="emprunte"/></td>
	  <td>SIGNATURE</td><td><input type="file" name="signature"/></td>
	</tr>
	<tr>
	  <td>NUM EXTRAIT:</td><td><input type="text" name="extrait"/></td>
	  <td>LIEU ENROLLEMENT:</td><td><input type="text" name="lieuEnro"/></td>
	  <td>DATE ENROLLEMENT</td><td><input type="date" name="DateEnro"/></td>
	</tr>
	<tr>
	  <td>VISA ENROLLEUR:</td><td><input type="text" name="visa"/></td>
	</tr>
	</table>
  </fieldset>
 </div>
 <tr>
    <td><input type="submit" name="submit" value="ENREGISTRER"></td>
	<td><input type="reset" value="EFFACER"/></td>
	<td><a href="acceuil.php"><input type="button" value="RETOUR"></a></td>
 </tr>
 </form>
 </section>

 <p> <?php 
if(isset($error)){echo $error;}
if(isset($sms)){echo $sms;} ?></p>
 </div>
</body>
</html>



<?php

include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));
if(isset($_POST['submit'])){
//recuparation des valeurs des champs
$numero=htmlentities($_POST['numero']);
$nom = htmlentities($_POST['nom']);
$prenom =htmlentities( $_POST['prenom']);
$date = htmlentities($_POST['date']);
$lieu_naiss =htmlentities( $_POST['lieu']);
$contact =htmlentities( $_POST['contact']);
$taille =htmlentities( $_POST['taille']);
$profession =htmlentities( $_POST['profession']);
$nom_pere= htmlentities($_POST['Npere']);
$date_pere =htmlentities($_POST['Datepere']);
$nom_mere = htmlentities($_POST['Nmere']);
$date_mere= htmlentities($_POST['Datemere']);
$id_sexe= htmlentities($_POST['sexe']);
$id_nationalite = htmlentities($_POST['nationalite']);
$numero_extrait = htmlentities($_POST['extrait']);
$visa_enroleur =htmlentities( $_POST['visa']);
$lieu_enrolement =htmlentities( $_POST['lieuEnro']);
$date_enrolement = htmlentities($_POST['DateEnro']);

$lien_photo=$_FILES["photo"]['name'];
	$tempo_photo=$_FILES['photo']['tmp_name'];
	move_uploaded_file($tempo_photo,"./images/$lien_photo");
	
	$lien_signature=$_FILES['signature']['name'];
	$tempo_signe=$_FILES['signature']['tmp_name'];
	move_uploaded_file($tempo_signe,"./images/$lien_signature");

$lien_empreinte=$_FILES["emprunte"]['name'];
	$tempo_emprunt=$_FILES['emprunte']['tmp_name'];
	move_uploaded_file($tempo_emprunt,"./images/$lien_empreinte");
	
//requete 1
$req1="SELECT * FROM sexe";
$result1=$cnx->query($req1);
//requete 2
$req2="SELECT * FROM nationalite";
$result2=$cnx->query($req2);
//creation de requete 
$sql =
 "UPDATE personne
SET nom='$nom', prenom='$prenom' , date_naiss='$date',lieu_naiss='$lieu_naiss', numero_extrait='$numero_extrait',nom_pere='$nom_pere',date_pere='$date_pere',nom_mere='$nom_mere',date_mere='$date_mere',visa_enroleur= '$visa_enroleur',lieu_enrolement='$lieu_enrolement',date_enrolement='$date_enrolement',id_sexe='$id_sexe',id_nationalite='$id_nationalite',contact='$contact',taille='$taille',profession='$profession', lien_photo='$lien_photo', lien_empreinte='$lien_empreinte', lien_signature='$lien_signature'
 WHERE numero='$numero'";
  $requete = mysqli_query($cnx,$sql) or die( mysqli_error($cnx));
if($requete)
{
echo("La modification a été correctement effectuée") ;
}
else
{
echo("la modification a échouée") ;
}
}
?>
