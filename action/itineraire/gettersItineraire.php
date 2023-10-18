<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "../action/connection.php";
$cli1 = $bdd->query('SELECT * FROM itineraire order by villedep ASC');