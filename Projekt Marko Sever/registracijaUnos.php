<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
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
    <div id="containerbody">
        <div class="container" id="cont1">
        <?php
        $dbc = mysqli_connect("localhost", "root", "", "baza");
            mysqli_set_charset($dbc, "utf8");
        if ($dbc) {
            #echo "Connected successfully";
        }
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['username'];
        $lozinka = $_POST['pass'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;
        $registriranKorisnik = '';
        //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt) > 0){
        $msg='Korisničko ime već postoji!';
        echo '<p style="padding:25px;">' . $msg . '</p>';
        #echo $msg;
        }else{
        // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection
        $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka,
        razina)VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,
        $hashed_password, $razina);
        mysqli_stmt_execute($stmt);
        $registriranKorisnik = true;
        echo '<p style="padding:25px;">' . 'Uspješno registriran korisnik!' . '</p>';
        }
        }
        mysqli_close($dbc);
        ?>
        </div>
    </div>
    <footer>
    <p class="pfooter">@Marko Sever GMBH | ALLE RECHTE VORBEHALTEN</p>
    <p class="dno pfooter">Content Management by InterRed</p>
   </footer>
</body>
</html>