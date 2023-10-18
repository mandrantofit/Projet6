<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "../connection.php";

$Delete = $bdd->prepare('DELETE FROM itineraire where codeit=?');
$Delete->execute(array($_GET['id']));
header('Location:../../Admin_Bd/itineraire.php');