<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
#require "action/connection.php";
if (isset($_GET['id']) && !empty($_GET['id'])) {
$var = $_GET['id'];    
$getifexist = $bdd->prepare('SELECT * FROM recevoir where idrecept = ?');
$getifexist->execute(array($var));
$ERROR='';
        if ($getifexist->rowCount()>0) {
            $infoVoit = $getifexist->fetch();
            $idR = $infoVoit['idrecept'];
            $idE = $infoVoit['idenvoi'];
            $dt = $infoVoit['date_recept'];

        }

        else {
            $ERROR = "L'identifiant n'existe pas!";
        }

        
}
$cli = $bdd->query('SELECT * FROM recevoir ');