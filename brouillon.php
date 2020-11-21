<?php
include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
$db =  mysqli_select_db($cnx,"enrolement");
//requete 1
$req1="SELECT * FROM sexe ";
$result1=$cnx->query($req1);
//requete 2
$req2="SELECT * FROM nationalite";
$result2=$cnx->query($req2);

//initialisation de données
if(isset($_POST['submit'])&& isset($_POST['hidden']))
{
	$code=htmlentities($_POST['hidden']);
	$nom=htmlentities($_POST['nom']);
	$prenom=htmlentities($_POST['prenom']);
	$dateNaiss=htmlentities($_POST['date']);
	$lieu=htmlentities($_POST['lieu']);
	$contact=htmlentities($_POST['contact']);
	$taille=htmlentities($_POST['taille']);
	$profession=htmlentities($_POST['profession']);
	$nation=htmlentities($_POST['form_nationalite']);
	$sexe=htmlentities($_POST['form_sexe']);
	
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
	//modification de donnees
	if(!isset($error)){
	$requete=" UPDATE personne SET nom='$nom',prenom='$prenom',date_naiss='$dateNaiss',lieu_naiss='$lieu',
	contact=$contact,taille=$taille,profession='$profession',nom_pere='$nomPere',
	prenom_pere='$prenomPere',date_Pere='$datePere',nom_mere='$nomMere',prenom_mere='$prenomMere',date_Mere='$dateMere',
	id_sexe=$sexe,id_nationnalite=$nation,lien_photo='$photo',lien_empreinte='$emprunte',lien_signature='$signature',
	num_extrait=$numExtrait,lieu_enrolement='$lieuEnro',date_enrolement='$dateEnro',visa_enroleur='$visaEnro' WHERE numero= $code ";
	$result= mysqli_query($cnx,$requete) or die( mysqli_error($cnx));
	  if($result)
	  {header("location:affichage.php");}
        else 
	  {$sms="erreur modification";}
	}
}
   if(isset($_GET['numero']))
   {
   $code=htmlspecialchars($_GET['numero']);
   //Requête SQL
   $requete="SELECT*FROM personne,sexe,nationalite WHERE 'personne.id_sexe'='sexe.id_sexe' and 
   'personne.id_nationalite'='nationalite.id_nationalite' and numero='$code' ";
   $result=$cnx->query($requete) or die($cnx->error);
   $coord=$result->fetch_assoc();
   //initialisation des données
   $nom0=$coord['nom'];
   $prenom0=$coord["prenom"];
   $date0=$coord["date_naiss"];
   $lieu0=$coord["lieu_naiss"];
   $contact0=$coord["contact"];
   $taille0=$coord['taille'];
   $prof0=$coord["profession"];
   $nPere0=$coord["nom_pere"];
   $pPere0=$coord["prenom_pere"];
   $datePere0=$coord["date_pere"];
   $nMere0=$coord["nom_mere"];
   $pMere0=$coord["prenom_mere"];
   $dateMere0=$coord["date_mere"];
   $sexe0=$coord["id_sexe"];
   $nation0=$coord["id_nation"];
   $photo0=$coord["lien_photo"];
   $emprunte0=$coord["lien_emprunte"];
   $signature0=$coord["lien_signature"];
   $extrait0=$coord["num_extrait"];
   $lieuEnro0=$coord["lieu_enrol"];
   $dateEnro0=$coord["date_enrol"];
   $visa0=$coord["visa_enrol"];
   }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="#" />
   <link rel="stylesheet" href="style/entete.css" />
   <title>formulaire modification</title>
