<?php
    require "action/voiture/gettersUpdate.php";
    $var3 = $bdd->query('SELECT * FROM itineraire');   
    require "action/voiture/UpdateCar.php"
    #require "action/voiture/";
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
        <label for="identifiant">Identifiant</label>
      </div>
      <div class="col-75">
        <input type="text" id="identifiant"value="<?=$identifiant?>" name="identifiant" placeholder="">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="designation">Designation</label>
      </div>
      <div class="col-75">
        <input type="text" id="designation"value="<?=$designation?>"  name="designation" placeholder="">
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
        <label for="codeit">Itinéraire</label>
      </div>
      <div class="col-75">
      <select id="codeit" name="codeit">
         <?php

            while ($var4 = $var3->fetch()) {
              ?>
                <option value="<?=$var4['codeit']?>"><?=$var4['codeit']?></option>
              <?php
            }
         ?>      
        </select>
      </div>
    </div>  
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
        <label for="frais">Frais</label>
      </div>
      <div class="col-75">
        <input type="text" id="frais"value="<?=$frais?>" name="frais" placeholder="">
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