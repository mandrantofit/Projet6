<?php
if (isset($_POST['validate'])) {
    if ( !empty($_POST["identifiant"])&& !empty($_POST["designation"])&& !empty($_POST["codeit"])&& !empty($_POST["frais"])) {
     $id = htmlspecialchars($_POST['identifiant']);//manala caractere html
     $designation = htmlspecialchars($_POST['designation']);
     $it = htmlspecialchars($_POST['codeit']);
     $frais = htmlspecialchars($_POST['frais']);
    
            $Update = $bdd->prepare("UPDATE voiture SET idvoit=?,Design=?,codeit=?,frais=? where idvoit =?");
            $Update->execute(array($id,$designation,$it,$frais,$_GET['id']));
                $ERROR = "";
                header('Location:../Projet6/Admin_Bd/voiture.php');}}

?>