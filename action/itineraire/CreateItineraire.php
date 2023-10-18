<?php
    try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
    } catch (Exception $e) {
        die('404 not found!'.$e->getMessage());
    }//connection.php
    #require "../action/connection.php";

if (isset($_POST['validate'])) {
    if (!empty($_POST["codeit"])&& !empty($_POST["villedep"]) && !empty($_POST["villearr"])) {
     $ci = htmlspecialchars($_POST['codeit']);//manala caractere html
     $dep = htmlspecialchars($_POST['villedep']);
     $arr = htmlspecialchars($_POST['villearr']);
     #$frais = htmlspecialchars($_POST['frais']);
     
        $ERROR = "Veulliez compléter les champs précédents!";
        $Verify = $bdd->prepare("Select *from itineraire where codeit = ?");
        $Verify->execute(array($id));
        if ($Verify->rowCount()>0) {
            $ERROR = "L'identifiant existe déja";
        }
        else {
            
            $Insert = $bdd->prepare("INSERT INTO itineraire(codeit,villedep,villearr)VALUES(?,?,?)");
            $Insert->execute(array($ci,$dep,$arr));
                $ERROR = "";
                header('Location:../Projet6/Admin_Bd/itineraire.php');
        }
    }
    else {
        $ERROR = "Veulliez compléter les champs précédents!";
    }
}