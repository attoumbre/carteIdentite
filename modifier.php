<?php

include "verif_connect.php";
include "connect.php";

//initialisation de données


//traitement des données
if(isset($_GET['id_personne'])){
   // $result= recup_personneById($_GET['id_personne']);
    $idd= $_GET['id_personne'];
     $result= recup_personneById($idd);

    while ($liste=$result->fetch()){
    $nom=htmlspecialchars(trim($liste['nom']));
    $prenom=htmlspecialchars(trim($liste['prenom']));
    $dateNaiss=htmlspecialchars(trim($liste['date_naissance']));
    $lieu=htmlspecialchars(trim($liste ['lieu_naissance']));
    $contact=htmlspecialchars(trim($liste ['contact']));
    $taille=htmlspecialchars(trim($liste ['taille']));
    $profession=htmlspecialchars(trim($liste ['profession']));
    $sexe=htmlspecialchars(trim($liste ['id_sexe']));
    $nationalite =htmlspecialchars(trim ($liste ['id_nation']));
    $nomPere=htmlspecialchars(trim($liste['nom_pere']));
    $prenomPere=htmlspecialchars(trim($liste['prenom_pere']));
    $datePere=htmlspecialchars(trim($liste['date_pere']));
    $nomMere=htmlspecialchars(trim($liste['nom_mere']));
    $prenomMere=htmlspecialchars(trim($liste['prenom_mere']));
    $dateMere=htmlspecialchars(trim($liste['date_mere']));
    $photo=htmlspecialchars(trim($liste['lien_photo']));
    $signature= htmlspecialchars(trim($liste['lien_signature']));
    $lieuEnro=htmlspecialchars(trim($liste ['lieu_enro']));
    $dateEnro=htmlspecialchars(trim($liste ['date_enro']));
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>formulaire enrollement</title>
</head>
<body>
<header>
    <?php include("entete.php");?>
</header>

<div class="container">
    <h1>Formulaires</h1>
    <form class="needs-validation" action="update.php" method="get" novalidate>
        <div class="form-row">
            <input type="hidden" name="idd" value="<?= $idd ?>">
            <div class="col-md-2 mb-3">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" name="prenom"  id="prenom" value=<?php echo $nom;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name ="nom" id="nom" value=<?php echo $prenom;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dateNaissance">Date de naissance</label>
                <input type="date" class="form-control" name="dateNaissance"  id="dateNaissance" value=<?php echo $dateNaiss;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="lieuNaissance">lieu de naissance</label>
                <input type="text" class="form-control" name="lieuNaissance"  id="lieuNaissance" value=<?php echo $lieu;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" name="contact"  id="contact" value=<?php echo $contact;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="taille">Taille</label>
                <input type="text" class="form-control" name="taille"  id="taille" value=<?php echo $taille;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="profession">profession</label>
                <input type="text" class="form-control" name="profession"  id="profession" value=<?php echo $profession;?> required>
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
                echo "<select id='sex' name='sexe' class='form-control'>";
                while ( $row = $ligne->fetch()) {
                    echo "<option value='".$row['id_sexe']."'>".$row['libelle_sexe']." </option>";
                }
                echo "</select>";?>
                </select>
            </div>
            <div class="col-md-2 mb-3">
                <label for="prenomPere">Prénom du père</label>
                <input type="text" class="form-control" name="prenomPere" id="prenomPere" value=<?php echo $nomPere;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="nomPere">Nom du père</label>
                <input type="text" class="form-control" name="nomPere"  id="nomPere" value=<?php echo $prenomPere;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="datePere">Date de naissance</label>
                <input type="date" class="form-control" name="datePere"  id="datePere" value= <?php echo $datePere;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="prenomMere">Prénom de le mère</label>
                <input type="text" class="form-control" name="prenomMere"  id="prenomMere" value=<?php echo $nomMere;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="nomMere">nom de la mère</label>
                <input type="text" class="form-control" name="nomMere"  id="nomMere" value=<?php echo $prenomMere;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dateMere">Date de naissance</label>
                <input type="date" class="form-control" name="dateMere"  id="dateMere" value=<?php echo $dateMere?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>

            <div class="col-md-2 mb-3">
                <label for="lieuEnrolement">Lieu enrolement</label>
                <input type="text" class="form-control" name="lieuEnrolement"  id="lieuEnrolement" value=<?php echo $lieuEnro;?> required>
                <div class="valid-feedback">Ok !</div>
                <div class="invalid-feedback">Valeur incorrecte</div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="dateEnrolement">Date enrolement</label>
                <input type="date" class="form-control" name="dateEnrolement"  id="dateEnrolement" value=<?php echo $dateEnro;?> required>
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