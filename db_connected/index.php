<?php 

   try{
        $db=new PDO('mysql:host=localhost;dbname=biblio','root','');
    }catch(Exception $e){
        echo $e->getMessage();
    }

?>