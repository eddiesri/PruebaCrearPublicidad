$(document).on('ready',function(){

	$('#ingresa').submit(function(e){

		e.preventDefault();

		var firstname= $('#firstname').val() ;
		var lastname= $('#lastname').val() ;
		var user= $('#user').val() ;
		var code= $('#code').val() ;
		var pass= $('#pass').val() ;
		var rpass= $('#rpass').val() ;
		if(pass == rpass ){

			var real = confirm("Desea finalizar el registro de sus datos en la plataforma?");

			if(real == true){

				$.ajax({

					url: 'registro_actualiza.php',
					type: 'POST',
					async: false,
					data: {
						registrar: 1, // bandera añadir producto
						firstname:firstname,
						lastname:lastname,
						user:user,
                        pass:pass,
                        code:code
	
					},

					success:function(result){
                            if (result == 'ya'){
                                alert("El usuario ya se encuentra registrado");
                            }else{
                                alert("¡Registro Realizado con exito! Inicie sesión para continuar");
                                window.location="../index.php"; 
                            }


		

					}

				})

			}

		}else{

			alert("La contraseña de confirmacion debe ser igual a la contraseña digitada");

		}

	})

})