</head>
<body>
  <div id="bloc_page">
   <?php include("entete.php");?>
		
	<h4>BIENVENUE DANS L'ESPACE DE MODIFICATION DES PERSONNES <h4>
  <section class="section_enrollement">
  <form method="POST" action="modifier.php" enctype="multipart/form-data">
  <div class="formulaire_enrollement">
  <fieldset>
	<legend>serie info Titulaire</legend>
	<table><tr>
		<td>NOM:</td><td><input type="text" name="nom" value="<?php if(isset($nom0)) echo $nom0;?>"/></td>
		<td>PRENOM:</td><td><input type="text" name="prenom" value="<?php if(isset($prenom0)) echo $prenom0;?>"/></td>
		<td>DATE NAISSANCE:</td><td><input type="date" name="date" value="<?php if(isset($date0))echo $date0;?>"/></td>
	   </tr>
	   <tr>
		<td>LIEU NAISSANCE :</td><td><input type="text" name="lieu" value="<?php if(isset($lieu0)) echo $lieu0;?>"/></td>
	    <td>CONTACT:</td><td><input type="text" name="contact" value="<?php if(isset($contact0)) echo $contact0;?>"/></td>
		<td>TAILLE:</td><td><input type="text" name="taille" value="<?php if(isset($taille0)) echo $taille0;?>"/></td>
	   </tr>
	   <tr>
		<td> PROFESSION:</td><td><input type="text" name="profession" value="<?php if(isset($prof0)) echo $prof0;?>"/></td>
	    <td>NATIONALITE:</td><td>			<?php
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
?></td>
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
	  <td>NOM PERE:</td><td><input type="text" name="Npere" value="<?php if(isset($nPere0)) echo $nPere0;?>"/></td>
	  <td>PRENOM PERE:</td><td><input type="text" name="Ppere" value="<?php if(isset($pPere0)) echo $pPere0;?>"/></td>
	  <td>DATE NAISSANCE</td><td><input type="date" name="Datepere" value="<?php if(isset($datePere0)) echo $datePere0;?>"/></td>
	</tr>
	<tr>
	  <td>NOM MERE:</td><td><input type="text" name="Nmere" value="<?php if(isset($nMere0)) echo $nMere0;?>"/></td>
	  <td>PRENOM MERE:</td><td><input type="text" name="Pmere" value="<?php if(isset($pMere0)) echo $pMere0;?>"/></td>
	  <td>DATE NAISSANCE</td><td><input type="date" name="Datemere" value="<?php if(isset($dateMere0)) echo $dateMere0;?>"/></td>
	</tr>
	</table>
  </fieldset>
  <fieldset>
	<legend>serie info supplementaires</legend>
	<table>
	<tr>
	  <td>PHOTO:</td><td><input type="file" name="photo"/></td>
	  <td>EMPRUNTE:</td><td><input type="file" name="emprunte" /></td>
	  <td>SIGNATURE</td><td><input type="file" name="signature" /></td>
	</tr>
	<tr>
	  <td>NUM EXTRAIT:</td><td><input type="text" name="extrait" value="<?php if(isset($extrait0)) echo $extrait0;?>" /></td>
	  <td>LIEU ENROLLEMENT:</td><td><input type="text" name="lieuEnro" value="<?php if(isset($lieuEnro0)) echo $lieuEnro0;?>" /></td>
	  <td>DATE ENROLLEMENT</td><td><input type="date" name="DateEnro" value="<?php if(isset($dateEnro0)) echo $dateEnro0;?>" /></td>
	</tr>
	<tr>
	  <td>VISA ENROLLEUR:</td><td><input type="text" name="visa" value="<?php if(isset($visa0)) echo $visa0;?>"/></td>
	</tr>
	</table>
  </fieldset>
 </div>
 <tr>
    <td><input type="submit" name="submit" value="MODIFIER"/></td>
	<input type="hidden" name="hidden" value="<?php if(isset($_GET['numero'])) echo $_GET['numero']; ?>"/>
	<td><input type="reset" value="EFFACER"/></td>
	<td><a href="affichage.php"><input type="button" value="RETOUR"/></a></td>
 </tr>
 </form>
 </section>
<p><?php 
if(isset($error)){echo $error;}
if(isset($sms)){echo $sms;} ?></p>
  <footer>
	pied de page 
  </footer>
 </div>
</body>
</html>



























<?php
if(isset($_POST['submit'])){
	if (isset($_POST['password']) AND $_POST['password'] =="licence3SI") 
		header('location:acceuil.php');
	else
		echo"<script type=text/javascript>alert('mauvais code de securite!')</script>";}?>


		$requete = mysqli_query($cnx,$req) or die(mysqli_error($cnx));








</div>
		  <aside id="images">
		    <div id="image1">
		       <img src="logo.jpg" width=15% heigth=15% alt="photo1_oni" />
		    </div>
			
			<div id="image2">
		       <img src="embleme.jpg" width=15% heigth=15% alt="photo2_oni" />
		    </div>
			
			<div id="image3">
		       <img src="cei.jpg" width=15% heigth=15% alt="photo3_oni" />
		    </div>
		  </aside>











		  if(isset($_POST['submit'])){
	$numero=htmlentities($_POST['numero']);
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
	$requete="UPDATE personne SET nom='$nom',prenom='$prenom',date_naiss='$dateNaiss',lieu_naiss='$lieu',contact='$contact',taille='$taille',profession='$profession',nom_pere='$nomPere',
	prenom_pere='$prenomPere',date_pere='$datePere',nom_mere='$nomMere',prenom_mere='$prenomMere',date_mere='$dateMere',id_sexe='$sexe',id_nationalite='$nationalite',lien_photo='$photo',lien_empreinte='$emprunte',lien_signature='$signature', numero_extrait='$numExtrait',lieu_enrolement='$lieuEnro',date_enrolement='$dateEnro',visa_enroleur='$visaEnro'
 WHERE numero='$numero'";
	
	$result=$cnx->query($requete)or die($cnx->error);
	  if($result)

	  {$sms="<script type=text/javascript>alert('Modification terminée!')</script>";}
        else 
	  {$sms="<script type=text/javascript>alert('erreur de modification!')</script>";}
}?>
