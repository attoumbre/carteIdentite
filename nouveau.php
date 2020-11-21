<?php

include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));
//requete 1
$req1="SELECT * FROM sexe";
$result1=$cnx->query($req1);
//requete 2
$req2="SELECT * FROM nationalite";
$result2=$cnx->query($req2);
//initialisation de données
if(isset($_POST['submit'])){
	$nom=htmlentities($_POST['nom']);
	$prenom=htmlentities($_POST['prenom']);
	$dateNaiss=htmlentities($_POST['date']);
	$lieu=htmlentities($_POST['lieu']);
	$contact=htmlentities($_POST['contact']);
	$taille=htmlentities($_POST['taille']);
	$profession=htmlentities($_POST['profession']);
    $sexe=htmlentities( $_POST['form_sexe']);
    $nationalite =htmlentities ($_POST['form_nationalite']);



	$nomPere=htmlentities($_POST['Npere']);
	$prenomPere=htmlentities($_POST['Ppere']);
	$datePere=htmlentities($_POST['Datepere']);
	$nomMere=htmlentities($_POST['Nmere']);
	$prenomMere=htmlentities($_POST['Pmere']);
	$dateMere=htmlentities($_POST['Datemere']);
	
	$photo=$_FILES["photo"]['name'];
	$tempo_photo=$_FILES['photo']['tmp_name'];
	move_uploaded_file($tempo_photo,"./images/$photo");
	
	$signature=$_FILES['signature']['name'];
	$tempo_signe=$_FILES['signature']['tmp_name'];
	move_uploaded_file($tempo_signe,"./images/$signature");
	
	$emprunte=$_FILES['emprunte']['name'];
	$tempo_emprunt=$_FILES['emprunte']['tmp_name'];
	move_uploaded_file($tempo_emprunt,"./images/$emprunte");

	$numExtrait=htmlentities($_POST['extrait']);
	$lieuEnro=htmlentities($_POST['lieuEnro']);
	$dateEnro=htmlentities($_POST['DateEnro']);
	$visaEnro=htmlentities($_POST['visa']);
	//traitement des données
	if(is_numeric($nom) or empty($nom)){
		$error="<script type=text/javascript>alert('veuillez saisir le nom!')</script>";}
	if(is_numeric($prenom) or empty($prenom)){
		$error="<script type=text/javascript>alert('veuillez saisir le prenom!')</script>";}
	if(empty($dateNaiss)){
		$error="<script type=text/javascript>alert('veuillez saisir la date de naissance!')</script>";}
	if(is_numeric($lieu) or empty($lieu)){
		$error="<script type=text/javascript>alert('veuillez saisir le lieude naissance!')</script>";}
	if(!is_numeric($contact) or empty($contact)){
		$error="<script type=text/javascript>alert('veuillez saisir le contact!')</script>";}
	if(!is_numeric($taille) or empty($taille)){
		$error="<script type=text/javascript>alert('veuillez saisir la taille!')</script>";}
	if(is_numeric($profession) or empty($profession)){
		$error="<script type=text/javascript>alert('veuillez saisir la profession!')</script>";}
	if(is_numeric($nomPere) or empty($nomPere)){
		$error="<script type=text/javascript>alert('veuillez saisir le nom du père!')</script>";;}
	if(is_numeric($prenomPere) or empty($prenomPere)){
		$error="<script type=text/javascript>alert('veuillez saisir le prenom du père!')</script>";}
	if(empty($datePere)){
		$error="<script type=text/javascript>alert('veuillez saisir la date du père!')</script>";}
	if(is_numeric($nomMere) or empty($nomMere)){
		$error="<script type=text/javascript>alert('veuillez saisir le nom de la mère!')</script>";}
	if(is_numeric($prenomMere) or empty($prenomMere)){
		$error="<script type=text/javascript>alert('veuillez saisir le prenom de la mère!')</script>";}
	if(empty($dateMere)){
		$error="<script type=text/javascript>alert('veuillez saisir la date de la mère!')</script>";}
	if(empty($photo)){
		$error="<script type=text/javascript>alert('veuillez saisir la photo!')</script>";}
	if(empty($signature)){
		$error="<script type=text/javascript>alert('veuillez saisir la signature!')</script>";}
	if(empty($emprunte)){
		$error="<script type=text/javascript>alert('veuillez saisir l'emprunte!')</script>";}
	if(!is_numeric($numExtrait) or empty($numExtrait)){
		$error="<script type=text/javascript>alert('veuillez saisir le num de l'extrait!')</script>";}
	if(is_numeric($lieuEnro) or empty($lieuEnro)){
		$error="<script type=text/javascript>alert('veuillez saisir le lieu de l'enro!')</script>";}
	if(empty($dateEnro)){
		$error="<script type=text/javascript>alert('veuillez saisir la date de l'enro!')</script>";}
	if(is_numeric($visaEnro) or empty($visaEnro)){
		$error="<script type=text/javascript>alert('veuillez signer!')</script>";}
	//insertion de donnees
	if(!isset($error)){
	$requete="INSERT INTO personne (numero,nom,prenom,date_naiss,lieu_naiss,contact,taille,profession,nom_pere,
	prenom_pere,date_pere,nom_mere,prenom_mere,date_mere,id_sexe,
id_nationalite,lien_photo,lien_empreinte,lien_signature,
	numero_extrait,lieu_enrolement,date_enrolement,visa_enroleur) values(null,'$nom','$prenom','$dateNaiss','$lieu',$contact,$taille,
	'$profession','$nomPere','$prenomPere','$datePere','$nomMere','$prenomMere','$dateMere','$sexe','$nationalite','$photo',
	'$emprunte','$signature',$numExtrait,'$lieuEnro','$dateEnro','$visaEnro')";
	$result=$cnx->query($requete)or die($cnx->error);
	  if($result)
	  {$sms="<script type=text/javascript>alert('inscription terminée!')</script>";}
        else 
	  {$sms="<script type=text/javascript>alert('erreur d'enregistrement!')</script>";}
	}
}?>
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
		
	<h4>BIENVENUE DANS L'ESPACE D'ENROLLEMENT DES PERSONNES <h4>
  <section class="section_enrollement">
  <form method="POST" action="nouveau.php" enctype="multipart/form-data">
  <div class="formulaire_enrollement">
  <fieldset>
	<legend>serie info Titulaire</legend>
	<table><tr>
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
$connexion=mysqli_connect('localhost','root','');
$db =  mysqli_select_db($connexion,'enrolement');
$requete="select * from nationalite ";
$result=mysqli_query($connexion,$requete);
echo "<select name='form_nationalite' size='1'>";
while (  $ligne= mysqli_fetch_array($result)) {
	echo "<option value='".$ligne['id_nationalite']."'>".$ligne['lib_nationalite']." </option>";
}
echo "</select>";
?>
	        </td>
		<td>SEXE:</td><td>	<?php
	//recuperation valeurs des champs de nationalite
$connexion=mysqli_connect('localhost','root','');
$db =  mysqli_select_db($connexion,'enrolement');
$requete="select * from sexe ";
$result=mysqli_query($connexion,$requete);
echo "<select name='form_sexe' size='1'>";
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
    <td><input type="submit" name="submit" value="ENREGISTRER"/></td>
	<td><input type="reset" value="EFFACER"/></td>
	<td><a href="acceuil.php"><input type="button" value="RETOUR"/></a></td>
 </tr>
 </form>
 </section>
<p><?php 
if(isset($error)){echo $error;}
if(isset($sms)){echo $sms;} ?></p>
  
 </div>
</body>
</html>