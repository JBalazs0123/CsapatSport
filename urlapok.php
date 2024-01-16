<?php
include_once("fuggvenyek.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Űrlapok</title>
    <style>
        p{
            font-size: large;
        }
        input[type="reset"], input[type="submit"] {
            background-color: rgb(52,110,235);
            color: #FFF;
            border: none;
            outline: none;
            font-size: 19px;
            width: 110px;
            height: 35px;
            text-align: center;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="csapat.css">
</head>
<body>
<div class="header">
    <h1>Üdvözöljük a KESI vízilabda csapat adatbázis kezelő oldalán!</h1>
</div>

<ul>
    <li><a onclick="document.location='kezdolap.php'">Kezdőlap</a></li>
    <li><a onclick="document.location='urlapok.php'">Űrlapok</a></li>
    <li><a onclick="document.location='listak.php'">Adatok</a></li>
</ul>

<h2>Játékos hozzáadás</h2>
<form method="POST" action="jatekos_hozzaad.php"  accept-charset="utf-8">
    <label>Sapka száma: </label>
    <input type="text" name="sapkaszam" size="2" required />
    <br>
    <label>Játékos neve: </label>
    <input type="text" name="nev" size="40" required />
    <br>
    <label>Születési dátum: </label>
    <input type="date" name="szuldatum" />
    <br><br>
    <input type="reset" value="Törlés"/>
    <input type="submit" value="Mentés" />
</form>
<br>
<?php
$jatekosok_szama=jatekosok_szama();
while($sor=mysqli_fetch_assoc($jatekosok_szama)){
    echo '<tr>';
    echo '<td>'.'Szabadon igazolhato játékosok száma: '.$sor["jatekosokszama"].'</td>';
    echo '</tr>';
}
mysqli_free_result($jatekosok_szama);
?>
<br><br>

<h2>Edző hozzáadás</h2>
<form method="POST" action="edzo_hozzaad.php"  accept-charset="utf-8">
    <label>Edző neve: </label>
    <input type="text" name="edzonev" size="40" required />
    <br>
    <label>Beosztás: </label>
    <input type="text" name="beosztas" size="30" />
    <br><br>
    <input type="reset" value="Törlés"/>
    <input type="submit" value="Mentés" />
</form>
<br><br>

<h2>Mérkőzések hozzáadás</h2>
<form method="POST" action="merkozes_hozzaad.php"  accept-charset="utf-8">
    <label>Ellenfél: </label>
    <input type="text" name="ellenfel" size="30" required />
    <br>
    <label>Eredmény: </label>
    <input type="text" name="eredmeny" size="5" required />
    <br>
    <label>Mérkőzés dátuma: </label>
    <input type="date" name="datum" />
    <br>
    <label>Helyszín: </label>
    <input type="text" name="helyszin" size="40">
    <br><br>
    <input type="reset" value="Törlés"/>
    <input type="submit" value="Mentés" />
    <br>
</form>
<p>Egymás ellen játszott edzőmérközés esetén az ellenfél: "EDZOM"</p>
<br>
</body>
</html>