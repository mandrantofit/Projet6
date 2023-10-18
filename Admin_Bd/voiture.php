<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=data_base;charset=utf8', 'root','');
    } catch (Exception $e) {
        die('404 not found!'.$e->getMessage());
    }//connection.php
    $cli = $bdd->query('SELECT * FROM voiture order by Design ASC');//gettersCar.php
    #require "../action/voiture/gettersCar.php";
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../frontend/bootstrap.min.css">
    <link rel="stylesheet" href="../frontend/MyStyle.css">
    <title>voiture</title>
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
        
        tr:nth-child(even) {
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
</head>

<body>

    <div class="header">
        <a href="../Home.php">Gestion des Colis</a>
        <div class="header-right">
            <a href="itineraire.php">Itinéraire</a>
            <a class="active" href="voiture.php">Voiture</a>
        </div>
    </div>
    <br><br>
    <div>
        <a class="btn btn-success" href="../PageAjoutVoiture.php">Ajouter Voiture</a>
    </div>
    <h4 style="text-align: center;">
    LISTE DES VOITURES DISPONIBLES
</h4> 
<div style="overflow-x:auto;">
    
                        <table id="MyTable">
                            <tr>
                            <th>Identifiant du voiture</th>
                            <th>Designation</th>
                            <th>Itinéraire</th>              
                            <th>Frais</th>
                            <th>Action</th>
                            </tr>
                            <?php
                                while($client = $cli->fetch()){
                                    ?>
                                    <tr>
                                    <td><?php echo $client['idvoit'];?></td>
                                    <td><?php echo $client['Design'];?></td>
                                    <td><?php echo $client['codeit'];?></td>
                                    <td><?php echo $client['frais'];?></td>
                                    <td><a type="button" class="btn btn-warning" href="../PageModifierVoiture.php?id=<?=$client['idvoit']?>" value="Modifier">Modifer</a>   <a type="button" class="btn btn-danger" href="../action/voiture/Delete.php?id=<?=$client['idvoit']?>" value="Supprimer">Supprimer</a></td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </table>
                                
                        
    </div>
    <!--<script  src="../frontend/jquery.min.js"></script>
    <script  src="../frontend/jquery.dataTables.js"></script>-->

    <!--<script >
      $(document).ready(function()
      {
        $('#MyTable').DataTable();
      }
      );
    </script>-->
</body>


</html>