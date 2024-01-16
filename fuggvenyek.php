<?php

function csapatsportok_adatbazis_csatlakozas(){
    $conn=mysqli_connect("localhost", "root", "") or die("hibas csatlakozas!");
    if(false==mysqli_select_db($conn, "csapatsport" )){
        return null;
    }
    mysqli_query($conn, 'SET NAMES UTF8');
    mysqli_query($conn, 'SET character_set_results=utf8');
    mysqli_set_charset($conn, 'utf8');
    return $conn;
}

function jatekos_hozzad($sapkaszam, $nev, $szuldatum, $csapatnev){
    if(!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="INSERT INTO JATEKOS(sapkaszam, nev, szuldatum, csapatnev) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "isss",$sapkaszam, $nev, $szuldatum, $csapatnev);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);

    return $sikeres;
}

function edzo_hozzad($edzonev, $beosztas, $csapatnev){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="INSERT INTO EDZO(edzonev, beosztas, csapatnev) VALUES (?, ?, ?)";
    $stmt=mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "sss",$edzonev, $beosztas, $csapatnev);
    $sikeres=mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function merkozes_hozzad($ellenfel, $eredmeny, $datum, $helyszin, $csapatnev){
    if (!($conn = csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="INSERT INTO MERKOZESEK(ellenfel, eredmeny, datum, helyszin, csapatnev) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "sssss",$ellenfel, $eredmeny, $datum, $helyszin, $csapatnev);
    $sikeres = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function csapat_lista(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT sapkaszam, nev, szuldatum FROM JATEKOS";
    $result=mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function jatekosok_szama(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT (jatekosokszama-COUNT(sapkaszam)) as jatekosokszama FROM JATEKOS, VIZILABDACSAPAT";
    $result=mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function edzo_lista(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT edzonev, beosztas FROM EDZO";
    $result = mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function merkozes_lista(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT merkozesid, datum, eredmeny, helyszin, ellenfel FROM MERKOZESEK";
    $result=mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function hazai_merkozes_lista(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT datum, eredmeny, ellenfel FROM MERKOZESEK WHERE helyszin='Kecskemét'";
    $result=mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function egymas_elleni_merkozes_lista(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT datum, eredmeny, csapatnev FROM MERKOZESEK WHERE ellenfel='EDZOM'";
    $result=mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function vizilabda_lista(){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="SELECT csapatnev, jatekosokszama FROM VIZILABDACSAPAT";
    $result=mysqli_query( $conn,$sql);
    mysqli_close($conn);
    return $result;
}

function jatekos_torlese($sapka){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="DELETE FROM JATEKOS WHERE sapkaszam = ?";
    $stmt=mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "i", $sapka);
    $sikeres=mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function edzo_torlese($edzonev){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="DELETE FROM EDZO WHERE edzonev = ?";
    $stmt=mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "s", $edzonev);
    $sikeres=mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function merkozes_torlese($merkozesid){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="DELETE FROM MERKOZESEK WHERE merkozesid = ?";
    $stmt=mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "s", $merkozesid);
    $sikeres=mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}

function jatekos_szamanak_modositasa($jatekosokszama){
    if (!($conn=csapatsportok_adatbazis_csatlakozas())){
        return false;
    }
    $sql="UPDATE VIZILABDACSAPAT SET jatekosokszama=? WHERE csapatnev='KESI'";
    $stmt=mysqli_prepare( $conn,$sql);
    mysqli_stmt_bind_param($stmt, "i",$jatekosokszama);
    $sikeres=mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $sikeres;
}
