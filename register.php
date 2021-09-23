<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registro de participante</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>IDENTI</b>ARBOL</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Crear una cuenta para el concurso</p>
      <div class="input-group mb-3">
          <select class="form-control" type="text" id="mayor" name="edad">
            <option value=" ">Verificación de edad</option>
            <option value="1">Soy mayor de edad</option>
            <option value="2">No soy mayor de edad</option>                   
        </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

      

                      

      <div class="input-group mb-6">
          <input type="text" class="form-control" id="dni" placeholder="DNI" style="display:none;">
          <div class="input-group-append" id="divv" style="display:none;">
            <div class="input-group-text">
              <span class="fas fa-user" id="icono" style="display:none;"></span>
            </div>
          </div>
          <button class="form-control" id="button" onclick="consultar()" style="display:none;">Validar</button>
        </div>
        <form  method="post">
        <?php
        if(isset($_POST['crear'])){
      require("userregistro.php");
            }
        ?>

        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nombres" name="realname" placeholder="Nombres" value="" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="" disabled>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <input type="text" class="form-control" id="doc" name="dni" placeholder="Apellidos" value="" style="display:none;">

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="nick" placeholder="Email" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" name="direccion" placeholder="Dirección completa" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <select class="form-control" type="text" name="sexo">
            <option value="0">Seleccione su sexo</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>  
            <option value="Prefiero no decirlo">Prefiero no decirlo</option>                  
        </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" id="" placeholder="Institución Educativa" name="instituto" class="form-control"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" id="name" placeholder="Edad" name="edad" class="form-control"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" id="name" placeholder="Teléfono" name="telefono" class="form-control"/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="rpass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="form-check">
                          <input class="form-check-input" type="radio" name="radio1" required>
                          <label class="form-check-label">Nota: Se declara con la verdad haber proporcionado los datos respectivos en este sitio web.</label>
                        </div>

        
        <div class="row">
          <button type="submit" name="crear" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
 
        </div>
      </form>

      <a href="login.php" class="text-center">Ya tengo una cuenta - Inicia sesión</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<script type='text/javascript'>
                function consultar() {
                    var documento = 'DNI';
                    var usuario = '10447915125';
                    var password = '985511933';                    
                    var nro_documento = $("#dni").val();
                    $.ajax({
                        type: 'GET',
                        dataType: "json",
                        url: 'consumir2.php',
                        data: {documento: documento, usuario: usuario, password: password, nro_documento: nro_documento}
                    })
                            .done(function (data) {
                                //console.log(data.result);
                                $("#doc").val(data.dni);
                                var apellidos=data.apellidoPaterno+" "+data.apellidoMaterno;                                
                                $("#nombres").val(data.nombres);
                                $("#apellidos").val(apellidos);
                                $("#dni").val(nro_documento);
                                console.log(data);
                            })
                            .fail(function (data) {
                                console.log(data);
                            });
                }

                $("#mayor").change(function(){
                 
                  if(this.value == 2){ 
                   
                    $("#nombres").attr("disabled", false);
                    $("#apellidos").attr("disabled", false);
                    $("#dni").attr('style', ' ');
                    $("#button").attr('style', 'display:none;');
                    $("#divv").attr('style', ' ');
                  }else{
                 
                    $("#nombres").attr("disabled", true);
                    $("#apellidos").attr("disabled", true);
                    $("#dni").attr('style', ' ');
                    $("#button").attr('style', ' ');
                    $("#icono").attr('style', ' ');
                    $("#divv").attr('style', ' ');
                  }
                })

                $("#dni").change(function(){
                  var nro_documento = $("#dni").val();
                  $("#doc").val(nro_documento);

                })


            </script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->

</body>
</html>

