/*=============================================================
=            Carga de eventos y variables globales            =
=============================================================*/

$('window').ready(cargaEventosVistaTerreno)

var GoogleMap
var objParcela = {}
var formCoordenadas
var idParcelaActual

function cargaEventosVistaTerreno()
{
	GoogleMap = cargarMapaGoogle(-3.74912, -73.25383)
	formCoordenadas = $('#formCoordenadas')

	if(privilegio != "Administrador")
		$('#divGestionarParcela').hide()

	$('#btnGuardarParcela').addClass('disabled')
	$('#btnAddCoordinate').click(function(){addCoordinate(formCoordenadas)})
	$('#btnRemCoordinate').click(function(){remCoordinate(formCoordenadas)})
	$('#btnDibujarParcela').click(function(event){getFormCoordinates(GoogleMap, formCoordenadas)})
	$('#btnCancelar').click(function(event){
		recargarParcelas()
		$('#btnDibujarParcela').click(function(event){getFormCoordinates(GoogleMap, formCoordenadas)})
		$('#btnGuardarParcela').unbind().addClass('disabled')
		$('#spanIdParcela').html("Nuevo Polígono")
		idParcelaActual = 0
	})

	getParcelas()
}

function addCoordinate(form)
{
	let totalCords = form.children().length
	totalCords++
	form.append('<div id="formCoordenada'+totalCords+'" class="mb-3 mx-3">\
						Coordenada Nº'+totalCords+'\
		        		<div class="input-group">\
	    					<div class="input-group-prepend">\
			  		  			<label class="input-group-text"> Latitud </label>\
							</div>\
							<input type="text" name="Lat'+totalCords+'" class="form-control">\
	    				</div>\
	    				<div class="input-group">\
	    					<div class="input-group-prepend">\
			  		  			<label class="input-group-text"> Longitud </label>\
							</div>\
							<input type="text" name="Long'+totalCords+'" class="form-control">\
	    				</div>\
		        	</div>')

}

function remCoordinate(form)
{
	let totalCords = form.children().length
	if(totalCords > 3)
		form.find("#formCoordenada"+totalCords).remove()
}

function dibujarParcela(mapa, puntosLimitrofes, id, color = '#BBD8E9', esNueva = false)
{
	polygon = mapa.drawPolygon({
	  paths: puntosLimitrofes, // pre-defined polygon shape
	  strokeColor: color,
	  strokeOpacity: 1,
	  strokeWeight: 3,
	  fillColor: color,
	  fillOpacity: 0.6,
	  id : id,
	  click: function(event){
	  	if(!esNueva)
	  	{
	  		let idParcela = this.id
	  		let polygonObj = this
	  		if(privilegio == "Administrador")
	  		{
	  			$('#modalGestionarParcela').modal('show')
				$('#btnMostrarReporte').unbind().click(function(){modalMostrarReporte(idParcela)})
				$('#btnEditarParcela').unbind().click(function(){modalEditarParcela(polygonObj, puntosLimitrofes)})
				$('#btnEliminarParcela').unbind().click(function(){modalEliminarParcela(idParcela)})
				borrarParcela()
	  		}
	  		else
	  		{
	  			location.href = ruta+"index.php?Vista=vistaInventario&idParcela="+idParcela
	  		}
	  	}
	  }
	});

	if(esNueva)
		idParcelaActual = 0

	return polygon
}

function cargarMapaGoogle(latitud, longitud)
{
	GoogleMap = new GMaps({
	  div: '#map',
	  lat: latitud,
	  lng: longitud,
      mapTypeId: 'satellite'
	});

	GoogleMap.setZoom(11)

	return GoogleMap
}

function modalMostrarReporte(id)
{
	//location.href = location.href = ruta+"index.php?Vista=vistaInventario&idParcela="+id
    alert("xdxd")
}

function borrarParcela(id = 0)
{
	let polygons = GoogleMap.polygons
	for(indexPolygon in polygons)
	{
		if(polygons[indexPolygon].id == 0){
			polygons[indexPolygon].setMap(null)
			polygons[indexPolygon].setPaths([])
		}
		else if(polygons[indexPolygon].id == id)
		{
			polygons[indexPolygon].setMap(null)
            polygons[indexPolygon].setPaths([])
		}

	}
}

