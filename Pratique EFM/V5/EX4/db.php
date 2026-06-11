<?php
    $Srvr="localhost";
    $dbname="University";
    $login="root";
    $PW="";

    try{
        $cnx=new PDO("mysql:host=$Srvr;dbname=$dbname",$login,$PW);
    }catch(PDOException $e){
        die("Erreur:".$e->getMessage());
    }
?>