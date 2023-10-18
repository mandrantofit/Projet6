<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "action/connection.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
$var = $_GET['id'];    
$getifexist = $bdd->prepare('SELECT * FROM voiture where idvoit = ?');
$getifexist->execute(array($var));
$ERROR='';
        if ($getifexist->rowCount()>0) {
            $infoVoit = $getifexist->fetch();
            $identifiant = $infoVoit['idvoit'];
            $designation = $infoVoit['Design'];
            $frais = $infoVoit['frais'];

        }

        else {
            $ERROR = "L'identifiant n'existe pas!";
        }

        
}
$cli = $bdd->query('SELECT * FROM voiture ');