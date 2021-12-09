<?php

include '../config/conexion.php';


      $doc= $_POST['doc'];
      $nombre= $_POST['nom'];
      $f_naci= $_POST['f_naci'];
      $sede = $_POST['sede'];

 try{   
   
    $consulta="INSERT INTO usuarios (doc, nombre, f_nacimiento, id_sede) VALUES "
            . "(:doc, :nom, :f, :sede)";
    
    $resultado=$conexion->prepare($consulta);   
        
    $resultado->execute(array(":doc"=>$doc, ":nom"=>$nombre, ":f"=>$f_naci, ":sede"=>$sede));    
  

                     echo "<div class='container'>"; 
                     echo "<div class='row'>"; 
                    
                     echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                     echo "Ingreso Con Exito";
                     echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                    
                     echo "</div>";
                     echo "</div>";
                     echo "</div>";
   
                     header("Location: ../index.php");   
    $resultado->closeCursor();
 }catch (Exception $ex) {
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>ERROR</title>
</head>

   <body>
       <div class="container">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
         <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <h1 class="h2">Error del registro</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
            <?php
             
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'> ";
                echo "Error";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                echo "</div>";
           
            } 
           
            ?> 
           <a href="../index.php" class="btn btn-success">Volver</a>
           
       </div>
       <script src="../js/bootstrap.min.js" type="text/javascript"></script>
       
   </body>
</html>