function modalEditarParcela(polygonObj, puntosLimitrofes)
{
	$('#btnLimpiarParcela').unbind().addClass('disabled')
	$('#modalGestionarParcela').modal('hide').on('hidden.bs.modal', function(e){recargarParcelas(polygonObj.id); $(this).unbind()})
	$('#btnDibujarParcela').unbind().click(function(event){getFormCoordinates(GoogleMap, formCoordenadas, polygonObj)})
	$('#spanIdParcela').html("idPolígono = "+polygonObj.id)
	formCoordenadas.html("")

	idParcelaActual = polygonObj.id



	let polygons = GoogleMap.polygons



	for(indexPolygon in polygons)
	{
		if(polygons[indexPolygon].id != polygonObj.id)
			{polygons[indexPolygon].setOptions({strokeColor: "#BBD8E9", fillColor: "#BBD8E9"})}
		else
			{polygons[indexPolygon].setOptions({strokeColor: "rgb(150,255,150)", fillColor: "rgb(150,255,150)"})}
		
	}


	for(let i = 0; i < puntosLimitrofes.length; i++){
		formCoordenadas.append('<div id="formCoordenada'+(i+1)+'" class="mb-3 mx-3">\
						Coordenada Nº'+(i+1)+'\
		        		<div class="input-group">\
	    					<div class="input-group-prepend">\
			  		  			<label class="input-group-text"> Latitud </label>\
							</div>\
							<input type="text" name="Lat'+(i+1)+'" class="form-control" value='+puntosLimitrofes[i][0]+'>\
	    				</div>\
	    				<div class="input-group">\
	    					<div class="input-group-prepend">\
			  		  			<label class="input-group-text"> Longitud </label>\
							</div>\
							<input type="text" name="Long'+(i+1)+'" class="form-control" value='+puntosLimitrofes[i][1]+'>\
	    				</div>\
		        	</div>')
	}

}

function modalEliminarParcela(id)
{
	eliminarParcela(id)
}


/*=====  End of Carga de eventos y variables globales  ======*/

/*=====================================================
=            Validacion y captura de datos            =
=====================================================*/

