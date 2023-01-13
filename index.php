<?php
require "dbBroker.php";
require "utakmica.php"; 
require "igrac.php";

session_start();

$igraci = Igrac::get_all_players($conn);

if(!$igraci){
    echo "Greska prilikom upita za sve igrace";
    exit();
}

// if(isset($_POST['submit']) && $_POST['submit'] == "Statistika"){
    // $statistika_igraca = Igrac::get_player_stats($_POST["id"], $conn);    
    // $statisika = $statistika_igraca->fetch_array();
//     echo $statisika["poeni"];
//     echo $statisika["skokovi"];
//     echo $statisika["asistencije"];
//     echo $statisika["ukradene"];
//     echo $statisika["izgubljene"];
//     echo $statisika["blokade"];
//     echo $statisika["minuti"];
// }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kkfon igraci</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <div class="container">
        
        <h2 class="mb-5">Tabela igraca</h2>
        <a href="rezultati.php">Vidi rezultate</a>

      <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">Broj</th>
            <th scope="col">Ime</th>
            <th scope="col">Prezime</th>
            <th scope="col">Pozicija</th>
            <th scope="col">Poeni</th>
            <th scope="col">Skokovi</th>
            <th scope="col">Asistencije</th>
            <th scope="col">Ukradene</th>
            <th scope="col">Izgubljene</th>
            <th scope="col">Blokade</th>
            <th scope="col">Minuti</th>
          </tr>
        </thead>
        <tbody>
            <?php
                while ($igrac = $igraci->fetch_array()):
            ?>
          <tr>
            <th scope="row"><?php echo $igrac["igrac_id"]  ?></th>
            <td><?php echo $igrac["ime"]  ?></td>
            <td><?php echo $igrac["prezime"]  ?></td>
            <td><?php echo $igrac["pozicija"]  ?></td>
            <td><?php echo $igrac["poeni"]  ?></td>
            <td><?php echo $igrac["skokovi"]  ?></td>
            <td><?php echo $igrac["asistencije"]  ?></td>
            <td><?php echo $igrac["ukradene"]  ?></td>
            <td><?php echo $igrac["izgubljene"]  ?></td>
            <td><?php echo $igrac["blokade"]  ?></td>
            <td><?php echo $igrac["minuti"]  ?></td>
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

