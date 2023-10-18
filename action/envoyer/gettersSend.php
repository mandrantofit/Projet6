<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "../action/connection.php";

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $cli = $bdd->query('SELECT * FROM envoyer where idenvoi LIKE "%'.$_GET['search'].'%" ');
}else {
    $cli = $bdd->query('SELECT * FROM envoyer order by idenvoi ASC');
    $Rec = $bdd->query('SELECT SUM(frais) AS Somme FROM envoyer ');
}
if (isset($_GET['search2']) && !empty($_GET['search2']) && isset($_GET['search3']) && !empty($_GET['search3'])) {
    $cli = $bdd->query('SELECT * FROM envoyer WHERE date_envoi between ? and ? ;');
}else {
    $cli = $bdd->query('SELECT * FROM envoyer order by idenvoi ASC');
    $Rec = $bdd->query('SELECT SUM(frais) AS Somme FROM envoyer ');
}