function getFormCoordinates(GoogleMap, form, editParcelaObj = null)
{
	let puntosLimitrofes = []
	let contador = 0
	let idFormElement = 1
	let sumLat = 0
	let sumLong = 0
	let CordinateNaN = false
	let CordinateExceds = false
	form.children().each(function(index, el) {
		try
		{
			let errorArrayNaN = [0, 0, "NaN"]
			let errorArrayExceeds = [0, 0, "Exced"]

			LatElement = $(el).find("[name='Lat"+idFormElement+"']")
			LongElement = $(el).find("[name='Long"+idFormElement+"']")

			if(isNaN(LatElement.val()) || LatElement.val() == "")
				errorArrayNaN[0] = 1
			if(isNaN(LongElement.val()) || LongElement.val() == "")
				errorArrayNaN[1] = 1

			if(errorArrayNaN[0] == 1 || errorArrayNaN[1] == 1)
				throw errorArrayNaN

			Lat = parseFloat(LatElement.val())
			Long = parseFloat(LongElement.val())

			if(Math.abs(Lat) > 90)
				errorArrayExceeds[0] = 1
			if(Math.abs(Long) > 180)
				errorArrayExceeds[1] = 1

			if(errorArrayExceeds[0] == 1 || errorArrayExceeds[1] == 1)
				throw errorArrayExceeds

			sumLat += Lat
			sumLong += Long
			puntosLimitrofes[contador] = [Lat, Long]
		}
		catch(error)
		{
			if(error[2] == "NaN")
			{
				CordinateNaN = true
				if(error[0] == 1){
					LatElement.addClass("is-invalid")
				}
				if(error[1] == 1){
					LongElement.addClass("is-invalid")
				}
			}
			else if(error[2] == "Exced")
			{
				CordinateExceds == true
				if(error[0] == 1){
					LatElement.addClass("is-invalid")
				}
				if(error[1] == 1){
					LongElement.addClass("is-invalid")
				}
			}
		}
		contador++
		idFormElement++
		
	});

	if(!(CordinateNaN) && !(CordinateExceds))
	{
		let LatProm = sumLat/contador
		let LongProm = sumLong/contador

		let area = calcPolygonArea(puntosLimitrofes)

		if(area > 0)
		{
			/*
			let marker = GoogleMap.addMarker({
			  lat: LatProm,
			  lng: LongProm,
			  title: 'Punto Medio'
			});
			*/

			GoogleMap.setCenter(LatProm, LongProm)
			GoogleMap.setZoom(11)

			if(!editParcelaObj)
				recargarParcelas()

			if(editParcelaObj){
					googleArray = []
					for(element in puntosLimitrofes)
					{
						googleArray[element] = new google.maps.LatLng(puntosLimitrofes[element][0], puntosLimitrofes[element][1])
					}
					editParcelaObj.setOptions({strokeColor: "#BBD8E9", fillColor: "#BBD8E9"});
					editParcelaObj.setPaths(googleArray);
				}
			else{let polygon = dibujarParcela(GoogleMap, puntosLimitrofes, 0,'#BBD8E9', true)}

			let isDentroExterno

			if(editParcelaObj){isDentroExterno = validarCoordenadasExternas(GoogleMap, editParcelaObj)}
			else{isDentroExterno = validarCoordenadasExternas(GoogleMap, polygon)}
				
			if(isDentroExterno){
				if(editParcelaObj){editParcelaObj.setOptions({strokeColor: "red", fillColor: "red"})}
				else{polygon.setOptions({strokeColor: "red", fillColor: "red"})}
			}

			if(!editParcelaObj){
				$('#btnLimpiarParcela').removeClass('disabled').unbind().click(function(){
					borrarParcela();$('#btnGuardarParcela').unbind().addClass('disabled')
				})
			}
			

			if(!isDentroExterno)
			{
				objParcela['puntosLimitrofes'] = puntosLimitrofes
				objParcela['UbicacionLat'] = LatProm
				objParcela['UbicacionLong'] = LongProm

				if(editParcelaObj){$('#btnGuardarParcela').removeClass('disabled').unbind().click(function(event){editarParcela(editParcelaObj.id, objParcela)})}
				else{$('#btnGuardarParcela').removeClass('disabled').unbind().click(function(event){crearParcela(objParcela)})}

				

				$('#btnAddCoordinate').unbind().click(function(){addCoordinate(formCoordenadas)})
				$('#btnRemCoordinate').unbind().click(function(){remCoordinate(formCoordenadas)})
			}


			if(editParcelaObj){$('#btnDibujarParcela').unbind().click(function(event){getFormCoordinates(GoogleMap, formCoordenadas)})}
			else{$('#btnDibujarParcela').unbind().click(function(event){polygon.setMap(null), getFormCoordinates(GoogleMap, formCoordenadas)})}
			
				
		}
		else
		{
			alert("La parcela debe representar un area en especifico")
		}

	}
	else
	{
		$('#btnGuardarParcela').addClass('disabled').unbind()
		objParcela['puntosLimitrofes'] = null
		objParcela['UbicacionLat'] = null
		objParcela['UbicacionLong'] = null
	}
}

function recargarParcelas(idParcelaNoBorrar = null)
{
	let polygons = GoogleMap.polygons
	for(indexPolygon in polygons)
	{
		if(polygons[indexPolygon].id != idParcelaNoBorrar)
			polygons[indexPolygon].setMap(null)
	}

	getParcelas()
}

/*
function validarCoordenadasInternas(map, coordenadas)
{
	
	let polygons = map.polygons
	let dentro = false
	for(indexParcela in polygons)
	{
		let polygon = polygons[indexParcela]
		for(cord in coordenadas)
		{	
			dentro = map.checkGeofence(coordenadas[cord][0], coordenadas[cord][1], polygon)
			console.log(dentro)
			if(dentro)
				break
		}
	}
	return true
}
*/

