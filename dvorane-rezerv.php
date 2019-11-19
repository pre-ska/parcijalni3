

<!DOCTYPE html>
<html>
  <head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <head>
      <style>
      html, body {
        font-family: 'Lato', sans-serif;
        color: blue;
      }
      .linkBox {
        line-height: 85px;
        color: blue;
        font-size: 24px;
        padding: 5px 10px;
        border-radius: 5px;
        text-align: center;
        /* float: left; */
        /* margin-left: 10px; */
        
      }
      .linkBox:hover {
        background: #EDF3FF;
      }

      a {
        text-decoration: none;
      }

      .containerLinks {
        width: 560px;
  display: grid;
  grid-gap: 15px;
  grid-template-columns: repeat(5, 100px);
  grid-template-rows: repeat(5, 100px);
  grid-auto-flow: column;
        margin: 50px auto;

      }
      h1 {
        text-align:center;
      }

      </style>

  </head>
  <body>

  <?php
    $host='localhost';
    $user='root'; 
    $password=''; 
    $database='fakultet'; 
    // $port=3306;
    $mysqli= new mysqli($host, $user, $password, $database);
    
    if(mysqli_connect_errno()){
      echo "Ne mogu se spojiti na bazu podataka<br>";
      echo mysqli_connect_error();
      exit;  
    } else {
      // echo "Spojen na fakultet db!!!<br>";
    }
    // var_dump($_GET);

    if(isset($_GET["dvorana"])) {
      $s = $_GET["dvorana"];

      $query = "SELECT * FROM rezervacija " ;
      // $query = "SELECT nazPred, oznVrstaDan, sat FROM rezervacija JOIN pred ON rezervacija.sifPred=pred.sifPred WHERE rezervacija.oznDvorana='" . $s . "'" ;
      $result = mysqli_query($mysqli,$query);
      
      if ($result){
        echo 'aaaaaaaaaaaaaaaaaaaa';
        $row = mysqli_fetch_array($result);
        print_r($row);
        // while ($row = mysqli_fetch_array($result)){
        //      echo kojiDan($row['oznVrstaDan']) . ', ' . $row['sat'].':00, '. ' Predmet: '. $row['nazPred']  . '<br />';       
        // }
      }
      else{
        echo 'Pogreska kod SQL upita';
      }




    } else {
      // $s = "0";
      echo "
        <h1>Dvorane:</h1>
        <div class='containerLinks'>";

      $upit = "SELECT * FROM dvorana";
      if ($rez = $mysqli->query($upit)) {
        while ($row = $rez->fetch_assoc()) {
          $tmp = $row['oznDvorana'];
          $tmpStr = "?dvorana=".$tmp;
          
          echo "
          <a href=".$tmpStr.">
            <div class='linkBox'>".$tmp."</div>
          </a>";
          // echo $row['oznDvorana'];
        }
      }
    }






  ?>
  </div>

  </body>
</html>
