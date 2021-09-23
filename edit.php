<?php
    session_start();
    $idUsuario=$_SESSION['Id'];
    $codigoarbol=$_GET['codarbol'];
    /* echo $id; */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bienvenido</title>

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
            <h3 class="card-title">Editar especie para el concurso de árbol emblemático</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <form action="" method="POST">
          <?php if (isset($_POST['editar'])) {
                          require 'connect_db.php';	
                           $comun=$_POST['nombrecomun'];//Primera            
                           $_SESSION['seleccion'] = $_REQUEST['nombrecientifico'];//Segundo
                           $genero=$_SESSION['seleccion'];           
        
                           $_SESSION['seleccion2'] = $_REQUEST['departamento'];
                           $departamento=$_SESSION['seleccion2'];
                           $_SESSION['seleccion3'] = $_REQUEST['Provincia'];
                           $provincia=$_SESSION['seleccion3'];
                           $_SESSION['seleccion4'] = $_REQUEST['DISTRITO'];
                           $distrito=$_SESSION['seleccion4'];        
    
                           $coordenadax= $_POST['coordenadax'];
                           $coordenaday=$_POST['coordenaday'];    
                           $alturatotal=$_POST['alturatotal'];
                           $alturacomercial=$_POST['alturacomercial'];
                           $dpa=$_POST['dpa'];
                           $caracteristicas=$_POST['caracteristicasfisicas'];
                           $usoprincipal=$_POST['usoprincipal'];
                           $zonahoraria="-5";
                           $formato="Y-m-d H:i:s a";
                           $time=gmdate($formato, time()+($zonahoraria*3600));       
        
                          $consulta= 'SELECT * FROM taxonomia where ID_taxonomia='.$genero;
                          $ressql=mysqli_query($mysqli,$consulta);
                          while ($row=mysqli_fetch_row ($ressql)){
                          
                          $nombrecientifico=$row[6];//
                          }//Esto ya no puede seguir más de una vez con una determinada postura de la clave de datos        

                          $resultado = mysqli_query($mysqli,"UPDATE lista SET ID_taxonomia='$genero',NOMBRE_COMUN='$comun',NOMBRE_CIENTIFICO='$nombrecientifico',COORDENADA_X = '$coordenadax',COORDENADA_Y='$coordenaday',DEPARTAMENTO='$departamento',PROVINCIA='$provincia',DISTRITO='$distrito', ALTURA_TOTAL='$alturatotal', ALTURA_COMERCIAL='$alturacomercial', DIAMETRO_COPA='$dpa', CARACTERISTICAS='$caracteristicas', USO_PRINCIPAL='$usoprincipal', hora='$time' WHERE ID='$codigoarbol'");
                          if($resultado==true){
                            echo '<div class="alert" style="background-color:#90EE90;" role="alert">Árbol actualizado correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button></div>';
                                
                          }else{
                            echo 'Hubo problemas en la actualización';
                          }        
                        }     
                      ?>
          <!-- /.card-header -->
          <?php
                        $id = $codigoarbol;
                        require 'connect_db.php';	
                        $query = "SELECT * FROM lista WHERE ID = '$id'";
                        $resul = mysqli_query($mysqli, $query);
                        $datos = mysqli_fetch_row($resul); 
                    
                        $query6 = "SELECT * FROM taxonomia WHERE Nombre_Cientifico ='$datos[3]'";
                        $resul6 = mysqli_query($mysqli, $query6);
                        $datos6 = mysqli_fetch_row($resul6); 

                        $idpla=$datos[0];
                        //echo $idpla;
                    ?>
          <div class="card-body" style="display: block;">
          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre común: </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="inputEmail3" name="nombrecomun" value="<?php echo $datos['2'];?>">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword3" class="col-sm-3 col-form-label">Nombre científico: </label>
              <div class="col-sm-8">
              <select class="form-control" name="nombrecientifico" id="">
				                        <option value="<?php echo $datos6['0'];?>" selected><?php echo $datos['3'];?> </option>
				                        <?php
          		                        $query = $mysqli -> query ("SELECT * FROM taxonomia ORDER BY Nombre_Cientifico ASC");
          		                        while ($valores = mysqli_fetch_array($query)) {
            	                        echo '<option value="'.$valores['ID_taxonomia'].'">'.$valores['Nombre_Cientifico'].'</option>';
				                          }
				  //Muestra todos los nombres que aprecen en la tabla lista de acuerdo a sus ID que en este caso servirá para vincularla imagen con su respectiva información
                                ?></select>
              </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Coordenada X: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="coordenadax" id="inputPassword3" placeholder="Ejemplo: -3.4451122154" value="<?php echo $datos['4'];?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Coordenada Y: </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="coordenaday" id="inputPassword3" placeholder="Ejemplo: -73.121517874" value="<?php echo $datos['5'];?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Departamento: </label>
                <div class="col-sm-8">
                <select  Class="form-control" name="departamento" id="continente_id" required>
                  <?php
                    require 'connect_db.php';	
                    $query7 = 'SELECT DEPARTAMENTO FROM lista WHERE ID='.$codigoarbol;
                    $resul7 = mysqli_query($mysqli, $query7);
                    $datos7 = mysqli_fetch_row($resul7); 
                  ?>
                               <option value="<?php echo $datos7['0'];?>" selected><?php echo $datos7['0'];?> </option>
                    
                               </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Provincia: </label>
                <div class="col-sm-8">
                <select  Class="form-control" name="Provincia" id="pais_id" required>
                <?php
                    require 'connect_db.php';	
                    $query8 = 'SELECT PROVINCIA FROM lista WHERE ID='.$codigoarbol;
                    $resul8 = mysqli_query($mysqli, $query8);
                    $datos8 = mysqli_fetch_row($resul8); 
                  ?>
                    <option value="<?php echo $datos8['0'];?>" selected><?php echo $datos8['0'];?> </option>                                          
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Distrito: </label>
                <div class="col-sm-8">
                <select  Class="form-control" name="DISTRITO" id="ciudad_id" required>
                <?php
                    require 'connect_db.php';	
                    $query9 = 'SELECT DISTRITO FROM lista WHERE ID='.$codigoarbol;
                    $resul9 = mysqli_query($mysqli, $query9);
                    $datos9 = mysqli_fetch_row($resul9); 
                  ?>
                    <option value="<?php echo $datos9['0'];?>" selected><?php echo $datos9['0'];?> </option> 
                    <option value="01-Iquitos">Iquitos</option>
                    <option value="08-Punchana">Punchana</option>
                    <option value="10-Belen">Belen</option>
                    <option value="11-San Juan Bautista">San Juan Bautista</option>                                         
                </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Altura total: </label>
                <div class="col-sm-8">
                  <input type="text" name="alturatotal" class="form-control" id="inputPassword3" placeholder="Altura total en metros ..." value="<?php echo $datos['18'];?>">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Altura comercial: </label>
                <div class="col-sm-8">
                  <input type="text" name="alturacomercial" class="form-control" id="inputPassword3" placeholder="Altura comercial en metros ..."  value="<?php echo $datos['19'];?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Diametro de la copa: </label>
                <div class="col-sm-8">
                  <input type="text" name="dpa" class="form-control" id="inputPassword3" placeholder="Diametro de la copa ..."  value="<?php echo $datos['20'];?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3"  class="col-sm-3 col-form-label">Características físicas relevantes: </label>
                <div class="col-sm-8">
                  <input type="text" name="caracteristicasfisicas" class="form-control" id="inputPassword3" placeholder="Características ..."  value="<?php echo $datos['21'];?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Uso principal: </label>
                <div class="col-sm-8">
                  <input type="text" name="usoprincipal" class="form-control" id="inputPassword3" placeholder="Uso principal ..."  value="<?php echo $datos['22'];?>">
                </div>
              </div>



          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="editar" class="btn btn-info">Registrar</button>
            </form> 
            <button type="submit" class="btn btn-default float-right">Cancelar</button>
          </div>
          <!-- /.card-footer -->
        <!-- /.card -->


        <!-- DROPZONE -->        
        <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Subir imágen representativa: </label>
              </div>
              <div id="actions" class="row">
                  <div class="col-lg-6">
                    <div class="btn-group w-100">
                      <span class="btn btn-success col fileinput-button">
                        <i class="fas fa-plus"></i>
                        <span>Agregar imágen</span>
                      </span>
                      <button type="submit" class="btn btn-primary col start">
                        <i class="fas fa-upload"></i>
                        <span>Comenzar con la subida</span>
                      </button>
                      <button type="reset" class="btn btn-warning col cancel">
                        <i class="fas fa-times-circle"></i>
                        <span>Cancelar subida</span>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center">
                    <div class="fileupload-process w-100">
                      <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="table table-striped files" id="previews">
                  <div id="template" class="row mt-2">
                    <div class="col-auto">
                        <span class="preview"><img src="data:," alt="" data-dz-thumbnail /></span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <p class="mb-0">
                          <span class="lead" data-dz-name></span>
                          (<span data-dz-size></span>)
                        </p>
                        <strong class="error text-danger" data-dz-errormessage></strong>
                    </div>
                    <div class="col-4 d-flex align-items-center">
                        <div class="progress progress-striped active w-100" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                          <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                        </div>
                    </div>
                    <div class="col-auto d-flex align-items-center">
                    <div class="form-group row">
                      <div class="col-sm-8">
                      <select class="form-control " id="parteplanta" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                        <option selected="selected" data-select2-id="3">Seleccionar parte planta</option>
                        <option data-select2-id="35">Completo</option>
                        <option data-select2-id="36">Hoja</option>
                        <option data-select2-id="37">Tronco</option>
                        <option data-select2-id="38">Raiz</option>
                        <option data-select2-id="39">Fruto</option>
                        <option data-select2-id="40">Tallo</option>
                      </select>
                      </div>
                    </div>

                      <div class="btn-group">
                        <button class="btn btn-primary start">
                          <i class="fas fa-upload"></i>
                          <span>Comenzar</span>
                        </button>
                        <button data-dz-remove class="btn btn-warning cancel">
                          <i class="fas fa-times-circle"></i>
                          <span>Cancelar</span>
                        </button>
                        <button data-dz-remove class="btn btn-danger delete">
                          <i class="fas fa-trash"></i>
                          <span>Borrar</span>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- DROPZONE -->

            <div class="row">
                <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h4 class="card-title">Ekko Lightbox</h4>
              </div>
              <div class="card-body">
                <div class="row">
                <?php
                require 'connect_db.php';
               $result=$mysqli->query("SELECT ID, ID_taxonomia, NOMBRE_COMUN, nombre, urlexterior, IDPlanta, Parte_Planta, Id_imagen FROM lista l INNER JOIN imagen im ON l.ID= im.IDPlanta where IDPlanta='$codigoarbol'  ORDER BY Fecha desc");
               $result = $result->fetch_all(MYSQLI_ASSOC);
               $ruta='https://www.identiarbol.org/concurso/uploads/';
               $contador = 1;
                foreach ($result as $row) { 
                    $planta=$row['IDPlanta'];
                    $nombre = $row['nombre'];
                    $url= $row['urlexterior'];
                   
                    ?>
                    <div class="col-sm-2">
                      <a href="<?php echo $ruta.$nombre;?>" data-toggle="lightbox" data-title="sample <?php echo $contador;?> - white" data-gallery="gallery">
                        <img src="<?php echo $ruta.$nombre;?>" class="img-fluid mb-2" alt="white sample"/>
                      </a>
                    </div>                    
                    <?php
                    //echo $contador;
                    $contador++;
                }
                ?>


                </div>
              </div>
            </div>
          </div>
                </div>
        
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
<script type="text/javascript">
	$(document).ready(function(){
		$("#continente_id").change(function(){
			$.get("Paises.php","continente_id="+$("#continente_id").val(), function(data){
        $("#pais_id").html(data);
        console.log(data);
			});
		});  

		$("#pais_id").change(function(){
      $.get("Ciudades.php","pais_id="+$("#pais_id").val()+"&"+"continente_id="+$("#continente_id").val(), function(data){
				$("#ciudad_id").html(data);
				console.log(data);
			});
    });
    
	});
</script>
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
    url: "upload.php?codarbol=<?php echo $codigoarbol;?>&ID=<?php echo  $idUsuario;?>", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    MaxFileSize:209715200,
    acceptedFiles: 'image/*',
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button",// Define the element that should be used as click trigger to select files.
    dictResponseError: 'Error while uploading file!',
    timeout: 18000000
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