function validarCoordenadasExternas(map, newPolygon)
{
	let googleMapsPolygon = map.polygons
	let dentro = false
	let idNewPolygon = newPolygon.id
	let wicket = new Wkt.Wkt();
	wicket.fromObject(newPolygon);
	let wkt1 = wicket.write();

	for(indexPolygon in googleMapsPolygon)
	{

		console.log(googleMapsPolygon[indexPolygon].id)
		console.log("and")
		console.log(newPolygon.id)
		
		let idPolygon = googleMapsPolygon[indexPolygon].id

		if(idPolygon != idNewPolygon)
		{
			wicket.fromObject(googleMapsPolygon[indexPolygon]);
		    let wkt2 = wicket.write();
		    
		    let wktReader = new jsts.io.WKTReader();
		    let geom1 = wktReader.read(wkt1);
		    let geom2 = wktReader.read(wkt2);
	    	try
	    	{
		    	if (geom2.intersects(geom1)){
		    		let AreaInterseccion = geom2.intersection(geom1).getArea()
		    		if(AreaInterseccion > 0)
		    			dentro = true
	    		}
		    }
		    catch(error){}
		}
		
	    
	}

	return dentro
}

function calcPolygonArea(vertices) {
    let total = 0;

    for (let i = 0, l = vertices.length; i < l; i++) {
      let addX = vertices[i][0];
      let addY = vertices[i == vertices.length - 1 ? 0 : i + 1][1];
      let subX = vertices[i == vertices.length - 1 ? 0 : i + 1][0];
      let subY = vertices[i][1];

      total += (addX * addY * 0.5);
      total -= (subX * subY * 0.5);
    }

    return Math.abs(total);
}

/*=====  End of Validacion y captura de datos  ======*/

/*======================================
=            Funciones AJAX            =
======================================*/

function eliminarParcela(idParcela)
{
	let url = DIR_AJAX+"parcela.Ajax.php"
	let data = {
		'idParcela' : idParcela,
		'Accion': 'eliminarParcela'
		}

	let type = "POST"
	let dataType = "json"

	error = function(rpta){errorConexion(rpta)}
	beforeSend = function(rpta){beforeSendEliminarParcela()}
	success = function(rpta){successEliminarParcela(rpta)}
	
	/*=====  End of Declaracion de variables y metodos de envio  ======*/

	/* Enviamos los datos al archivo ajax */
	$.ajax({data,dataType, url, type, error, success, beforeSend})
	$('#btnGuardarParcela').unbind().addClass('disabled')
}

function editarParcela(idParcelaObj, parcelaObj)
{
	console.log(parcelaObj)
	let url = DIR_AJAX+"parcela.Ajax.php"
	let data = {
		'idParcela' : idParcelaObj,
		'LongCentro' : parcelaObj['UbicacionLong'],
		'LatCentro' : parcelaObj['UbicacionLat'],
		'Limites' : parcelaObj['puntosLimitrofes'],
		'Accion': 'editarParcela'
		}

	let type = "POST"
	let dataType = "json"

	error = function(rpta){errorConexion(rpta)}
	beforeSend = function(rpta){beforeSendEditarParcela()}
	success = function(rpta){successEditarParcela(rpta)}
	
	/*=====  End of Declaracion de variables y metodos de envio  ======*/

	/* Enviamos los datos al archivo ajax */
	$.ajax({data,dataType, url, type, error, success, beforeSend})
	$('#btnGuardarParcela').unbind().addClass('disabled')
}

function crearParcela(parcelaObj)
{
	let url = DIR_AJAX+"parcela.Ajax.php"
	let data = {
		'LongCentro' : parcelaObj['UbicacionLong'],
		'LatCentro' : parcelaObj['UbicacionLat'],
		'Limites' : parcelaObj['puntosLimitrofes'],
		'Accion': 'crearParcela'
		}

	let type = "POST"
	let dataType = "json"

	error = function(rpta){errorConexion(rpta)}
	beforeSend = function(rpta){beforeSendCrearParcela()}
	success = function(rpta){successCrearParcela(rpta)}
	
	/*=====  End of Declaracion de variables y metodos de envio  ======*/

	/* Enviamos los datos al archivo ajax */
	$.ajax({data,dataType, url, type, error, success, beforeSend})
}

function getParcelas()
{
	let url = DIR_AJAX+"parcela.Ajax.php"
	let data = {
		'Accion': 'getParcelasGoogleEarth'
		}

	let type = "POST"
	let dataType = "json"

	error = function(rpta){errorConexion(rpta)}
	beforeSend = function(rpta){beforeSendGetParcela()}
	success = function(rpta){successGetParcela(rpta)}
	
	/*=====  End of Declaracion de variables y metodos de envio  ======*/

	/* Enviamos los datos al archivo ajax */
	$.ajax({data,dataType, url, type, error, success, beforeSend})
}

