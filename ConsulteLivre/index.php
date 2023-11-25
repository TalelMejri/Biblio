<?php 

   require "../db_connected/index.php";
   session_start();
   $query=$db->prepare("select * from livres");
   $query->execute();
   $listLivre=$query->fetchAll();
  
   $title="Consulte";
   $template="ConsulteLivre";
   include "../layout.phtml";

?>