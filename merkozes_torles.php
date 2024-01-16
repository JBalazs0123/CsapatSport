<?php

include_once('fuggvenyek.php');

$toroltmerkozesid=$_POST["toroltmerkozesid"];

if(isset($toroltmerkozesid)){
    $sikeres = merkozes_torlese($toroltmerkozesid);
    if($sikeres){
        header('Location: listak.php');
    }else{
        echo 'Hibás merkozes torles';
    }
}else{
    echo 'Rossz input';
}
?>
