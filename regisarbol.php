<?php
    $id = $_SESSION['Id'];
    $comun=$_POST['nombrecomun'];   
    $_SESSION['seleccion'] = $_REQUEST['nota'];
    $genero=$_SESSION['seleccion'];
    $_SESSION['seleccion2'] = $_REQUEST['departamento'];
    $dep=$_SESSION['seleccion2'];
    list($codig,$departamento) = explode('-',$dep);
    $_SESSION['seleccion3'] = $_REQUEST['Provincia'];
    $provi=$_SESSION['seleccion3'];
    list($codi,$provincia) = explode('-',$provi);
    $_SESSION['seleccion4'] = $_REQUEST['DISTRITO'];
    $dist=$_SESSION['seleccion4'];
    list($cod,$distrito) = explode('-',$dist);    
    $lugar='11';    
    $coordenadax= $_POST['coordenadax'];
    $coordenaday=$_POST['coordenaday'];
    $ubigeo=$codig.$codi.$cod;

    $alturaTotal=$_POST['alturatotal'];
    $alturaComercial=$_POST['alturacomercial'];
    $diametroCopa=$_POST['diametrocopa'];
    $caracteristicasFisicas=$_POST['caracteristicas'];
    $usoPrincipal=$_POST['usoprincipal'];


    require("connect_db.php");
    $consulta='SELECT * FROM lista where ubigeo='.$ubigeo;
	$result = mysqli_query($mysqli, $consulta);
    $row_cnt = mysqli_num_rows($result);
    $conteo=$row_cnt+1;
    $codigoarboli=$codig.$codi.$cod.$conteo;
   
    $zonahoraria="-5";
    $formato="Y-m-d H:i:s a";
    $time=gmdate($formato, time()+($zonahoraria*3600));
    $consulta1= 'SELECT * FROM taxonomia where ID_taxonomia='.$genero;
    $ressql=mysqli_query($mysqli,$consulta1);
    while ($row=mysqli_fetch_row ($ressql)){        
        $nombrecientifico=$row[6];     
    }


    $root=mysqli_query($mysqli,"INSERT INTO lista (ID,ID_taxonomia,NOMBRE_COMUN,NOMBRE_CIENTIFICO,COORDENADA_X,COORDENADA_Y,DEPARTAMENTO,PROVINCIA,DISTRITO,ubigeo,Autor,habilitado,hora,idCuadra,ALTURA_TOTAL, ALTURA_COMERCIAL,DIAMETRO_COPA,CARACTERISTICAS,USO_PRINCIPAL) VALUES('$codigoarboli','$genero','$comun','$nombrecientifico','$coordenadax','$coordenaday','$departamento','$provincia','$distrito','$ubigeo','$id','1','$time','0','$alturaTotal','$alturaComercial','$diametroCopa','$caracteristicasFisicas','$usoPrincipal')");
    if($root==true){
       

       
        echo '<div class="alert" style="background-color:#90EE90;" role="alert">Árbol registrado correctamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button></div>';
              
        echo '<script>location.href="edit.php?codarbol='.$codigoarboli.'"</script>';
    
        
       
    }else{
        echo '<div class="alert alert-danger" role="alert">Hubo problemas al registrar, inténtelo nuevamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>';
    }
      
 ?>