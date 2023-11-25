<?php 

   require "../db_connected/index.php";
   session_start();
   // get by id

   $id=array_key_exists("id",$_GET) ? $_GET['id'] : $_POST['id'];

   $query=$db->prepare("SELECT * FROM livres where id=?");
   $query->execute([
       $id
   ]);
   $livre=$query->fetch();


   // update by id
   if(isset($_POST['update'])){
      
      $nom=$_POST['nom'];
      $desc=$_POST['description'];
     // $id=$_POST['id'];

      $photo=$_FILES['photo'];
      $namephoto=$_FILES['photo']['name'];
      $type_extention=pathinfo($namephoto,PATHINFO_EXTENSION);
      $newName=md5($nom).'.'.$type_extention;
      move_uploaded_file($_FILES['photo']['tmp_name'],'../LivrePhoto/'.$newName);

      $res=$db->prepare("UPDATE `livres` SET `nom`=?,`description`=?,`photo`=? WHERE id=? ");
      $res->execute([
         $nom,$desc,$newName,$id
      ]);

      header("location:../ConsulteLivre/index.php?msg=Livre Updated");

   }


   $title="Update";
   $template="UpdateLivre";
   include "../layout.phtml";

?>