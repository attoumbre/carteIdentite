<?php
$dbhost = 'localhost';
$dbname = 'enrolement';
$dbuser = 'root';
$dbpaswd = '';
try{
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dbuser,$dbpaswd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ERRMODE_WARNING));
}catch(PDOexception $e){
    die("Une erreur est survenue lors de la connexion de la base de donnees");
}

function recup_sex(){
    global $db;
    $stmt=$db->query("SELECT * FROM sexe");
    return $stmt;
}
function recup_idSexe($id_pers){
    global $db;
    $stmt=$db->query("SELECT id_sexe FROM personne where id_personne= $id_pers");
    return $stmt;
}
function recup_sexById($id_sexy){
    global $db;
    $stmt=$db->query("SELECT * FROM sexe where id_sexe= $id_sexy");
    return $stmt;
}
function recup_nationality(){
    global $db;
    $stmt = $db->query("SELECT * FROM nationalite");
    return $stmt;
}
function recup_idNat($id_pers){
    global $db;
    $stmt=$db->query("SELECT id_nation FROM personne where id_personne= $id_pers");
    return $stmt;
}

function recherche($mot){
    global $db;
    $stmt=$db->query("SELECT * FROM personne where nom like '%$mot%'");
    return $stmt;
    /* $sql = "SELECT * FROM personne WHERE nom LIKE '%:l%'";

     $stmt=$db->prepare($sql);

     $stmt->bindValue(':l',$mot,PDO::PARAM_STR);

     $stmt->execute();
     $row = $stmt->fetch(PDO::FETCH_OBJ);
     //var_dump($row);
     return $row;

     */
}

function nombre_rechercher($mot){
    global $db;
    $sql = "SELECT COUNT(*) FROM personne where nom LIKE '%$mot%'";
    $res = $db->query($sql);
    $count = $res->fetchColumn();
    return $count;
}

function delete_personne($id){
    global $db;
    $sql = "DELETE  FROM personne where id_personne = $id";
    $result = $db->query($sql);
    return $result;
}

/*function recup_nationalityById($id_nat){
    global $db;
    $stmt = $db->query("SELECT libelle_nation FROM nationalite where id_nation= $id_nat ");
    return $stmt;
}*/

function recup_nombre(){
    global $db;
    $sql = "SELECT COUNT(*) FROM personne";
    $res = $db->query($sql);
    $count = $res->fetchColumn();
    return $count;
}

function recup_personne(){
    global $db;
    $stmt = $db->query("select * from personne ");
    return $stmt;
}

function recup_personneById($id_person){
    global $db;
    $sql = "SELECT * FROM personne WHERE id_personne= $id_person";
    $stmt=$db->query($sql);
   // $stmt->bindParam('id',$id_personne,PDO::PARAM_STR);
   // $stmt->execute();
   // $row = $stmt->fetch(PDO::FETCH_OBJ);
    return $stmt;
}

//insertion dans la table personne
function insertion_personne($nom,$prenom,$date_naiss,$lieu_naiss,$contact,$taille,$profession,$nom_pere,
	$prenom_pere,$date_pere,$nom_mere,$prenom_mere,$date_mere,$id_sexe,$id_nationalite,
                            $lien_photo,$lien_signature,$lieu_enrolement,$date_enro){
    global $db;

    $sql = "INSERT INTO personne VALUES(null,'$nom','$prenom','$date_naiss','$lieu_naiss',$contact,$taille,'$profession',
         '$nom_pere','$prenom_pere',$date_pere,'$nom_mere','$prenom_mere',$date_mere,'$id_sexe','$id_nationalite',
         $lien_photo,$lien_signature,'$lieu_enrolement',$date_enro)";
    $db->exec($sql);

  // header('location:update.php');
}
/*
if (isset($_POST['name'])&& isset($_POST['password']))
{
    $mdp= htmlspecialchars(trim($_POST['password']));
    $login= htmlspecialchars(trim($_POST['name']));
    $log=  recup_login($login,$mdp);
    //$m  = recup_mdp($login, $mdp);
    if($log)
    {
        echo "reussit" ;
        exit();
    }
    else{
        header('location:accueil.php');
        exit();
    }

}

function recup_login($login,$mdp){
    global $db;
    $sql = "SELECT login,mdp FROM user WHERE login=:l and mdp=:m";
    $stmt=$db->prepare($sql);

    $stmt->bindParam('l',$login,PDO::PARAM_STR);
    $stmt->bindParam('m',$mdp,PDO::PARAM_STR);

    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    return $row;
}


function recup_mdp($login,$mdp){
        global $db;
       $sql = "SELECT mdp FROM user WHERE login=:l and mdp=:m";
       $stmt=$db->prepare($sql);

       $stmt->bindParam('l',$login,PDO::PARAM_STR);
       $stmt->bindParam('m',$mdp,PDO::PARAM_STR);

       $stmt->execute();
       $row = $stmt->fetch(PDO::FETCH_OBJ);
    return $row;
   }
   */

?>