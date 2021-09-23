<?php
  session_start();
  $nombre=$_SESSION['usuario'];
  $id=$_SESSION['Id'];
  $com=$_SESSION['competition'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php 
                    if($com=="1"){
                      echo 'Mi registro de árbol emblemático';
                    }else if($com=="2"){
                      echo 'Mis registros en el concursos "Registrador de arboles escolar"';
                    }else{
                      echo 'No está en ningún concurso';
                    }
                ?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                      <th style="width: 10px">Código</th>
                      <th>Nombre común</th>
                      <th>Nombre Científico</th>
                      <th style="width: 40px">Distrito</th>
                      <th>Autor</th>
                      <th>Fecha de modificación</th>
                      <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
<?php
require 'connect_db.php'; 
$query = mysqli_query($mysqli,"SELECT * FROM lista l JOIN usuario u on l.Autor=u.Id WHERE u.competition=2 order by hora desc");

mysqli_close($mysqli);
$result = mysqli_num_rows($query);
if($result > 0){
  while ($data = mysqli_fetch_array($query)) {
?>

                    <tr>
                      <td><?php echo $data['ID']; ?></td>
                      <td><?php echo $data["NOMBRE_COMUN"]; ?></td>
                      <td><?php echo $data["NOMBRE_CIENTIFICO"]; ?></td>
                      <td><?php echo $data["DISTRITO"]; ?></td>
                      <td><?php echo $data["usuario"]; ?></td>
                      <td><?php echo $data["hora"];?></td>
                      <td>
                        <a class="link_edit" href="edit.php?codarbol=<?php echo $data["ID"]; ?>"><i class="fa fa-eye" style="color:#4B9D44;"></i></a>
		                	  
                      </td>
                    </tr>



			<?php if($data["ID"] != 0){ ?>
			
			
			<?php } ?>

			
			<?php 
				}//Fin del bucle while
			}//Fin de la condicional if
		 ?>
               </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>


</section>
</section>
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 50,
    });
  });
</script>
</body>
</html>