<?php

    try{  
        
    include '../config/conexion.php';

    date_default_timezone_set('America/Bogota');

      
      //$doc= 1096187206;
        
      $doc= $_POST['doc'];  
      $modulo = 0;
      
      $hoy = date("Y-m-d");
      
     // echo "FECHA: " . $hoy;

      //consulto la edad del usuario y asigno el modulo 
      $edadSql = 'SELECT TIMESTAMPDIFF(YEAR,f_nacimiento,CURDATE()) AS edad FROM usuarios WHERE doc = ' . $doc;

         foreach ($conexion->query($edadSql) as $row) {
             
             //echo '<br>edad:' . $row['edad'];
             
             if ($row['edad'] >= 62)
             {
                $modulo = 2;    
             }else{
                $modulo = 1;
             }
                   
         }//Cierre foreach
         
          
         
        if ($modulo == 1){
             
             //consulto por medio de la fecha actual el ultimo turno general  
             $ultimoValorG = "SELECT MAX(turnoG) AS ULTIMOG FROM turno WHERE fecha_actual = '$hoy'";
             
            // echo "<br>".$ultimoValorG;
             
             foreach ($conexion->query($ultimoValorG) as $row) {
                 
                 if (empty($row['ULTIMOG'])){
                     //Si la fecha llega vacia reinicio el contador a 1 de general
                     $resultado = 1;
                     
                 } else {
                     
                     $ultimoG = $row['ULTIMOG']; 
                 }
                  
             }
             
             $resultado = $ultimoG + 1;
             
            //echo '<br>ultimo valor'. $ultimoG;
             
             $insertarSql = "INSERT INTO turno (turnoG, fecha_actual) VALUES (" . $resultado . ", NOW())";
             
             //echo "<br>" . $insertarSql;
             
             $conexion->query($insertarSql);
             
         } else {
             
             //consulto por medio de la fecha actual el ultimo turno preferencal
             $ultimoValorP = "SELECT MAX(turnoP) AS ULTIMOP FROM turno WHERE fecha_actual = '$hoy'";
             
             foreach ($conexion->query($ultimoValorP) as $row) {
                 
                 if (empty($row['ULTIMOP'])){
                     //Si la fecha llega vacia reinicio el contador a 1 de preferencial
                     $resultado = 1;
                     
                 } else {
                    
                     $ultimoP= $row['ULTIMOP']; 
                 }
                  
             }
             
             $resultado = $ultimoP + 1;
             
             //echo '<br>ultimo valor'. $ultimoP;
             
             $insertarSql = "INSERT INTO turno (turnoP, fecha_actual) VALUES (" . $resultado . ", NOW())";
             
            // echo "<br>" . $insertarSql;
             
             $conexion->query($insertarSql);
         }
         
             
         if ($modulo == 1){
             //consulto por medio de la fecha actual el ultimo turno general
             $ultimoValorG = "SELECT MAX(turnoG) AS ULTIMOG FROM turno WHERE fecha_actual = '$hoy'";
             
             foreach ($conexion->query($ultimoValorG) as $row) {
                 
                 $ultimoG = $row['ULTIMOG']; 
             }
             
             //genero el turno con el doc el modulo= general y el ultimo valor del turno general
              $insertarSqlTurno = "INSERT INTO usu_turnos_mod (id_usuario, id_modulo, id_turno) VALUES (" . $doc . ", $modulo, $ultimoG)";
         
              $conexion->query($insertarSqlTurno);
             
         } else {
             
             //consulto por medio de la fecha actual el ultimo turno preferencial
             $ultimoValorP = "SELECT MAX(turnoP) AS ULTIMOP FROM turno WHERE fecha_actual = '$hoy'";
             
             foreach ($conexion->query($ultimoValorP) as $row) {
                 
                 $ultimoP= $row['ULTIMOP']; 
             }
              //genero el turno con el doc el modulo= preferencial y el ultimo valor del turno preferencial
              $insertarSqlTurno = "INSERT INTO usu_turnos_mod (id_usuario, id_modulo, id_turno) VALUES (" . $doc . ", $modulo, $ultimoP)";
         
              $conexion->query($insertarSqlTurno);
             
         }
          //echo '<br> Modulo: ' . $modulo;
         //devuelve a los pagina de ingresar la cedula para el turno
         header("Location: ../gturnos.php");
         
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
        <h1 class="h2">Error del registro del turno</h2>
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
           <a href="../gturnos.php" class="btn btn-success">Volver</a>
           
       </div>
       <script src="../js/bootstrap.min.js" type="text/javascript"></script>
       
   </body>
</html> 
        