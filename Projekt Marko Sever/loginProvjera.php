<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
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
    <div id="containerbody">
        <div class="container" id="cont1">
        <?php 
        $dbc = mysqli_connect("localhost", "root", "", "baza");
            mysqli_set_charset($dbc, "utf8");
        if ($dbc) {
            #echo "Connected successfully";
        }
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);

        //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
        $query = "SELECT * FROM korisnik WHERE korisnicko_ime='$username'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result)>0) {
            if (password_verify($lozinka, $row['lozinka'])) {
                #echo ('Uspjesan login');
                if ($row['razina'] == 1) {
                    echo '<a style="padding:25px;" href="administrator.php">ADMINISTRACIJA</a>';
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                }
                else {
                    echo '<p style="padding:25px;">' . $username . ', nemate dovoljna prava za pristup ovoj stranici.' . '</p>';
                }
            } else {
                #echo ('Neuspjesan login');
                echo '<a style="padding:25px" href="registracija.html">REGISTRIRAJ SE</a>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
            }
        }
        else {
            #echo ('Neuspjesan login');
            echo '<a style="padding:25px;" href="registracija.html">REGISTRIRAJ SE</a>';
            echo '<br>';
            echo '<br>';
            echo '<br>';
        }
        ?>
        </div>
    </div>
    <footer>
    <p class="pfooter">@Marko Sever GMBH | ALLE RECHTE VORBEHALTEN</p>
    <p class="dno pfooter">Content Management by InterRed</p>
   </footer>
</body>
</html>

