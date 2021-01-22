
<?php


include "connect.php";

$nbre = recup_nombre();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }
        .sup{
            cursor: pointer;
           color: blue;
        }
        .sup:hover{
            color: #4b92dc;
        }

        tr:nth-child(even){background-color: #f2f2f2}
    </style>
<!--<link rel="stylesheet" href="style/affichage.css" />
<link rel="stylesheet" href="style/entete.css" />-->
<title>affichage personne</title>
</head>
<body>
<header>
    <?php include("entete.php");?>
</header>
<div style="overflow-x:auto;">

<h2>BIENVENUE DANS L'ESPACE D'AFFICHAGE DES PERSONNES</h2>
<p>cet espace vous permettra d'afficher les personnes,de faire des modifications <br/>
et meme de supprimer des personnes de la base de données.

<h2>il y'a <?php echo $nbre; ?> enregistrements </h2>

<?php if(isset($nbre) && $nbre>0){?>
  <table >

<tr>
<th> Nom </th>
<th> Prenom</th>
<th> Date de naissance</th>
<th> Lieu de naissance</th>
<th> Contact</th>
<th> Taille</th>
<th> Profession</th>
<th> Supprimer </th>
<th> Modifier </th>
<th> Cni </th>
</tr>
<?php
$result= recup_personne();
while($liste=$result->fetch())
{ ?>
<tr>
<td> <?php echo $liste ['nom']; ?> </td>
<td> <?php echo $liste ['prenom']; ?> </td>
<td> <?php echo $liste ['date_naissance']; ?> </td>
<td> <?php echo $liste ['lieu_naissance']; ?> </td>
<td> <?php echo $liste ['contact']; ?> </td>
<td> <?php echo $liste ['taille']; ?> </td>
<td> <?php echo $liste ['profession']; ?> </td>
		<td><a class="sup" onclick="supprimer(<?php echo $liste ['id_personne'] ; ?>)" > SUPPRIMER</a></td>
		<td><a href="modifier.php?id_personne=<?php echo $liste ['id_personne']; ?>"> MODIFIER</a></td>
		<td><a href="idCard.php?id_personne=<?php echo $liste ['id_personne']; ?>&id_sexe=<?php echo $liste ['id_sexe']; ?>"> CNI</a></td>
	</tr>
	<?php } ?>
  </table>
 <?php }?>	
</div>		
<div>

  <a href="acceuil.php"><input type="button" value="retour"></a>
</div>
<?php include("footer.php");?>
<script src="app.js"></script>
</body>
</html>