<?php 

    require "./db_connected/index.php";

    $id=$_GET['id'];

    $res=$db->prepare("DELETE from livres where id=?");
    $res->execute([
        $id
    ]);

    header("location:./ConsulteLivre/index.php?msg=Livre Deleted");

?>