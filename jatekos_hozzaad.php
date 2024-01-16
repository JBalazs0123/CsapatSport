<?php

include_once("fuggvenyek.php");

$j_sapkaszam=$_POST['sapkaszam'];
$j_nev=$_POST['nev'];
$j_szuldatum=$_POST['szuldatum'];
$j_csapatnev="KESI";

if(isset($j_sapkaszam) && isset($j_nev) && isset($j_szuldatum)) {
    $sikeres=jatekos_hozzad($j_sapkaszam, $j_nev, $j_szuldatum, $j_csapatnev);
    if($sikeres==true) {
        header("Location: urlapok.php");
    }else{
        echo "Hibas hozzaadas";
    }
}else{
    error_log("rossz input");
}
?>