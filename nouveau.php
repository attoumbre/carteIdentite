<?php
include "verif_connect.php";
include "connect.php";

//initialisation de données

//print_r($_FILES);

	//traitement des données

if(isset($_POST['submit'])){
    $nom=htmlspecialchars(trim($_POST['nom']));
    $prenom=htmlspecialchars(trim($_POST['prenom']));
    $dateNaiss=htmlspecialchars(trim($_POST['dateNaissance']));
    $lieu=htmlspecialchars(trim($_POST['lieuNaissance']));
    $contact=htmlspecialchars(trim($_POST['contact']));
    $taille=htmlspecialchars(trim($_POST['taille']));
    $profession=htmlspecialchars(trim($_POST['profession']));
    $sexe=htmlspecialchars(trim( $_POST['sexe']));
    $nationalite =htmlspecialchars(trim ($_POST['nationalite']));
    $nomPere=htmlspecialchars(trim($_POST['nomPere']));
    $prenomPere=htmlspecialchars(trim($_POST['prenomPere']));
    $datePere=htmlspecialchars(trim($_POST['datePere']));
    $nomMere=htmlspecialchars(trim($_POST['nomMere']));
    $prenomMere=htmlspecialchars(trim($_POST['prenomMere']));
    $dateMere=htmlspecialchars(trim($_POST['dateMere']));
    $photo=$_FILES['photo']['name'];
    $tempo_photo=$_FILES['photo']['tmp_name'];
    move_uploaded_file($tempo_photo,"./images/$photo");

    $signature=$_FILES['signature']['name'];
    $tempo_signe=$_FILES['signature']['tmp_name'];
    move_uploaded_file($tempo_signe,"./images/$signature");

    $lieuEnro=htmlspecialchars(trim($_POST['lieuEnrolement']));
    $dateEnro=htmlspecialchars(trim($_POST['dateEnrolement']));
	//insertion de donnees
    global $db;

    $sql = "INSERT INTO personne VALUES(null,'$nom','$prenom',$dateNaiss,'$lieu',$contact,$taille,'$profession',
         '$nomPere','$prenomPere',$datePere,'$nomMere','$prenomMere',$dateMere,$sexe,$nationalite,
         '$photo','$signature','$lieuEnro',$dateEnro)";
   // var_dump($sql);
    $db->exec($sql);

    }

?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title>formulaire</title>
</head>
<body>
<header>
    <?php include("entete.php");?>
</header>

<div class="container">
    <h1>Formulaire</h1>
    <form class="needs-validation" method="post" action="nouveau.php" enctype="multipart/form-data">
        <div class="form-row">
            <div class="col-md-2 mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Pierre" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Koffi" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dateNaissance">Date de naissance</label>
                <input type="date" class="form-control" name="dateNaissance" id="dateNaissance" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="lieuNaissance">lieu de naissance</label>
                <input type="text" class="form-control" name="lieuNaissance" id="lieuNaissance" placeholder="Abidjan" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact" id="contact" placeholder="06542387" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="taille">Taille</label>
                <input type="text" class="form-control" name="taille" id="taille" placeholder="176(cm)" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="profession">profession</label>
                <input type="text" class="form-control" name="profession" id="profession" placeholder="etudiant" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="form-group col-md-4">
                <label for="nationalite">Nationalité</label>
                    <?php
            $ligne = recup_nationality();
echo "<select  id='nationalite' name='nationalite' class='form-control'>";
            while ($row = $ligne->fetch()) {
                echo "<option value='".$row['id_nation']."'>".$row['libelle_nation']." </option>";
            }

echo "</select>";
?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="sex">Sexe</label>
                <?php
                    $ligne = recup_sex();
                    echo "<select id='sexe' name='sexe' class='form-control'>";
                        while ( $row = $ligne->fetch()) {
                        echo "<option value='".$row['id_sexe']."'>".$row['libelle_sexe']." </option>";
                        }
                        echo "</select>";?>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="prenomPere">Prénom du père</label>
                <input type="text" class="form-control" name="prenomPere" id="prenomPere" placeholder="Augustin" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="nomPere">Nom du père</label>
                <input type="text" class="form-control" name="nomPere"  id="nomPere" placeholder="Koffi" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="datePere">Date de naissance</label>
                <input type="date" class="form-control" name="datePere" id="datePere" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="prenomMere">Prénom de le mère</label>
                <input type="text" class="form-control" name="prenomMere" id="prenomMere" placeholder="Angel" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="nomMere">nom de la mère</label>
                <input type="text" class="form-control" name="nomMere" id="nomMere" placeholder="Konan" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div> 
            <div class="col-md-2 mb-3">
                <label for="dateMere">Date de naissance</label>
                <input type="date" class="form-control" name="dateMere" id="dateMere" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="form-group">
                <label for="photo">Lien photo</label>
                <input type="file" class="form-control-file" name="photo" id="photo">
            </div>
            <div class="form-group">
                <label for="signature">Lien signature</label>
                <input type="file" class="form-control-file" name="signature" id="signature">
            </div>
            <div class="col-md-2 mb-3">
                <label for="lieuEnrolement">Lieu enrolement</label>
                <input type="text" class="form-control" name="lieuEnrolement" id="LieuEnrolement" placeholder="Cocody" required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dateEnrolement">Date enrolement</label>
                <input type="date" class="form-control" name="dateEnrolement" id="dateEnrolement">
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
        </div>
        </div>

        <button class="btn btn-primary" name="submit" type="submit">Envoyer</button>
    </form>
</div>
<script>
    /*La fonction principale de ce script est d'empêcher l'envoi du formulaire si un champ a été mal rempli
     *et d'appliquer les styles de validation aux différents éléments de formulaire*/
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            let forms = document.getElementsByClassName('needs-validation');
            let validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>
</html>



<?php include("footer.php");?>

</body>
</html>