<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracija</title>
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
        
    <?php
    $dbc = mysqli_connect("localhost", "root", "", "baza");
    mysqli_set_charset($dbc, "utf8");
    if ($dbc) {
        #echo "Connected successfully";
        }
    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);
    

$sql = "SELECT * FROM vijesti";
$result = $dbc->query($sql);


    
while($row = $result->fetch_assoc()){
    $selected = $row['kategorija']; ?>
    <div class="container" id="cont1">
    <form enctype="multipart/form-data" action="" method="POST">
     <div class="form-item"> 
     <label for="title">Naslov vijesti:</label>
    <div class="form-field"> 
    <input style="width:100%" type="text" name="title" class="form-field-textual" value="<?php echo $row['naslov'];?>"> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="about">Kratki sadržaj vijesti:</label> 
    <div class="form-field"> 
    <textarea style="width:100%" name="about" id="" cols="30" rows="10" class="form-field-textual">
        <?php echo $row['sazetak'];?>
    </textarea> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="content">Sadržaj vijesti:</label> 
    <div class="form-field"> 
    <textarea style="width:100%" name="content" id="" cols="30" rows="10" class="form-field-textual">
        <?php echo $row['tekst'];?>
    </textarea> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="pphoto">Slika:</label> 
    <div class="form-field">
    <input style="width:100%" hidden type="text" name="slika" value="<?php echo $row['slika'];?>" id="">
    <input type="file" class="input-text" id="pphoto" value="<?php echo $row['slika'];?>" name="pphoto"/> 
    <br>
    <?php echo '<img src="' . "image/" . $row['slika'] . '" width=100px>'?>
    </div> 
    </div> 
    <div class="form-item"> 
    <label for="category">Kategorija vijesti:</label> 
    <div class="form-field"> 
    <select name="category" id="category" class="form-field-textual" value="<?php echo $row ['kategorija']; ?>">
    <option <?php if(strtolower($selected) == "sport"){echo "selected ";} ; echo 'value="Sport"'; ?>>Sport</option>
    <option <?php if(strtolower($selected) == "politik"){echo "selected ";} ; echo 'value="Politik"'; ?>>Politik</option>  
    </select> 
    </div> 
    </div> 
    <div class="form-item"> 
    <label>Spremiti u arhivu: 
    <div class="form-field">
    <?php 
    if($row['arhiva'] == 0) { 
        echo '<input type="checkbox" name="archive" id="archive"/> Arhiviraj?'; 
    } else { 
            echo '<input type="checkbox" name="archive" id="archive" checked/> Arhiviraj?'; 
        } 
        ?>
    </div> 
    </label> 
    </div> 

    <div class="form-item"> 
    <input type="hidden" name="id" class="form-field-textual" value="<?php echo $row['id'];?>"> 
    <button type="reset" value="Poništi">Poništi</button>
    <button type="submit" name="update" value="Prihvati"> Izmjeni</button> 
    <button type="submit" name="delete" value="Izbriši"> Izbriši</button>
    </div>
    </div>
    <?php
    if(isset($_POST['delete'])){
        
        $id=$_POST['id'];
        echo $id;
        $sql = "DELETE FROM vijesti WHERE id= '$id' "; 
        $result = $dbc->query($sql);
        echo "<meta http-equiv='refresh' content='0'>";
    }
        
        if(isset($_POST['update'])){
            $picture = $_FILES['pphoto']['name'];
            if($picture == ""){
                $picture = $_POST['slika'];
            }
            $title = $_POST['title'];
            $about = $_POST['about'];
            $content = $_POST['content'];
            $category = $_POST['category'];
            if(isset($_POST['archive'])){
            $archive = 1;
            header("Refresh:1");
            }else{
            $archive = 0;
            }
            $target_dir = 'image/'.$picture;
            move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
            $id=$_POST['id'];
            $sql = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', arhiva='$archive', slika='$picture' WHERE id=$id ";
            $result = $dbc->query($sql);
            echo "<meta http-equiv='refresh' content='0'>"; 
            }
        ?> 
    </div> 
    </form>
    <br>
<?php
}
?>

<footer>
    <p class="pfooter">@Marko Sever GMBH | ALLE RECHTE VORBEHALTEN</p>
    <p class="dno pfooter">Content Management by InterRed</p>
   </footer>

</body>
</html>