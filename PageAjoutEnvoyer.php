<?php
    require "action/envoyer/CreateSend.php";
    $var3 = $bdd->query('SELECT * FROM voiture');
    $var5 = $bdd->query('SELECT * FROM voiture ');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>table {
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

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=Email], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=datetime-local], select, textarea {
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

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>

<div class="container">
  <form  method="POST">
    <div class="row">
      <div class="col-25">
        <label for="idenvoi">Identifiant de l'envoie</label>
      </div>
      <div class="col-75">
        <input type="text" id="idenvoi" name="idenvoi" placeholder="ID">
      </div>  
    </div>
    <div class="row">
      <div class="col-25">
        <label for="idvoit">identifiant du voiture</label>
      </div>
      <div class="col-75">
        <select id="idvoit" name="idvoit">
         <?php

            while ($var4 = $var3->fetch()) {
              ?>
                <option value="<?=$var4['idvoit']?>"><?=$var4['idvoit']?></option>
              <?php
            }
         ?>      
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="colis">Propos du colis</label>
      </div>
      <div class="col-75">
        <input type="text" id="colis" name="colis" placeholder="colis">
      </div>  
    </div>
    <div class="row">
      <div class="col-25">
        <label for="nomEnvoyeur">Nom de l'envoyeur</label>
      </div>
      <div class="col-75">
        <input type="text" id="nomEnvoyeur" name="nomEnvoyeur" placeholder="NOM">
      </div>  
    </div>
    <div class="row">
      <div class="col-25">
        <label for="emailEnvoyeur">Address Email</label>
      </div>
      <div class="col-75">
        <input type="Email" id="emailEnvoyeur" name="emailEnvoyeur" placeholder="@gmail.com">
      </div>  
    </div>
    <div class="row">
      <div class="col-25">
        <label for="date_envoi">date d'envoie</label>
      </div>
      <div class="col-75">
        <input type="datetime-local" id="date_envoi" name="date_envoi" placeholder="">
      </div>  
    </div>
    <div class="row">
      <div class="col-25">
        <label for="frais">Frais</label>
      </div>
      <div class="col-75">
        <select id="frais" name="frais">
         <?php

            while ($var6 = $var5->fetch()) {
              ?>
                <option value="<?=$var6['frais']?>"><?=$var6['frais']?></option>
              <?php
            }
         ?>      
        </select>
      </div>
    </div>
    <!--<div class="row">
      <div class="col-25">
        <label for="codeit">Itinéraire</label>
      </div>
      <div class="col-75">
        <input type="text" id="codeit" name="codeit" placeholder="itinéraire">
      </div>
    </div>-->
    <div class="row">
      <div class="col-25">
        <label for="nomRecepteur">Nom du récepteur</label>
      </div>
      <div class="col-75">
        <input type="text" id="nomRecepteur" name="nomRecepteur" placeholder="NOM">
      </div>  
    </div>
    <!--<div class="row">
      <div class="col-25">
        <label for="codeit">Itinéraire</label>
      </div>
      <div class="col-75">
        <select id="codeit" name="codeit">
         <?php

            #while ($var4 = $var3->fetch()) {
              ?>
                <option value="<?=$var4['codeit']?>"><?=$var4['codeit']?></option>
              <?php
            #}
         ?>      
        </select>
      </div>
    </div>-->
    <!--<div class="row">
      <div class="col-25">
        <label for="subject">Propos du Colis</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>-->
    <div class="row">
      <div class="col-25">
        <label for="contactRecepteur">Contact du Récepteur</label>
      </div>
      <div class="col-75">
        <input type="text" id="contactRecepteur" name="contactRecepteur" placeholder="+261 34">
      </div>
    </div>
    <div class="row">
      <input  type="submit" name="validate" value="Valider">
      <!--<a  name="validate" type="submit" href="send/Send.php" value="Valider">Valider</a>-->  
      <?php
        #echo $ERROR;
        if (isset($ERROR)) {
          echo $ERROR;
        }
      ?>
    </div>
  </form>
</div>
</body>
</html>