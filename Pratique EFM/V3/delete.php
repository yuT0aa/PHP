<?php
require('db.php');
  if(isset($_GET["idH"])){
    $id=$_GET["idH"];
    $req="delete from hotel where idHotel=?";
    $stm=$cnx->prepare($req);
    $stm->execute([$id]);
    header('Location:ListeH.php');  
  }
?>