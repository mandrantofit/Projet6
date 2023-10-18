<?php
if (isset($_POST['validate'])) {
    if ( !empty($_POST["idrecept"])&& !empty($_POST["idenvoi"])&& !empty($_POST["date_recept"])) {
     $idRs = htmlspecialchars($_POST['idrecept']);//manala caractere html
     $idV = htmlspecialchars($_POST['idenvoi']);
     $dr = htmlspecialchars($_POST['date_recept']);
     #$frais = htmlspecialchars($_POST['frais']);
    
$Update = $bdd->prepare("UPDATE voiture SET idrecept=?,idenvoi=?,date_recept=? where idvoit =?");
            $Update->execute(array($idRs,$idV,$dr,$_GET['id']));
                $ERROR = "";
                header('Location:../Projet6/Users/recevoir.php');}}

?>