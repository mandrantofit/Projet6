<?php
    try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
    } catch (Exception $e) {
        die('404 not found!'.$e->getMessage());
    }//connection.php
    #require "../action/connection.php";

if (isset($_POST['validate'])) {
    if ( !empty($_POST["identifiant"])&& !empty($_POST["designation"])&& !empty($_POST["codeit"]) && !empty($_POST["frais"])) {
     $id = htmlspecialchars($_POST['identifiant']);//manala caractere html
     $designation = htmlspecialchars($_POST['designation']);
     $it = htmlspecialchars($_POST['codeit']);
     $frais = htmlspecialchars($_POST['frais']);
     
        $ERROR = "Veulliez compléter les champs précédents!";
        $Verify = $bdd->prepare("Select *from voiture where idvoit = ?");
        $Verify->execute(array($id));
        if ($Verify->rowCount()>0) {
            $ERROR = "L'identifiant existe déja";
        }
        else {
            
            $Insert = $bdd->prepare("INSERT INTO voiture(idvoit,Design,codeit,frais)VALUES(?,?,?,?)");
            $Insert->execute(array($id,$designation,$it,$frais));
                $ERROR = "";
                header('Location:../Projet6/Admin_Bd/voiture.php');
        }
    }
    else {
        $ERROR = "Veulliez compléter les champs précédents!";
    }
}