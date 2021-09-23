function modalResultVar(modalObject)
{
	setTimeout(function() {
	$("#modalProcess").modal('hide')
	setTimeout(function(){
				if(modalObject)
					modalObject.modal('show')
			}, 150)} ,1000)
}