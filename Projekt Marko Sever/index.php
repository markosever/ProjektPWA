<?php
$dbc = mysqli_connect("localhost", "root", "", "baza");
mysqli_set_charset($dbc, "utf8");
if ($dbc) {
    #echo "Connected successfully";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RP ONLINE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="header">
        <header>
            <nav>
                <ul>
                    <li><img src="images/logo.png" alt="" id="logo"></li>
                    <li><a href="unos.html" id="right">UNOS</a></li>
                    <li><a href="login.html" id="right">ADMINISTRACIJA</a></li>
                    <li><a href="kategorija.php?id=politik" id="right">POLITIK</a></li>
                    <li><a href="kategorija.php?id=sport" id="right">SPORT</a></li>
                    <li><a href="index.php" id="right">HOME</a></li>
                    
                  </ul>
            </nav>
        </header> 
        
    </div>
    <hr class="zuto">

    <?php
        #$kategorija=$_GET[kategorija];
        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='sport'";
        $result = mysqli_query($dbc, $query);
        $i=0;
        ?>
        <?php
        echo '<div id="containerbody">';
        echo '<div class="container" id="cont1">';
        echo '<div class="naslovgore">';
        echo '<h3>' . 'Sport' . '</h3>';
        echo '</div>';
        while($row = mysqli_fetch_array($result)) {
        
        echo '<div class="clanak">';
        echo '<img class="slikacl" src="' . './image/' . $row['slika'] . '"';
        echo '</div>';
        echo '<br>';
        echo '<div class="tekst">';
        echo '<h2>' . $row['naslov'] . '</h2>';
        echo '<p class="ptext">' . $row['tekst'] . '</p>';
        echo '</div>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<hr>';
        echo '</div>';
        
        }
        ?>
        </div>
    
    <?php
        #$kategorija=$_GET[kategorija];
        $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='politik'";
        $result = mysqli_query($dbc, $query);
        $i=0;
        ?>
        <?php
        echo '<div id="containerbody">';
        echo '<div class="container" id="cont1">';
        echo '<div class="naslovgore">';
        echo '<h3>' . 'Politik' . '</h3>';
        echo '</div>';
        while($row = mysqli_fetch_array($result)) {
        
        echo '<div class="clanak">';
        echo '<img class="slikacl" src="' . './image/' . $row['slika'] . '"';
        echo '</div>';
        echo '<br>';
        echo '<div class="tekst">';
        echo '<h2>' . $row['naslov'] . '</h2>';
        echo '<p class="ptext">' . $row['tekst'] . '</p>';
        echo '</div>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<br>';
        echo '<hr>';
        echo '</div>';

        }
        ?>
           
    
    <br>
    <br>
    <br>
    <br>
    </div>
   <footer>
    <p class="pfooter">@Marko Sever GMBH | ALLE RECHTE VORBEHALTEN</p>
    <p class="dno pfooter">Content Management by InterRed</p>
   </footer>
    
</body>
</html>