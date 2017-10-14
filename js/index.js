$(document).on('ready',function(){
	$('#myModalcont').on('hidden.bs.modal',function(){
		$(".texto3").val("");
	});

	$('#inicio').submit(function(e){//iniciar sesión
		e.preventDefault();
		var pasd = $('#contrasena').val();	// obtengo los valores ingresados
		var user = $('#usuario').val();	// obtengo los valores ingresados
		buscarpersonal(pasd,user)
	})
})

function buscarpersonal(pasd,user){
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
