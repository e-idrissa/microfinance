<?php

    include '../config/config.php';
    include '../models/compte.php';
    include '../models/retrait.php';
    // Operations
    if (isset($_POST['submit'])) {
        $created_at = date("Y-m-d");
        $compte = $_POST['compte'];
        $montant = $_POST['montant'];
        $op = $_POST['op'];
        $retrait = new Retrait($created_at, $compte, $montant, $op);
        if ($retrait->newRetrait()) {
            Compte::debitCompte($compte, $montant);
            header('location:../views/retrait.php');
        } else {
            var_dump($compte);
            echo 'Methode newContact() incorrecte';
        }
    } else {
        echo 'Formulaire non envoye';
    }

?>