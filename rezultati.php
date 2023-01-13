<?php
require "dbBroker.php";
require "utakmica.php"; 
require "igrac.php";

session_start();

$utakmice = Utakmica::get_all_games($conn);
$rezultati = Utakmica::get_score($conn);
$skor = $rezultati->fetch_array();

if(!$utakmice){
    echo "Greska prilikom upita za sve utakmice";
    exit();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kkfon rezultati</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">

<div class="row">
        <div class="col-1 slika"> 
            <a class="navbar-brand" href="/">
                <div class="logo-image" >
                <img src="img/logo.png" class="img-fluid" id ="logo">
                </div>
        </a>
        </div>
        <div class="navigacija col-11">
            <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
        </div>
    </div>

        <br>

        <h2>Trenutni skor</h2>
        <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Broj odigranih utakmica</th>
            <th scope="col">Broj pobeda</th>
            <th scope="col">Broj poraza</th>
          </tr>
        </thead>
        <tbody>
            
          <tr>
            <td><?php echo $skor ["broj_utakmica"] ?></td>
            <td><?php echo $skor ["broj_pobeda"]  ?></td>
            <td><?php echo $skor ["broj_poraza"] ?></td>
          </tr>
          
        </tbody>
        </table>
        
        <br>

        <h2>Rezultati po kolima</h2>

      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Kolo</th>
            <th scope="col">Domacin</th>
            <th scope="col">Domacin broj poena</th>
            <th scope="col">Gost broj poena</th>
            <th scope="col">Gost</th>
          </tr>
        </thead>
        <tbody>
            <?php
                while ($utakmica = $utakmice->fetch_array()):
            ?>
          <tr>
            <th scope="row"><?php echo $utakmica ["utakmica_id"]  ?></th>
            <td><?php echo $utakmica ["domacin"]  ?></td>
            <td><?php echo $utakmica ["domacin_broj_poena"]  ?></td>
            <td><?php echo $utakmica ["gost_broj_poena"]  ?></td>
            <td><?php echo $utakmica ["gost"]  ?></td>
          </tr>
          <?php
                endwhile;           
            ?>
        </tbody>
      </table>


    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
</body>
</html>