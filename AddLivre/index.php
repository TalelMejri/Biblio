<?php
   require "../db_connected/index.php";
   session_start();
    if(isset($_POST['submit'])){

       $nom=$_POST['nom'];
       $description=$_POST['description'];
       $photo=$_FILES['photo'];

       if(empty($nom) || empty($description) || empty($_FILES['photo']['name'])){
           /*echo "<script>
               alert('All Fields are Required'); 
            </script>";
            */
            header("location:index.php?msg=All Field Are Required");
       }else{
             /* File */
          $namephoto=$_FILES['photo']['name'];
          $type_extention=pathinfo($namephoto,PATHINFO_EXTENSION);
          $newName=md5($nom).'.'.$type_extention;
          move_uploaded_file($_FILES['photo']['tmp_name'],'../LivrePhoto/'.$newName);

          ///$db->query("INSERT INTO `livres`( `nom`, `description`, `photo`) VALUES ('$nom','$description','$newName')");
   
          $livreAdded=$db->prepare("INSERT INTO `livres`( `nom`, `description`, `photo`) VALUES (?,?,?)");
           $livreAdded->execute(
                [$nom,$description,$newName]
           );
       }
    

    }
    
   $title="AddLivre";
   $template="AddLivre";
   include "../layout.phtml";

?>