/*=====  End of Funciones AJAX  ======*/

/*===================================================
=            Funciones de respuesta AJAX            =
===================================================*/

function beforeSendCrearParcela()
{
	$('#modalIngresar').modal('hide');
	setTimeout(function(){
		$('#modalProcess').modal('show');
	},450)
}

function successCrearParcela(rpta)
{
    console.log(rpta)
	setTimeout(function(){
		recargarParcelas()
		$('#btnDibujarParcela').click(function(event){getFormCoordinates(GoogleMap, formCoordenadas)})
		$('#btnGuardarParcela').unbind().addClass('disabled')
		$('#spanIdParcela').html("Nueva Parcela")
		idParcelaActual = 0

	},450)
	modalResultVar($(null))
}

function beforeSendGetParcela()
{
	/*
	$('#modalIngresar').modal('hide');
	setTimeout(function(){
		$('#modalProcess').modal('show');
	},450)*/
}

function successGetParcela(rpta)
{
	console.log(rpta)
	if(Object.keys(rpta).length > 0)
	{
		for(indexParcela in rpta)
		{
			let Parsela = rpta[indexParcela]
			let contador = 0
			let idParcela
			let Limites = []
			for(Limite in Parsela)
			{
				Limites[contador] = [Parsela[Limite]['CoordenadasX'],Parsela[Limite]['CoordenadasY']]
				idParcela = Parsela[Limite]['IdPoligono']
				contador++
			}
			if(idParcela != idParcelaActual)
				dibujarParcela(GoogleMap, Limites, idParcela)
		}
	}
	modalResultVar($(null))
}

function beforeSendEditarParcela()
{
	$('#modalIngresar').modal('hide');
	setTimeout(function(){
		$('#modalProcess').modal('show');
	},500)
}

function successEditarParcela(rpta)
{
	$('#spanIdParcela').html("Nueva Parcela")
	if(rpta['editarParcela'] == 1)
	{
		$('#modalOkIcon').attr('class','fas fa-check fa-2x')
		$('#modalOkIcon').attr('style','color: green;')
		$('#modalOkRptaHeader').html('La parcela con el id '+rpta['idParcela']+' fue cambiada en la base de datos.')
	}
	else
	{	
		$('#modalOkIcon').attr('class','fas fa-exclamation-triangle fa-2x')
		$('#modalOkIcon').attr('style','color: rgb(255,200,0);')
		$('#modalOkRptaHeader').html('No se logró editar la parcela con el id '+rpta['idParcela']+' en la base de datos.')
			
	}
	modalResultVar($('#modalOk'))
}

function beforeSendEliminarParcela()
{
	$('#modalIngresar').modal('hide');
	setTimeout(function(){
		$('#modalProcess').modal('show');
	},500)
}

function successEliminarParcela(rpta)
{
	console.log(rpta)
	if(rpta['success'] == 1)
	{
		$('#modalOkIcon').attr('class','fas fa-check fa-2x')
		$('#modalOkIcon').attr('style','color: green;')
		$('#modalOkRptaHeader').html('La parcela con el id '+rpta['idParcela']+' fue eliminada en la base de datos.')
		//alert(rpta['idParcela'])
		borrarParcela(parseInt(rpta['IdPoligono']))
        location.reload()
	}
	else
	{	
		$('#modalOkIcon').attr('class','fas fa-exclamation-triangle fa-2x')
		$('#modalOkIcon').attr('style','color: rgb(255,200,0);')
		$('#modalOkRptaHeader').html('No se logró eliminar la parcela con el id '+rpta['idParcela']+' en la base de datos.')
			
	}

	$('#btnDibujarParcela').click(function(event){getFormCoordinates(GoogleMap, formCoordenadas)})
	$('#btnGuardarParcela').unbind().addClass('disabled')
	$('#spanIdParcela').html("Nuevo Polígono")
	idParcelaActual = 0

	modalResultVar($('#modalOk'))

}

/*=====  End of Funciones de respuesta AJAX  ======*/


