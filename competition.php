<?php
session_start();
$nombre=$_SESSION['usuario'];
$identificador=$_SESSION['Id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Elegir concurso</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<style>
    .main-header.navbar.navbar-expand.navbar-light.navbar-white {
    margin-left: 0px;
}
</style>
<body>



<div class="content-wrapper ml-1 p-5">
    <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="card card-success">
          <div class="card-header">
                <h3 class="card-title">Hola, <?php echo $nombre;?> aquí podrás elegir el concurso que más se ajuste a tu perfil</h3>
                <!-- /.card-tools -->
          </div>
          <div class="card-body">
            <div class="row justify-content-center">        

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="img/imagen1.png" alt="Dist Photo 3">
                  <div class="card-img-overlay">
                    <h5 class="card-title text-primary">Premio al Árbol Emblemático de Iquitos</h5>
                    <p class="card-text pb-1 pt-1 text-white">
                    El  registro  tendrá  que  ser  subido  en  la  página  web  de  www.identiarbol.org  , teniendo en consideración el nombre común, nombre científico, familia, georreferenciación (UTM), localidad, croquis de ubicación del árbol, altura total, etc.  </p>
                    <a href="chose.php?competition=1&val=<?php echo $identificador;?>" class="text-primary">Elegir</a>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                  <img class="card-img-top" src="img/imagen2.png" alt="Dist Photo 3">
                  <div class="card-img-overlay">
                    <h5 class="card-title text-primary">Concurso de “Registrador de arboles escolar”</h5>
                    <p class="card-text pb-1 pt-1 text-white">  El  participante  podrá  registrar  la  mayor  cantidad  de  árboles  posible  ubicados  en  la 
                    ciudad  de  Iquitos  (incluye  la  zona  urbanizada  de  los  distritos  de  San  Juan,  Belén, 
                    Punchana).  </p>
                    <a href="chose.php?competition=2&val=<?php echo $identificador;?>" class="text-primary">Elegir</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>

  
</div>



<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
