$(document).on('ready',function(){
	electivas();
	estudiantes();

	////////////////////////////////////////////metodos dinámicos electivas////////////////////////////////
	$('#search').click(function (e) {
		e.preventDefault();
		electivas()
	})
	$('#new').click(function (e) {
		$('#myModalElectiva').modal('show');
	})

	$('body').delegate('.editarelect','click', function(){
		var id= $(this).attr('ideditarelect'); 
		datos_electivas(id)
	});
	$('body').delegate('.inscrelect','click', function(){
		var id= $(this).attr('idinscrelect');
		gestion_inscripcion(id)
	});

	$('body').delegate('.borrarelect','click', function(){
		var id= $(this).attr('idborrarelect');
		borrar_electivas(id)
	});

	$('#myModalElectiva').on('hide.bs.modal',function(){
		$('.electcampos').val('');
	});
	$('#ingresaelectiva').submit(function(e){

		e.preventDefault();
		guarda_electivas();

	})

	$('body').delegate('.estudianteselect','click', function(){
		var id= $(this).attr('idestudianteselect'); 
		estudiantes_materias(id)
	});

	////////////////////////////////////////////metodos dinámicos Estudiantes////////////////////////////////

	$('#search_est').click(function (e) {
		e.preventDefault();
		estudiantes()
	})

	$('#new_est').click(function (e) {
		$('#myModalEstudiante').modal('show');
		
	})

	$('body').delegate('.materiasest','click', function(){
		var id= $(this).attr('idmateriasest'); 
		materias_estudiantes(id)
	});

	$('body').delegate('.editarest','click', function(){
		var id= $(this).attr('ideditarest'); 
		datos_estudiantes(id)
	});

	$('body').delegate('.borrarest','click', function(){
		var id= $(this).attr('idborrarest');
		borrar_estudiantes(id)
	});

	$('#myModalEstudiante').on('hide.bs.modal',function(){
		$('.estcampos').val('');
	});



	$('#ingresaestudiante').submit(function(e){

		e.preventDefault();
		guarda_estudiante();

	})

})

////////////////////////////////////////////funciones electivas////////////////////////////////
function electivas(){
	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			buscar_electivas: 1,
			criterio:$('#tipobusq').val(),
			valor:$('#busq').val()  
		},
		success:function(result0){
			$('#lista_electivas').html(result0);
		}	
	})
}	
function guarda_electivas(){

	$.ajax({
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			nueva_electiva: 1,
			nombre:$('#nombre').val() ,
			prof:$('#prof').val() ,
			descr:$('#descr').val(),
            cupos:$('#cupos').val(),
            id_elect:$('#id_elect').val(),

		},
		success:function(result){

            	$('#myModalElectiva').modal('hide');
               alert("¡Registro Realizado con exito! ");
               electivas()

		}
	})
}
function borrar_electivas(id){
	var real = confirm("Desea eliminar este registro?");
	if(real == true){
		$.ajax({ 
			url: 'home_actualiza.php',
			type: 'POST',
			async: false,
			data: {
				borrar_electivas: 1,
				id_elect:id  
			},
			success:function(result0){
				electivas()
				alert("Registro Eliminado");

			}	
		})
	}
}
function datos_electivas(id){
	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			datos_electiva: 1,
			id_elect:id  
		},
		success:function(result0){
			var cinfo =result0.split(";;");
			
			$('#nombre').val(cinfo[0]);	
			$('#prof').val(cinfo[1]);	
			$('#descr').val(cinfo[2]);
			$('#cupos').val(cinfo[3]);
			$('#id_elect').val(id);
			$('#myModalElectiva').modal('show');
		}	
	})
}

function gestion_inscripcion(id){
	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			gestion_inscripcion: 1,
			id_elect:id  
		},
		success:function(result0){
			 electivas()
			 if(result0 =='cupo_max'){
			 	alert("No se pueden inscribir más personas a este curso")
			 }
		}	
	})
}

function estudiantes_materias(id){
	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			buscar_estudiantes_materia: 1,
			id_elect:id   
		},
		success:function(result0){
			$('#myModalEstudiantesMateria').modal('show');
			$('#lista_estudiantes_electiva').html(result0);
		}	
	})
}

////////////////////////////////////////////funciones Estudiantes////////////////////////////////


function estudiantes(){
	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			buscar_estudiante: 1,
			valor:$('#busq_est').val()  
		},
		success:function(result0){
			$('#lista_estudiantes').html(result0);
		}	
	})
}

function materias_estudiantes(id){
	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			buscar_materias_estudiante: 1,
			id_est:id   
		},
		success:function(result0){
			$('#myModalMateriasEstudiante').modal('show');
			$('#lista_electivas_estudiante').html(result0);
		}	
	})
}

function borrar_estudiantes(id){
	var real = confirm("Desea eliminar este registro?");
	if(real == true){
		$.ajax({ 
			url: 'home_actualiza.php',
			type: 'POST',
			async: false,
			data: {
				borrar_estudiante: 1,
				id_est:id  
			},
			success:function(result0){
				estudiantes()
				alert("Registro Eliminado");

			}	
		})
	}
}

function datos_estudiantes(id){

	$.ajax({ 
		url: 'home_actualiza.php',
		type: 'POST',
		async: false,
		data: {
			datos_estudiante: 1,
			id_est:id  
		},
		success:function(result0){
			var cinfo =result0.split(";;");
			
			$('#lastname').val(cinfo[1]);	
			$('#firstname').val(cinfo[0]);
			$('#user').val(cinfo[2]);
			$('#code').val(cinfo[3]);
			$('#id_est').val(id);
			$('#myModalEstudiante').modal('show');
		}	
	})
	
}

function guarda_estudiante(){
	if($('#pass').val() == $('#rpass').val() ){
		var real = confirm("Desea finalizar el registro de los datos en la plataforma?");
		if(real == true){
			$.ajax({
				url: 'home_actualiza.php',
				type: 'POST',
				async: false,
				data: {
					nuevo_estudiante: 1,
					firstname:$('#firstname').val() ,
					lastname:$('#lastname').val() ,
					user:$('#user').val(),
                    pass:$('#pass').val(),
                    id_est:$('#id_est').val(),
                    code:$('#code').val(),

				},
				success:function(result){
                    if (result == 'ya'){
                        alert("El usuario ya se encuentra registrado");
                    }else{
                    	$('#myModalEstudiante').modal('hide');
                       alert("¡Registro Realizado con exito! ");
                       estudiantes()
                       
                    }
				}
			})
		}
	}else{
		alert("La contraseña de confirmacion debe ser igual a la contraseña digitada");
	}
}