<?php

include_once("fuggvenyek.php");

$m_ellenfel=$_POST['ellenfel'];
$m_eredmeny=$_POST['eredmeny'];
$m_datum=$_POST['datum'];
$m_helyszin=$_POST['helyszin'];
$m_csapatnev="KESI";

if(isset($m_ellenfel) && isset($m_eredmeny) && isset($m_datum) && isset($m_helyszin)){
    $sikeres=merkozes_hozzad($m_ellenfel, $m_eredmeny, $m_datum, $m_helyszin, $m_csapatnev);
    if($sikeres==true){
        header("Location: urlapok.php");
    }else{
        echo "Hibas hozzaadas";
    }
}else{
    error_log("Rossz input");
}
?>
