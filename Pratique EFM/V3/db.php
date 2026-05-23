<?php 
try{
$cnx=new PDO("mysql:host=localhost;dbname=dbhotel","root","");
}catch(PDOException $e){
    die("l erreur est : $e->getMessage()");
}
?>