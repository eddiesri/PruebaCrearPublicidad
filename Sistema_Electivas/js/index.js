$(document).on('ready',function(){


// al procesar el formulario de inicio de sesión se obtienen los valores y se invoca la funcion, buscar
	$('#inicio').submit(function(e){
		e.preventDefault();
		var pasd = $('#contrasena').val();
		var user = $('#usuario').val();	
		buscar(pasd,user)
	})
})


// se hace la solicitud ajax y se valida que exista y que esten correctos los datos
function buscar(pasd,user){
	$.ajax({
		url: 'actualiza.php',
		type: 'POST',
		async: false,
		data: {
			buscar: 1, 
			pasd:pasd,
			user:user,
		
		},
		success:function(result1){
			console.log(result1)

			if(result1 == 1){//inicio de sesión normal
				window.location="home/home.php";
			}else if(result1 == 0){//si el usuario no está registrado 
				alert("Usuario y/o clave incorrectos");
				$(".texto").val(""); // borro los valores de los campos
			}
			
		}
	})
}
