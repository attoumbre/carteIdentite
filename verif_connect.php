<?php

session_start();
if(!isset($_SESSION['id_personne'])){
    header("location: index.php");
}


?>