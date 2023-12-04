<?php
    include '../config/config.php';
    include '../models/compte.php';
    // get all contacts
    function getComptes() {
        // $contact = new Contact();
        // return $contacts = $contact->getContacts;
        return Compte::getComptes();
    }
    // get a single contact
    function getCompte($id) {
        // $contact = new Contact();
        // return $contacts = $contact->getContacts;
        return Compte::getCompte($id);
    }
?>