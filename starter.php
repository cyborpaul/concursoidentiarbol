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
  <title>Bienvenido a Identiarbol</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="plugins/dropzone/min/dropzone.min.css">
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
  <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->


        
        
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Registro de arbol emblemático</h3>

            <div class="card-tools">
              <button class="btn btn-success btn-tool">Detalles de concurso</button>
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form action="" method="POST">
          <?php
                     if(isset($_POST['registrararbol'])){
                     require("regisarbol.php");
                    }

                   ?>
          <div class="card-body" style="display: block;">
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre común: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" name="nombrecomun" placeholder="Ingresar nombre común ...">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Nombre científico: </label>
              <div class="col-sm-8">
              <?php  require("connect_db.php");?>
		                              <select  class="form-control" name="nota" id=""  placeholder="Ingresar nombre científico" required>
				                            <option> </option>
				                            <?php
          		                            $query = $mysqli -> query ("SELECT * FROM taxonomia ORDER BY Nombre_Cientifico ASC");
          		                            while ($valores = mysqli_fetch_array($query)) {
            	                            echo '<option value="'.$valores['ID_taxonomia'].'">'.$valores['Nombre_Cientifico'].'</option>';
				                              }				  
                                ?></select>
              </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label" >Coordenada X: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="coordenadax" placeholder="Ejemplo: -3.4451122154 ... ">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Coordenada Y: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="coordenaday" placeholder="Ejemplo: -73.121517874 ... ">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Departamento: </label>
                <div class="col-sm-8">
                <select  Class="form-control" name="departamento" required>
                               <option value='16-Loreto' selected>Loreto</option>                   
                               </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Provincia: </label>
                <div class="col-sm-8">
                <select  Class="form-control" name="Provincia" required>
                    <option value="01-Maynas" selected>Maynas</option>                                         
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Distrito: </label>
                <div class="col-sm-8">
                <select  Class="form-control" name="DISTRITO" required>
                    <option>Selecciona un distrito</option>
                    <option value="01-Iquitos">Iquitos</option>
                    <option value="08-Punchana">Punchana</option>
                    <option value="10-Belen">Belen</option>
                    <option value="11-San Juan Bautista">San Juan Bautista</option>
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Altura total: <abbr title="Es la altura estimada del árbol desde la superficie hasta el ápice de la planta. (HC). Es la altura estimada que existe entre el suelo y las ramas de las copas del árbol, o también conocido como altura de fuste."><img src="img/question.png" alt="" width="30px;"></abbr></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="alturatotal" placeholder="Altura total en metros ...">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Altura comercial: <abbr title="distancia desde el suelo hasta el punto donde el tronco se cortaría para el extremo superior de la última troza en una cosecha conventional."><img src="img/question.png" alt="" width="30px;"></abbr></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="alturacomercial" placeholder="Altura comercial en metros ...">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Diámetro altura pecho (DAP): <abbr title="Se conoce como diámetro altura pecho (dap) a la altura en que se debe tomar la medida del diámetro del tronco."><img src="img/question.png" alt="" width="30px;"></abbr></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="diametrocopa" placeholder="Diametro de la copa ...">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Características físicas relevantes: <abbr title="Altura, contextura, color de la espcie que se està registrando."><img src="img/question.png" alt="" width="30px;"></abbr></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="caracteristicas" placeholder="Características ...">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Uso principal: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="inputPassword3" name="usoprincipal" placeholder="Uso principal ...">
                </div>
              </div>


          <!-- DROPZONE -->



          <!-- DROPZONE -->

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="registrararbol" class="btn btn-info">Registrar</button>
          </div>
          </form>
          <!-- /.card-footer -->
        <!-- /.card -->

        
    </section>
  </section>

  
</div>



<!-- jQuery -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
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
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {


    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "upload.php", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    acceptedFiles: 'image/*',
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>
</body>
</html>
