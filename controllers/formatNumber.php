<?php
    function formatNumber($number) {
        //check if the number is on million range
        if ($number >= 1000000) {
            return number_format($number/1000000, 1)." Millions";
        } else if ($number >= 1000) {
            return number_format($number/1000, 1)." Thousands";
        } else {
            return $number;
        }
    }
?>