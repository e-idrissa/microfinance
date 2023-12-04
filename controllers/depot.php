<?php

    include '../config/config.php';
    include '../models/compte.php';
    include '../models/depot.php';
    // Operations
    if (isset($_POST['submit'])) {
        $created_at = date("Y-m-d");
        $compte = $_POST['compte'];
        $montant = $_POST['montant'];
        $op = $_POST['op'];
        $depot = new Depot($created_at, $compte, $montant, $op);
        if ($depot->newDepot()) {
            Compte::creditCompte($compte, $montant);
            header('location:../views/depot.php');
        } else {
            var_dump($compte);
            echo 'Methode newDepot() incorrecte';
        }
    } else {
        echo 'Formulaire non envoye';
    }

?>