<?php

    date_default_timezone_set('Africa/Lubumbashi');

    function getTimeAgo($timeStamp) {
        $timeAgo = strtotime($timeStamp);
        $currentTime = time();
        $timeDifference = $currentTime - $timeAgo;
        $seconds = $timeDifference;
        $minutes = round($seconds / 60);      // Value 60 is seconds
        $hours = round($seconds / 3600);      // Value 3600 is seconds
        $days = round($seconds / 86400);      // 8640 = 24 * 60 *60
        $weeks = round($seconds / 604800);    // 604800 * 40 * 60 *60
        $mouths = round($seconds / 2629440);  // 2629440 = ((365 * 4 + 366) / 5 / 12) * 24 * 60 *60
        $years = round($seconds / 31553280);  // 31553280 = (365 * 4 + 366) / 5 / 24 * 60 *60
    
        if ($seconds <= 60) {
            return "Maintenant";
        }
        else if($minutes <= 60) {
            if($minutes == 1) {
                return "Une minute passé";
            }
            else {
                return "$minutes minutes passés";
            }
        }
        else if($hours <= 24) {
            if($hours == 1) {
                return "Une heure passé";
            }
            else {
                return "$hours heures passés";
            }
        }
        else if($days <= 7) {
            if($days == 1) {
                return "Hier";
            }
            else {
                return "$days jours passés";
            }
        }
        else if($weeks <= 4.3) {  // 4.3 == 52 / 12
            if($weeks == 1) {
                return "Une semaine passé";
            }
            else {
                return "$weeks semaines passés";
            }
        }
        else if($mouths <= 12) {
            if($mouths == 1) {
                return "Un mois passé";
            }
            else {
                return "$mouths mois passés";
            }
        }
        else {
            if($years == 1) {
                return "Une année passé";
            }
            else {
                return "$years années passés";
            }
        }
    }

?>