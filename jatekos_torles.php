<?php

include_once('fuggvenyek.php');

$toroltjatekos_sapka=$_POST["toroltjatekos_sapkaszam"];

if(isset($toroltjatekos_sapka)){
    $sikeres=jatekos_torlese($toroltjatekos_sapka);
    if ($sikeres){
        header('Location: listak.php');
    }else{
        echo 'Hibas jatekos torles';
    }
}else{
    echo 'rossz input';
}
?>
