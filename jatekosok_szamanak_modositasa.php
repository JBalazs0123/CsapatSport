<?php
include_once("fuggvenyek.php");

$c_jatekosokszama=$_POST['jatekosokszama'];

if(isset($c_jatekosokszama)){
    $sikeres=jatekos_szamanak_modositasa($c_jatekosokszama);
    if($sikeres==true){
        header("Location: kezdolap.php");
    }else{
        echo "Hibas modositas";}
}else{
    error_log("rossz input");}
?>
