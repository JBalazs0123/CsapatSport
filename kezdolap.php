<?php
include_once("fuggvenyek.php")
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Kezdőlap</title>
    <style>
        input[type="submit"] {
            background-color: rgb(52,110,235);
            color: #FFF;
            border: none;
            outline: none;
            font-size: 14px;
            width: 70px;
            height: 22px;
            text-align: center;
        }
        table {
            font-size: x-large;
            width: 30%;
            margin: 0 auto;
        }
        th, td {
            vertical-align: middle;
            text-align: center;
            padding: 1px;
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
<p>
    Az alábbi weblap a Kesi vízilabda csapat saját adatbázis kezelő weboldala. Az oldal funkcionalítását illetően képes tárolni és törölni
    játékosokat, edzőket, mérkőzések adatait és azok különböző statisztikáit az "Adatok" menüpont allatt.<br>
    Ezen adatokból újakat is felvihetünk az "Űrlapok" menüpont alatt.<br>
    Az oldal alján megtalálhatóak a csapat alapadatai is.
</p>
<img src="img/hatter.png" alt="Labda" title="Labda" width="500" />
<br><br>
<table>
    <?php
    $vizilabda = vizilabda_lista();
    while( $sor = mysqli_fetch_assoc($vizilabda) ) {
        echo '<tr>';
        echo '<th> Csapatnév: </th>';
        echo '<td>'.$sor["csapatnev"].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Játékosok száma: </th>';
        echo '<td>'.$sor["jatekosokszama"].'</td>';
        echo '</tr>';
    }
    mysqli_free_result($vizilabda);
    ?>
</table>
<form method="POST" action="jatekosok_szamanak_modositasa.php"  accept-charset="utf-8">
    <label>Játékosok számának módosítása: </label>
    <input type="text" name="jatekosokszama" size="5" required />
    <input type="submit" value="Mentés" />
</form>
<br><br>
</body>
</html>