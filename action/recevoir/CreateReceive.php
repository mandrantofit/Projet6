<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
    #require "action/connection.php";

if (isset($_POST['validate'])) {
    if ( !empty($_POST["idrecept"])&& !empty($_POST["idenvoi"])&& !empty($_POST["date_recept"])) {
     $idR = htmlspecialchars($_POST['idrecept']);//manala caractere html
     $idE = htmlspecialchars($_POST['idenvoi']);
     $dtR = htmlspecialchars($_POST['date_recept']);
     #$frais = htmlspecialchars($_POST['frais']);
     
        $ERROR = "Veulliez compléter les champs précédents!";
        $Verify = $bdd->prepare("Select *from recevoir where idrecept = ?");
        $Verify->execute(array($idR));
        if ($Verify->rowCount()>0) {
            $ERROR = "L'identifiant existe déja";
        }
        else {
            
            $Insert = $bdd->prepare("INSERT INTO recevoir(idrecept,idenvoi,date_recept)VALUES(?,?,?)");
            $Insert->execute(array($idR,$idE,$dtR));
                $ERROR = "";
                header('Location:../Projet6/Users/recevoir.php');
        }
    }
    else {
        $ERROR = "Veulliez compléter les champs précédents!";
    }
}