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
          <a class="nav-link active" aria-current="page" href="">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gturnos.php">Generar Turno</a>
        </li>
      </ul> 
    </div>
  </div>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1>Ingresar Datos</h1>
    <p class="lead">Ingresa tus datos para registrarte por unica vez</p>
    
    <form action="insert/insertarUsuarios.php" method="POST">
        
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Número de identificación</label>
          <input type="number" name="doc" class="form-control" id="exampleInputEmail1" aria-describedby="">
          <div id="" class="form-text">Ingresa solo números.</div>
        </div>
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nombre</label>
          <input type="text" name="nom" class="form-control" id="exampleInputPassword1">
          <div id="" class="form-text">Ingresa tú nombre.</div>
        </div>
        
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Fecha de Nacimiento</label>
          <input type="date" name="f_naci" class="form-control" id="exampleInputPassword1">
          <div id="" class="form-text">Ingresa tú fecha de nacimiento.</div>
        </div>
        
        <div class="mb-3"><!-- comment -->
          <label for="exampleInputPassword1" class="form-label">Selecione la Sede</label>
            <select class="form-select" id="sede" name="sede">
                <?php 
	         include ('config/conexion.php');   
                    $sql = 'SELECT id,n_sede FROM sede';
                    foreach ($conexion->query($sql) as $row) {
                        
                        echo '<option  value="'.$row['id'].'" >'.$row['n_sede'].'</option>';
                   
                    }
                    ?>
                
                
            </select>
        </div>    
        <button type="submit" class="btn btn-primary">Enviar</button>
        
    </form>
    <br>
    <a class="btn btn-lg btn-primary" href="gturnos.php" role="button">Generar Turno »</a>
  </div>
</main>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </body>
    
</html>
