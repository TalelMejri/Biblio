<?php
   require "../db_connected/index.php";
  
    if(isset($_POST['submit'])){

       $nom=$_POST['nom'];
       $prenom=$_POST['prenom'];
       $email=$_POST['email'];
       $password=$_POST['password'];

       if(empty($nom) || empty($prenom) || empty($email) || empty($password)){
            header("location:index.php?msg=All Field Are Required");
       }else{
        $res=$db->prepare("INSERT INTO `user`( `nom`, `prenom`, `email`, `password`, `IsEtudiant`) VALUES (?,?,?,?,?)");
        $res->execute([
            $nom,$prenom,$email,password_hash($password,PASSWORD_DEFAULT),true
        ]);
       }

    }
    
   $title="Signup";
   $template="Signup";
   include "../layout.phtml";

?>