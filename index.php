<?php
include("connect/cnx.inc.php");
$cnx=mysqli_connect('localhost','root','');
mysqli_query($cnx,'USE enrolement;') or
exit(mysqli_error($cnx));
if (isset($_POST['submit']))
{
	$password= $_POST['pass'];
$login= $_POST['identifiant'];

$requete= "SELECT passe FROM admin where passe='$password' and nom_admin='$login'  "; 
$requet= "SELECT nom_admin FROM admin where passe='$password'and nom_admin='$login'  "; 
$result = mysqli_query($cnx,$requete) or die(mysqli_error($cnx));
$resultat = mysqli_query($cnx,$requet) or die(mysqli_error($cnx));

$liste=$result->fetch_assoc();
$ligne = $resultat->fetch_assoc();
if($liste ['passe']==$password and $ligne ['nom_admin']== $login )
{

$sms="<script type=text/javascript>alert('echec de connexion!')</script>";
header('location:acceuil.php');
}
 else 
	  {
$sms="<script type=text/javascript>alert('Connexion reussit!')</script>";}

}

?>
<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style/index.css" />
		<title> index </title>
	</head>
<body>
<section class="blanc">
  <aside class="vert">
   <div class="vert">
    <form method="POST" action="index.php">
	  <fieldset>
		<legend>connexion administrateur</legend>
		 <table>
		 <tr><td>LOGIN</td><td><input type="text" name="identifiant"/></td>
		  <td>PASSWORD</td><td><input type="password" name="pass"/></td>
		  <td>   </td>
		  
		</tr>
		<tr><td><input type="submit" name="submit" value="valider"/></td></tr>
		 </table>
	  </fieldset>
	  
    </form>
	</div>
  </aside>
</section>

</body>
</html>
