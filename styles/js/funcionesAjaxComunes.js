/*=============================================================
=            Carga de eventos y variables globales            =
=============================================================*/


/*=====  End of Carga de eventos y variables globales  ======*/
/*===========================================
=            Validacion de datos            =
===========================================*/

function insertarBitacora(accion, descripcion)
{
	let url = "Ajax/bitacora.Ajax.php"
	let data = {
		'accionBitacora' : accion,
		'descripcion' : descripcion,
		'Accion': 'insertarBitacora'
		}
	let type = "POST"
	let dataType = "json"

	error =  function(rpta){errorInsertarBitacora(rpta)}
	success = function(rpta){successInsertarBitacora(rpta)}
	
	/*=====  End of Declaracion de variables y metodos de envio  ======*/

	/* Enviamos los datos al archivo ajax */
	$.ajax({data,dataType, url, type, error, success})
}

/*=====  End of Validacion de datos  ======*/
/*===================================================
=            funciones de respuesta ajax            =
===================================================*/
function errorInsertarBitacora(rpta){console.log(rpta)}
function successInsertarBitacora(rpta){console.log(rpta)}

function errorConexion(rpta)
{
	setTimeout(function(){
		console.log(rpta)
		alert(rpta['responseText'])
		$('#modalOkIcon').attr('class','fas fa-exclamation-triangle fa-2x')
		$('#modalOkIcon').attr('style','color: rgb(255,200,0);')
		$('#modalOkRptaHeader').html('Error interno, notifique a los encargados del sistema. el sistema respondió que :'+rpta['responseText'])
		modalResultVar($('#modalOk'))
	},500)
}

/*=====  End of funciones de respuesta ajax  ======*/


