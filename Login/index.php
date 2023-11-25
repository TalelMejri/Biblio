<?php
   require "../db_connected/index.php";

   //start session
   session_start();
  
    if(isset($_POST['submit'])){

       $email=$_POST['email'];
       $password=$_POST['password'];

       if(empty($email) || empty($password) ){
            header("location:index.php?msg=All Field Are Required");
       }else{

            $query=$db->prepare("select * from user where email=:email");

            $query->execute([
               "email"=>$email
            ]);

            $user=$query->fetch();

            if($user){
               if(!password_verify($password,$user['password'])){
                  header("location:index.php?msg=Email or Password incorrect");
               }else{

                  $_SESSION['id']=$user['id'];
                  $_SESSION['nom']=$user['nom'];
                  $_SESSION['prenom']=$user['prenom'];
                  $_SESSION['email']=$user['email'];
                  $_SESSION['IsEtudiant']=$user['IsEtudiant'];

                  //etudiant
                  if($user['IsEtudiant']){
                     header("location:../ProfileEtudiant/index.php");
                  }else{
                     header("location:../ConsulteLivre/index.php");
                  //bibliothque
                  }

               }
            }else{
               header("location:index.php?msg=Email or Password incorrect");
            }
 
       }

    }
    
   $title="Login";
   $template="Login";
   include "../layout.phtml";

?>