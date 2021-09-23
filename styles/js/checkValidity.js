
function checkValidity(inputObject, Sentence)
{
	let validity
	if(Sentence)
	{
		inputObject.addClass('is-invalid')
		inputObject.popover('show')
		validity = false
	}
	else
	{
		inputObject.removeClass('is-invalid')
		validity = true
	}
	return validity
}