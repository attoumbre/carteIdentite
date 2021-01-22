<?php
include "verif_connect.php";
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/idCard.css">
    <title>ID Card</title>
<!--     
    So lets start -->
</head>
<body>
<header>
    <?php include("entete.php");
    ?>
</header>
<?php  $id= $_GET['id_personne'];
//$idNationa =recup_idNat($id);
//$idNation =recup_nationalityById($idNationa);
$idSexe= $_GET['id_sexe'];
$idSex = recup_sexById($idSexe);
$result= recup_personneById($id);
$liste=$result->fetch();
$listeSex=$idSex->fetch();
//$listeNat=$idNation->fetch();

?>
        <div class="container">
            <div class="padding">
                <div class="font">
                    <div class="top">
                        <p>REPUBLIQUE DE CÔTE D'IVOIRE</p>
                        <p>Carte Nationale d'identité <Br>
                        <class="imma">Immatriculation :CI<?php echo $liste['id_personne'];?> </p>

                    </div>
                    <div class="bottom">
                        <p><img src="images/<?php echo $liste['lien_photo'];?>"></p>
                        <p ><class="info"><?php echo $liste['nom'];?>
                            <br>Nom
                            <br><?php echo $liste['prenom'];?>
                            <br> Prenom(s)<br>

	                    <?php echo $listeSex['libelle_sexe'];?>       <?php echo $liste['taille'];?><br>
                            Sexe       Taille (cm) <br>

                        <?php echo $liste['date_naissance'];?> <br>
                        Date de naissance <br>
                            <?php echo $liste['lieu_naissance'];?> <br>
                        Lieu de naissance <br>
                        Etablie <?php echo $liste['date_enro'];?> à  <?php echo $liste['lieu_enro'];?></>
                        </p>
                    </div>
                </div>
            </div>
            <div class="back">

                <aside class="verso1">
                    <p>Domicile :  <?php echo $liste['lieu_enro'];?></p>

                    <p>Profession : <?php echo $liste['profession'];?></p>
                </aside>

                <aside class="verso2">
                    <p class="texte_signe">Signature</br> du</br> titulaire</p>

                      <p class="signe"><img src=images/<?php echo $liste['lien_signature'];?>></p>

                </aside>

                <article class="verso">
                    <p>Père : <?php echo $liste['nom_pere'];?> <?php echo $liste['prenom_pere'];?></br>
                        Né le : <?php echo $liste['date_pere'];?></br></br>
                        Mère :<?php echo $liste['nom_mere'];?> <?php echo $liste['prenom_mere'];?></br>
                        Né le :  <?php echo $liste['date_mere'];?></br></p>
                </article>
        </div>
        </div>
</body>
</html>