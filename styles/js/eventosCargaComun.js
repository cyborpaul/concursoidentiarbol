$('window').ready(cargaComun);


function cargaComun()
{
	$(function () {
	  $('[data-toggle="popover"]').popover()
	})

	$('[data-toggle="popover"]').focus(function(){$(this).popover('hide')})
	$('input').focus(function(){$(this).removeClass('is-invalid')})
}