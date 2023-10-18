<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "../connection.php";

$Delete = $bdd->prepare('DELETE FROM recevoir where idrecept=?');
$Delete->execute(array($_GET['id']));
header('Location:../../Users/recevoir.php');