<?php
    
    include '../config/config.php';
    include_once '../models/compte.php';
    
    if (isset($_POST['submit'])) { 
        $id = $_POST['id'];
        $etat = "Non Actif";
        $solde = 0;
        if(Compte::supprimerCompte($id, $etat, $solde)) {
            var_dump($_POST);
            header("location:../views/effacer.php");
        } else {
            echo "Method cancelContract -> false";
        }
        
    } else {
        return null;
    }
?>