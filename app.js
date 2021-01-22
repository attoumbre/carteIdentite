
function supprimer(id_personne) {

    var conf=confirm("Voulez-vous supprimer?");
    if(conf){
        location.href="supprimer.php?id_personne="+id_personne;
    }
}
//href="supprimer.php?id_personne=<?php echo $liste ['id_personne'] ; ?>"