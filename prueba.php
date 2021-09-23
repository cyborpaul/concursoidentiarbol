<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
    
</head>
<body>

        <div class="input-group mb-6">
          <input type="text" class="form-control" id="dni" placeholder="DNI">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <button class="form-control" onclick="consultar()">Validar</button>
        </div>
        <form  method="post">
        <?php
        if(isset($_POST['crear'])){
      require("userregistro.php");
            }
        ?>

        <div class="input-group mb-3">
          <input type="text" class="form-control" id="nombres" name="realname" placeholder="Nombres" value="" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="" >
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
        
        <div class="row">
          <button type="submit" name="crear" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
 
        </div>
      </form>

      <script type='text/javascript'>
                function consultar() {
                    var documento = 'DNI';
                    var usuario = '10447915125';
                    var password = '985511933';                    
                    var nro_documento = $("#dni").val();
                    $.ajax({
                        type: 'GET',
                        dataType: "json",
                        url: 'https://www.facturacionelectronica.us/facturacion/controller/ws_consulta_rucdni_v2.php',
                        data: {documento: documento, usuario: usuario, password: password, nro_documento: nro_documento}
                    })
                            .done(function (data) {
                                //console.log(data.result);
                                $("#doc").val(data.result.DNI);
                                var apellidos=data.result.Paterno+" "+data.result.Materno;                                
                                $("#nombres").val(data.result.Nombre);
                                $("#apellidos").val(apellidos);
                                console.log(data);
                            })
                            .fail(function (data) {
                                console.log(data);
                            });
                }


            </script>
</body>
</html>