<?php

include_once("fuggvenyek.php");

$e_edzonev=$_POST['edzonev'];
$e_beosztas=$_POST['beosztas'];
$e_csapatnev="KESI";

if(isset($e_edzonev) && isset($e_beosztas)){
    $sikeres=edzo_hozzad($e_edzonev, $e_beosztas, $e_csapatnev);
    if($sikeres==true){
        header("Location: urlapok.php");
    }else{
        echo "Hibas hozzaadas";
    }
}else{
    error_log("rossz input");
}
?>
