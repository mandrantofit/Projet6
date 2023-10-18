<?php
if (isset($_POST['validate'])) {
    if ( !empty($_POST["idenvoi"])&& !empty($_POST["idvoit"])&& !empty($_POST["colis"])&& !empty($_POST["nomEnvoyeur"])&& !empty($_POST["emailEnvoyeur"])&& !empty($_POST["date_envoi"])&& !empty($_POST["frais"])&& !empty($_POST["nomRecepteur"])&& !empty($_POST["contactRecepteur"])) 
    {
     $idEnv = htmlspecialchars($_POST['idenvoi']);//manala caractere html
     $idVoi = htmlspecialchars($_POST['idvoit']);
     $cols = htmlspecialchars($_POST['colis']);
     $NameE = htmlspecialchars($_POST['nomEnvoyeur']);
     $EmaE = htmlspecialchars($_POST['emailEnvoyeur']);
     $Dtt = htmlspecialchars($_POST['date_envoi']);
     $fra = htmlspecialchars($_POST['frais']);
     $NamR = htmlspecialchars($_POST['nomRecepteur']);
     $Cr = htmlspecialchars($_POST['contactRecepteur']);
    
$Update = $bdd->prepare("UPDATE envoyer SET idenvoi=?,idvoit=?,colis=?,nomEnvoyeur=?,emailEnvoyeur=?,date_envoi=?,frais=?,nomRecepteur=?,contactRecepteur=? where idenvoi =?");
            $Update->execute(array($idEnv,$idVoi,$cols,$NameE,$EmaE,$Dtt,$fra,$NamR,$Cr,$_GET['id']));
                $ERROR = "";
                header('Location:../Projet6/Users/envoyer.php');}}

?>