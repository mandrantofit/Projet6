<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "action/connection.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
$var = $_GET['id'];    
$getifexist = $bdd->prepare('SELECT * FROM itineraire where codeit = ?');
$getifexist->execute(array($var));
$ERROR='';
        if ($getifexist->rowCount()>0) {
            $infoItin = $getifexist->fetch();
            $it = $infoItin['codeit'];
            $dep = $infoItin['villedep'];
            $arr = $infoItin['villearr'];

        }

        else {
            $ERROR = "L'identifiant n'existe pas!";
        }

        
}
$cli = $bdd->query('SELECT * FROM voiture ');