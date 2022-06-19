<?php
error_reporting(0);

$title=$_POST['title'];
$about=$_POST['about'];
$content=$_POST['content'];
#$image=$_POST['pphoto'];
$category=$_POST['category'];
$date=date('d.m.Y.');

$picture = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "image/" . $picture;

#echo $filename;

if(isset($_POST['archive'])) {
    $archive=1;
}
else {
    $archive=0;
}
 
$dbc = mysqli_connect("localhost", "root", "", "baza");
mysqli_set_charset($dbc, "utf8");
if ($dbc) {
    #echo "Connected successfully";
}

$sql="INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) values (?, ?, ?, ?, ?, ?, ?)";
/* Inicijalizira statement objekt nad konekcijom */
$stmt=mysqli_stmt_init($dbc);
/* Povezuje parametre statement objekt s upitom */
if (mysqli_stmt_prepare($stmt, $sql)){
/* Povezuje parametre i njihove tipove s statement objektom */
mysqli_stmt_bind_param($stmt,'ssssssi', $date, $title, $about, $content, $picture, $category, $archive);
/* Izvršava pripremljeni upit */
mysqli_stmt_execute($stmt);
}
move_uploaded_file($tempname, $folder);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
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
    <div class="container" id="cont1">
        <div class="naslovgore">
            <h3><?php echo $category; ?></h3>
        </div>
    <h1><?php echo $title; ?></h1>
    <p><?php echo $date; ?></p>
    <?php echo '<img width="100%" src="' . './image/' . $picture . '"'; ?>
    <p class="bold">
    <?php echo $content ?>
    <p>
    <footer>
        <p class="pfooter">@Marko Sever GMBH | ALLE RECHTE VORBEHALTEN</p>
        <p class="dno pfooter">Content Management by InterRed</p>
    </footer>
</body>
</html>