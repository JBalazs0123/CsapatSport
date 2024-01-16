<?php

include_once('fuggvenyek.php');

$toroltedzonev=$_POST["toroltedzonev"];

if(isset($toroltedzonev)) {
    $sikeres=edzo_torlese($toroltedzonev);
    if($sikeres){
        header('Location: listak.php');
    }else{
        echo 'Hibas torles';
    }
}else{
    error_log('rossz input');
}
?>
