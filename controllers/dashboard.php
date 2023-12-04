<?php
    include_once "../config/config.php";
    include_once "../models/compte.php";
    include_once "../models/depot.php";
    include_once "../models/retrait.php";

    function getSoldeTotal()
    {
        return Compte::getSoldeTotal();
    }

    function getDepotTotal()
    {
        return Depot::getTotal();
    }

    function getRetraitTotal()
    {
        return Retrait::getTotal();
    }

?>