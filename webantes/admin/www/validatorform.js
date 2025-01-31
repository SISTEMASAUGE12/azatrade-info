$(document).ready(function() {
$('#formcompra').bootstrapValidator({
 
	 feedbackIcons: {
 
		 valid: 'glyphicon glyphicon-ok',
 
		 invalid: 'glyphicon glyphicon-remove',
 
		 validating: 'glyphicon glyphicon-refresh'
 
	 },
 
	 fields: {
 
		 nombres: {
 
			 validators: {
 
				 notEmpty: {
 
					 message: 'Nombres y apellidos es requerido'
 
				 }
 
			 }
 
		 },
		 
		 email: {
 
			 validators: {
 
				 notEmpty: {
 
					 message: 'El correo es requerido y no puede ser vacio'
 
				 },
 
				 emailAddress: {
 
					 message: 'El correo electronico no es valido'
 
				 }
 
			 }
 
		 },
 
				  celular: {
 
			 validators: {
 
				 notEmpty: {
 
					 message: 'Ingresa el numero de tu Celular'
 
				 }
 
			 }
 
		 },
		 
		 comentario: {
 
			 validators: {
 
				 notEmpty: {
 
					 message: 'Ingresa tu comentario'
 
				 }
 
			 }
 
		 },

	 }
 

});
});