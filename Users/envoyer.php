<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
    } catch (Exception $e) {
        die('404 not found!'.$e->getMessage());
    }
    $Rec = $bdd->query('SELECT SUM(frais) AS Somme FROM envoyer ');
    $result = $Rec->fetch(PDO::FETCH_ASSOC);//connection.php
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $cli1 = $bdd->query('SELECT * FROM envoyer where idenvoi LIKE "%'.$_GET['search'].'%" ');
    }else {
        $cli1 = $bdd->query('SELECT * FROM envoyer order by idenvoi ASC');
    }//gettersSend.php
        
    if (isset($_GET['search2']) && !empty($_GET['search2']) && isset($_GET['search3']) && !empty($_GET['search3'])) 
    {
            $start_date = $_GET['search2'];
            $end_date = $_GET['search3'];
            $cli1 = $bdd->prepare('SELECT * FROM envoyer WHERE date_envoi BETWEEN :start_date AND :end_date');
            $cli1->bindParam(':start_date', $start_date);
            $cli1->bindParam(':end_date', $end_date);
            $cli1->execute();
    } 
    else 
    {
            $cli = $bdd->query('SELECT * FROM envoyer ORDER BY idenvoi ASC');
    }
        
    #require "../action/voiture/gettersSend.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/MyStyle.css">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }
        
        th,
        td {
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(odd) {
            background-color: #f2f2f2
        }
        
        * {
            box-sizing: border-box;
        }
        
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        
        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }
        
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        
        input[type=submit]:hover {
            background-color: #45a049;
        }
        
        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        
        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }
        
        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }
        /* Clear floats after the columns */
        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other
    instead of next to each other */
        
        @media screen and (max-width: 600px) {
            .col-25,
            .col-75,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
    <title>itineraire</title>
</head>

<body>

    <div class="header">
        <a href="../Home.php">Gestion des Colis</a>
        <div class="header-right">
            <a class="active" href="envoyer.php">Envoyer</a>
            <a href="recevoir.php">Recevoir</a>
        </div>
    </div>

    <br><br>
    <form action="#" method="GET">
    <div>
    <input type="search" name="search" >
    </div>  
    <div > 
    <button >Rechercher</button>
    </div></form>
    <form action="#" method="GET">
    <div>
    <input type="datetime-local" name="search2" >
    <input type="datetime-local" name="search3" >
    </div>  
    <div > 
    <button >Recherche entre 2 date</button>
    </div>
</form>   
    </br></br>   
    <div>
        <a class="btn btn-success" href="../PageAjoutEnvoyer.php">Envoyer un Colis</a>
    </div>
    <h4 style="text-align: center;">
    LISTE DES COLIS ENVOYER
</h4> 
<div style="overflow-x:auto;">
    
                        <table id="MyTable">
                            <tr>
                            <th>Identifiant d'Envoi</th>
                            <th>Identifiant du voiture</th>
                            <th>Propos du colis</th>              
                            <th>Envoyeur</th>
                            <th>Email</th>
                            <th>date d'envoi</th>
                            <th>frais</th>
                            <th>Recepteur</th>
                            <th>contact</th>
                            <th>Action</th>
                            </tr>
                            <?php
                                while($client = $cli1->fetch()){
                                    ?>
                                    <tr>
                                    <td><?php echo $client['idenvoi'];?></td>
                                    <td><?php echo $client['idvoit'];?></td>
                                    <td><?php echo $client['colis'];?></td>
                                    <td><?php echo $client['nomEnvoyeur'];?></td>
                                    <td><?php echo $client['emailEnvoyeur'];?></td>
                                    <td><?php echo $client['date_envoi'];?></td>
                                    <td><?php echo $client['frais'];?></td>
                                    <td><?php echo $client['nomRecepteur'];?></td>
                                    <td><?php echo $client['contactRecepteur'];?></td>
                                    <td><a type="button" class="btn btn-warning" href="../PageModifierEnvoyer.php?id=<?=$client['idenvoi']?>" value="Modifier">Modifer</a>   <a type="button" class="btn btn-danger" href="../action/envoyer/Delete.php?id=<?=$client['idenvoi']?>" value="Supprimer">Supprimer</a></td>
                                    </tr>
                                    <?php
                                }
                                
                            ?>
                            </table>
                <p> La recette total est de <?php echo $result['Somme']; ?> ariary </p> 
                        
    </div>

    

</body>


</html>