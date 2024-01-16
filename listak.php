<?php
    include_once("fuggvenyek.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listák</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
            vertical-align: middle;
            text-align: center;
            padding: 1px;
        }
        th, input {
            background-color: rgb(52,110,235);
            color: white;
        }
        tr:hover { background-color: lightblue; }
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
<h2>Játékosok adatai</h2>
<table >
    <tr>
        <th>Sapka szám</th>
        <th>Név</th>
        <th>Születési dátum</th>
        <th>Törlés</th>
    </tr>
    <?php
    $csapat=csapat_lista();
    while($sor=mysqli_fetch_assoc($csapat)){
        echo '<tr>';
        echo '<td>'.$sor["sapkaszam"].'</td>';
        echo '<td>'.$sor["nev"].'</td>';
        echo '<td>'.$sor["szuldatum"].'</td>';
        echo '<td><form method="POST" action="jatekos_torles.php">
				  <input type="hidden" name="toroltjatekos_sapkaszam" value="'.$sor["sapkaszam"].'" />
				  <input type="submit" value="Játékos törlése" />
		          </form></td>';
        echo '</tr>';
    }
    mysqli_free_result($csapat);
    ?>
</table>
<br>
<h2>Edzők adatai</h2>
<table>
    <tr>
        <th>Név</th>
        <th>Beosztás</th>
        <th>Törlés</th>
    </tr>
    <?php
    $edzo=edzo_lista();
    while($sor=mysqli_fetch_assoc($edzo)){
        echo '<tr>';
        echo '<td>'.$sor["edzonev"].'</td>';
        echo '<td>'.$sor["beosztas"].'</td>';
        echo '<td><form method="POST" action="edzo_torles.php">
				  <input type="hidden" name="toroltedzonev" value="'.$sor["edzonev"].'" />
				  <input type="submit" value="Edző törlése" />
		          </form></td>';
        echo '</tr>';
    }
    mysqli_free_result($edzo);
    ?>
</table>
<br>
<h2>Mérkőzések adatai</h2>
<table>
    <tr>
        <th>Ellenfél</th>
        <th>Eredmény</th>
        <th>Dátum</th>
        <th>Helyszín</th>
        <th>Törlés</th>
    </tr>
    <?php
    $merkozes=merkozes_lista();
    while($sor=mysqli_fetch_assoc($merkozes)){
        echo '<tr>';
        echo '<td>'.$sor["ellenfel"].'</td>';
        echo '<td>'.$sor["eredmeny"].'</td>';
        echo '<td>'.$sor["datum"].'</td>';
        echo '<td>'.$sor["helyszin"].'</td>';
        echo '<td><form method="POST" action="merkozes_torles.php">
				  <input type="hidden" name="toroltmerkozesid" value="'.$sor["merkozesid"].'" />
				  <input type="submit" value="Mérkőzés törlése" />
		          </form></td>';
        echo '</tr>';
    }
    mysqli_free_result($merkozes);
    ?>
</table>
<br>
<h2>Hazai pályán játszott mérkőzések</h2>
<table>
    <tr>
        <th>Ellenfél</th>
        <th>Eredmény</th>
        <th>Dátum</th>
    </tr>
    <?php
    $merkozes=hazai_merkozes_lista();
    while($sor=mysqli_fetch_assoc($merkozes)){
        echo '<tr>';
        echo '<td>'.$sor["ellenfel"].'</td>';
        echo '<td>'.$sor["eredmeny"].'</td>';
        echo '<td>'.$sor["datum"].'</td>';
        echo '</tr>';
    }
    mysqli_free_result($merkozes);
    ?>
</table>
<br>
<h2>Edzőmérkőzések</h2>
<table>
    <tr>
        <th>Eredmény</th>
        <th>Dátum</th>
        <th>Csapatnév</th>
    </tr>
    <?php
    $merkozes=egymas_elleni_merkozes_lista();
    while($sor=mysqli_fetch_assoc($merkozes)){
        echo '<tr>';
        echo '<td>'.$sor["eredmeny"].'</td>';
        echo '<td>'.$sor["datum"].'</td>';
        echo '<td>'.$sor["csapatnev"].'</td>';
        echo '</tr>';
    }
    mysqli_free_result($merkozes);
    ?>
</table>
<br>
</body>
</html>