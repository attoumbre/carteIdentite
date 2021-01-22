<?php
include ("connect.php");
if(isset($_GET["submit"])){
    $id=$_GET['idd'];
    $nom=htmlspecialchars(trim($_GET['nom']));
    $prenom=htmlspecialchars(trim($_GET['prenom']));
    $dateNaiss=htmlspecialchars(trim($_GET['dateNaissance']));
    $lieu=htmlspecialchars(trim($_GET['lieuNaissance']));
    $contact=htmlspecialchars(trim($_GET['contact']));
    $taille=htmlspecialchars(trim($_GET['taille']));
    $profession=htmlspecialchars(trim($_GET['profession']));
    $sexe=htmlspecialchars(trim( $_GET['sexe']));
    $nationalite =htmlspecialchars(trim ($_GET['nationalite']));
    $nomPere=htmlspecialchars(trim($_GET['nomPere']));
    $prenomPere=htmlspecialchars(trim($_GET['prenomPere']));
    $datePere=htmlspecialchars(trim($_GET['datePere']));
    $nomMere=htmlspecialchars(trim($_GET['nomMere']));
    $prenomMere=htmlspecialchars(trim($_GET['prenomMere']));
    $dateMere=htmlspecialchars(trim($_GET['dateMere']));

    $lieuEnro=htmlspecialchars(trim($_GET['lieuEnrolement']));
    $dateEnro=htmlspecialchars(trim($_GET['dateEnrolement']));

    global $db;
    $sql = "UPDATE personne SET nom='$nom', prenom='$prenom', date_naissance=$dateNaiss,lieu_naissance='$lieu',
            contact=$contact,taille=$taille, profession='$profession', nom_pere='$nomPere', prenom_pere='$prenomPere',
            date_pere=$datePere,nom_mere='$nomMere',prenom_mere='$prenomMere', date_mere=$dateMere, id_sexe=$sexe,
            id_nation=$nationalite, lieu_enro='$lieuEnro', date_enro=$dateEnro WHERE id_personne=$id";
    $res = $db->query($sql);

    header("location:afficher.php");

    /*update($id,$nom,$prenom,$dateNaiss,$lieu,$contact,$taille,$profession,$nomPere,
        $prenomPere,$datePere,$nomMere,$prenomMere,$dateMere,$sexe,$nationalite,
        $photo,$signature,$lieuEnro,$dateEnro);
*/

    }



?>