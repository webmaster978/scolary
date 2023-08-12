<?php

try {
    $db = new PDO("mysql:host=localhost;dbname=hope_first", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOExeption $e) {
    die('Erreur : ' . $e->getMessage());
}

