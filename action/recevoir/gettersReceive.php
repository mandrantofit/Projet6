<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}
#require "../action/connection.php";
$cli = $bdd->query('SELECT * FROM recevoir order by date_recept ASC');