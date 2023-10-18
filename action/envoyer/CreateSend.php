<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
} catch (Exception $e) {
    die('404 not found!'.$e->getMessage());
}//connection.php
    #require "action/connection.php";

if (isset($_POST['validate'])) {
    if ( !empty($_POST["idenvoi"])&& !empty($_POST["idvoit"])&& !empty($_POST["colis"]) && !empty($_POST["nomEnvoyeur"])&& !empty($_POST["emailEnvoyeur"])&& !empty($_POST["date_envoi"])&& !empty($_POST["frais"])&& !empty($_POST["nomRecepteur"])&& !empty($_POST["contactRecepteur"])) {
     $idS = htmlspecialchars($_POST['idenvoi']);//manala caractere html
     $idv = htmlspecialchars($_POST['idvoit']);
     $col = htmlspecialchars($_POST['colis']);
     $NEnv = htmlspecialchars($_POST['nomEnvoyeur']);
     $EEnv = htmlspecialchars($_POST['emailEnvoyeur']);
     $dtEnv = htmlspecialchars($_POST['date_envoi']);
     $fr = htmlspecialchars($_POST['frais']);
     $NRcpt = htmlspecialchars($_POST['nomRecepteur']);
     $CtRcpt = htmlspecialchars($_POST['contactRecepteur']);
     
        $ERROR = "Veulliez compléter les champs précédents!";
        $Verify = $bdd->prepare("Select *from envoyer where idenvoi = ?");
        $Verify->execute(array($idS));
        if ($Verify->rowCount()>0) {
            $ERROR = "L'identifiant existe déja";
        }
        else {
            
            $Insert = $bdd->prepare("INSERT INTO envoyer(idenvoi,idvoit,colis,nomEnvoyeur,emailEnvoyeur,date_envoi,frais,nomRecepteur,contactRecepteur)VALUES(?,?,?,?,?,?,?,?,?)");
            $Insert->execute(array($idS,$idv,$col,$NEnv,$EEnv,$dtEnv,$fr,$NRcpt,$CtRcpt));
                $ERROR = "";
                header('Location:../Projet6/Users/envoyer.php');
        }
    }
    else {
        $ERROR = "Veulliez compléter les champs précédents!";
    }
}