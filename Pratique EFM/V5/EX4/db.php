<?php
    $Srvr="localhost";
    $dbname="University";
    $login="root";
    $PW="";

    $cnx=new PDO("mysql:host=$Srvr;dbname=$dbname",$login,$PW);
    $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>