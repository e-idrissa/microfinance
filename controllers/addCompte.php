<?php

    include '../config/config.php';
    include '../models/compte.php';
    // Operations
    if (isset($_POST['submit'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $adresse = $_POST['adresse'];
        $solde = $_POST['solde'];
        $etat = $_POST['etat'];
        $compte = new Compte($nom, $prenom, $phone, $email, $adresse, $solde, $etat);
        if ($compte->newCompte()) {
            // var_dump($compte);
            header('location:../views/nouveau.php');
        } else {
            var_dump($compte);
            echo 'Methode newContact() incorrecte';
        }
    } else {
        echo 'Formulaire non envoye';
    }

?>