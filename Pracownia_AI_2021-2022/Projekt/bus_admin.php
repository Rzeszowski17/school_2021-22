<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <link rel="stylesheet" href="./Style/style_oso.css">
    
    <title>Samochody od ręki</title>
</head>
<body>
    <div id="baner">
        <span id="banertx">Samochody od ręki</span>
    </div> 

    <div id="lista">
        <ul>
            <li id="glow"><a href="./index.php" id="glow"><img src="./Photos/Domek.png"></a></li>
            <li><a href="./osobowe.php">Samochody osobowe</a></li>
            <li><a href="./bus.php" id="us_visi">Busy</a></li>
            <li><a href="./dostawa.php" >Samochody dostawcze</a></li>
            <li><a href="./logowanie.php?akcja=wyloguj">Wyloguj się</a></li>
            <li><a href="./panel_admin.php">Panel administratora</a></li>
        </ul>
    </div>
    
    <div id="main_reszt"> 
        <form method="post">
            Sortuj wg:
            <select name='sortowanie'>
                <option value='asc'>Cena rosnąca</option>
                <option value='desc'>Cena malejąca</option>
            </select>
            <input type="submit" name="submit" value="Sortuj">
        </form>
        <?php 
        session_start();
        $connect=mysqli_connect("localhost", "root", "", "wypozyczalnia");
        mysqli_set_charset($connect, "UTF8");
        $query=mysqli_query($connect, "SELECT `ID_pojazdu`,`Rejestracja`, `Model`, `Marka`, `Opis`, `Cena`, `Typ`,`Ilosc miejsc`, `Zdjecie` FROM `pojazdy` where `Typ`='Bus'");

        if(isset($_POST['submit']))
        {
            $sort=$_POST['sortowanie'];
            $query=mysqli_query($connect, "SELECT `ID_pojazdu`,`Rejestracja`, `Model`, `Marka`, `Opis`, `Cena`, `Typ`,`Ilosc miejsc`, `Zdjecie` FROM `pojazdy` where `Typ`='Bus' ORDER BY `Cena` $sort");             
        }
        
        $i=1;
        $j=1;
        while($tablica=mysqli_fetch_array($query))
        {   
        echo "<div class='pojazd pojazd$j'><div class='dane'><img src='./Photos/Busy/$tablica[Zdjecie]'><p class='danep'>".$tablica['Marka']." ".$tablica['Model']."<br>";
        echo "</p>";
        echo "<p class='opis'>".$tablica['Opis']."</p><p class='cena'>".$tablica['Cena']." zł/dzień </p></div>";
        echo "<div class='przycisk'><form action='edytujpojazd.php' method='POST'><input type='submit' value='Edytuj dane' name='submit$i'>";
        echo "<input type='text' name='id' value='$tablica[ID_pojazdu]' hidden>";
        echo "</form></div></div>";
        $i++;        
        if($j==1)
        $j=2;
        else if($j==2)
        $j=1;
        }
        $_SESSION['wiersze']=$i;
        $_SESSION['rodzaj']=3;
        
        ?>
    </div>    
</body>
<footer>
    <div id="foottx3">
    <span>Dane kontaktowe: 
    <br>Email: jan.kowalski@fastcars.pl 
    <br>Telefon: 782 980 274</span>
    </div>

    <div id="foottx2">
    <span>Warunki użytkownika 
    <br>Polityka prywatności</span>
    </div>

    <div id="foottx1">
    <span>Copyright © - Fast Cars</span>
    </div>
</footer>
</html>