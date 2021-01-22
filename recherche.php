<?php
include "verif_connect.php";
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

        tr:nth-child(even){background-color: #f2f2f2}
    </style>
   <title>recherche</title>
</head>
<body>
<header>
    <?php include("entete.php");?>
</header>
<div class="container">
	<h4>BIENVENUE DANS L'ESPACE DE RECHERECHE DES PERSONNES </h4>
      <form class="needs-validation" action="recherche.php" method="post">
          <div class="form-row">
              <div class="col-md-2 mb-3">
                  <label for="motcle">nom  </label>
                  <input type="text" class="form-control" name="motcle" id="motcle" placeholder="pierre" required>
                  <div class="valid-feedback">Ok !</div>
                  <div class="invalid-feedback">Valeur incorrecte</div>
              </div>
          </div>
          <button class="btn btn-primary" type="submit">Recherche</button>
 </form>
 
 <?php
 include ("connect.php");
 if(isset($_POST['motcle'])){
     $mots=$_POST["motcle"];
     $nombre= nombre_rechercher($mots);

     if( $nombre>0){
     ?>
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
    $result = recherche($mots);
    while($liste=$result->fetch())
    { ?>
        <tr>
            <td> <?php echo $liste['nom']; ?> </td>
            <td> <?php echo $liste['prenom']; ?> </td>
            <td> <?php echo $liste['date_naissance']; ?> </td>
            <td> <?php echo $liste['lieu_naissance']; ?> </td>
            <td> <?php echo $liste['contact']; ?> </td>
            <td> <?php echo $liste['taille']; ?> </td>
            <td> <?php echo $liste['profession']; ?> </td>
            <td><a href="supprimer.php?id_personne=<?php echo $liste ['id_personne'] ; ?>"> SUPPRIMER</a></td>
            <td><a href="modifier.php?id_personne=<?php echo $liste ['id_personne']; ?>"> MODIFIER</a></td>
            <td><a href="idCard.php?id_personne=<?php echo $liste ['id_personne']; ?>&id_sexe=<?php echo $liste ['id_sexe']; ?>"> CNI</a></td>
        </tr>
    <?php } ?>
 </table>
     <?php }}?>
</div>
<div>
    <a href="acceuil.php"><input type="button" value="retour"></a>
</div>
<?php include("footer.php");?>
</body>
</html>