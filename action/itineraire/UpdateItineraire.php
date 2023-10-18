<?php
if (isset($_POST['validate'])) {
    if ( !empty($_POST["codeit"])&& !empty($_POST["villedep"])&& !empty($_POST["villearr"])) {
     $it = htmlspecialchars($_POST['codeit']);//manala caractere html
     $dep = htmlspecialchars($_POST['villedep']);
     #$it = htmlspecialchars($_POST['codeit']);
     $arr = htmlspecialchars($_POST['villearr']);
    
$Update = $bdd->prepare("UPDATE itineraire SET codeit=?,villedep=?,villearr=? where codeit =?");
            $Update->execute(array($it,$dep,$arr,$_GET['id']));
                $ERROR = "";
                header('Location:../Projet6/Admin_Bd/itineraire.php');}}

?>