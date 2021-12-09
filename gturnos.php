<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        
     <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    </head>
    <body>
        <?php
        // put your code here
        ?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="">Turnos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Generar Turno</a>
        </li>
      </ul> 
    </div>
  </div>
</nav>
<?php
include ('config/conexion.php');
   
$registro=$conexion->query("SELECT usu_turnos_mod.id, usuarios.nombre, modulos.SIGLA, id_turno
FROM usu_turnos_mod
INNER JOIN usuarios ON usuarios.doc = usu_turnos_mod.id_usuario
INNER JOIN modulos ON modulos.id = usu_turnos_mod.id_modulo
ORDER BY ID DESC LIMIT 1")->fetchAll(PDO::FETCH_OBJ);

?>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1>Generar Turno</h1>
    <p class="lead">Genera tu turno ingresando el Documento</p>
    
    <form action="insert/insertarTurno.php" method="POST">
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Número de identificación</label>
          <input type="number" name="doc" class="form-control" id="exampleInputEmail1" aria-describedby="">
          <div id="" class="form-text">Ingresa solo números.</div>
        </div>
        
    
        <button type="submit" class="btn btn-success">Turno</button>
        
    </form>
    <br>
    
    <?php 
              foreach ($registro as $data):
    ?>

                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                      </symbol>
                      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                      </symbol>
                      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                      </symbol>
                    </svg>

                    <div class="alert alert-success d-flex align-items-center" role="alert">
                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                      <div>
                        <?php echo $data->SIGLA . $data->id_turno?>
                      </div>
                    </div>
                    
            <?php endforeach; ?>
  </div>
</main>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
    
</html>
