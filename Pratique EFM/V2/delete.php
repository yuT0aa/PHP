<?php
    require('config.php');
    if(isset($_GET['id'])){
        $selected_id=$_GET['id'];
        $req="delete from immobilier where id=?";
        $stmt=$cnx->prepare($req);
        $stmt->execute([$selected_id]);
        header("location:listerC.php");
    }
?>