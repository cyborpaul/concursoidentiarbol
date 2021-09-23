<?php
    session_start();
    $id=$_SESSION['Id'];
    /* echo $id; */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Widgets</title>

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
<?php require 'menu.php';?>


<div class="content-wrapper ml-1">
    <!-- Content Header (Page header) -->
  <section class="content-header">
  <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Registrar árbol en sitio </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST" action="{{route('admin.savearbolbosque')}}">
            @csrf
          <div class="card-body">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre común: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" name="nombrecomun" placeholder="Ingresar nombre común ...">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Nombre científico: </label>
              <div class="col-sm-8">
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                    <option selected="selected" data-select2-id="3">Alabama</option>
                    <option data-select2-id="35">Alaska</option>
                    <option data-select2-id="36">California</option>
                    <option data-select2-id="37">Delaware</option>
                    <option data-select2-id="38">Tennessee</option>
                    <option data-select2-id="39">Texas</option>
                    <option data-select2-id="40">Washington</option>
                  </select>
              </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Coordenada X: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Ejemplo: -3.4451122154">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Coordenada Y: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Ejemplo: -73.121517874">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Departamento: </label>
                <div class="col-sm-8">
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected="selected" data-select2-id="3">Alabama</option>
                        <option data-select2-id="35">Alaska</option>
                        <option data-select2-id="36">California</option>
                        <option data-select2-id="37">Delaware</option>
                        <option data-select2-id="38">Tennessee</option>
                        <option data-select2-id="39">Texas</option>
                        <option data-select2-id="40">Washington</option>
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Provincia: </label>
                <div class="col-sm-8">
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected="selected" data-select2-id="3">Alabama</option>
                        <option data-select2-id="35">Alaska</option>
                        <option data-select2-id="36">California</option>
                        <option data-select2-id="37">Delaware</option>
                        <option data-select2-id="38">Tennessee</option>
                        <option data-select2-id="39">Texas</option>
                        <option data-select2-id="40">Washington</option>
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Distrito: </label>
                <div class="col-sm-8">
                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected="selected" data-select2-id="3">Alabama</option>
                        <option data-select2-id="35">Alaska</option>
                        <option data-select2-id="36">California</option>
                        <option data-select2-id="37">Delaware</option>
                        <option data-select2-id="38">Tennessee</option>
                        <option data-select2-id="39">Texas</option>
                        <option data-select2-id="40">Washington</option>
                      </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Comunidad: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Ingresa la comunidad (Opcional) ...">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Calle: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" placeholder="Ingresa la calle (Opcional) ...">
                </div>
              </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Registrar</button>
            <button type="submit" class="btn btn-default float-right">Cancelar</button>
          </div>
          <!-- /.card-footer -->
        </form>
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
