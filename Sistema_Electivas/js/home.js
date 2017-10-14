$(document).on('ready',function(){
	electivas();
	estudiantes();

	////////////////////////////////////////////metodos dinámicos electivas////////////////////////////////

	// se invoca la funcion de busqueda de electivas
	$('#search').click(function (e) {
		e.preventDefault();
		electivas()
	})

	// se abre la modal de creación de materia
	$('#new').click(function (e) {
		$('#myModalElectiva').modal('show');
	})

	// al darle editar a alguna electiva se invoca el metodo para cargar datos
	$('body').delegate('.editarelect','click', function(){
		var id= $(this).attr('ideditarelect'); 
		datos_electivas(id)
	});

	// al darle inscribir se invoca el metodo para realizar la inscripcion
	$('body').delegate('.inscrelect','click', function(){
		var id= $(this).attr('idinscrelect');
		gestion_inscripcion(id)
	});

	//al darle borrar se invoca el metodo para realizar el borrado
	$('body').delegate('.borrarelect','click', function(){
		var id= $(this).attr('idborrarelect');
		borrar_electivas(id)
	});

	// al ocultarse la modal de crear/editar electiva se borran todos los campos

	$('#myModalElectiva').on('hide.bs.modal',function(){
		$('.electcampos').val('');
	});

	//al aceptar el formulario se invoca el metodo de guardado de datos de la electiva
	$('#ingresaelectiva').submit(function(e){

		e.preventDefault();
		guarda_electivas();

	})

	// al  darle  estudiantes se invoca el metodo que carga los datos de estudiantes de una electiva

	$('body').delegate('.estudianteselect','click', function(){
		var id= $(this).attr('idestudianteselect'); 
		estudiantes_materias(id)
	});

	////////////////////////////////////////////metodos dinámicos Estudiantes////////////////////////////////

	// se invoca la funcion de busqueda de estudiantes
	$('#search_est').click(function (e) {
		e.preventDefault();
		estudiantes()
	})

	// se abre la modal de creación de estudiante
	$('#new_est').click(function (e) {
		$('#myModalEstudiante').modal('show');
		
	})

	// al  darle  materias se invoca el metodo que carga los datos de las electivas de un estudiante
	$('body').delegate('.materiasest','click', function(){
		var id= $(this).attr('idmateriasest'); 
		materias_estudiantes(id)
	});

	// al darle editar a algun estudiantes se invoca el metodo para cargar datos
	$('body').delegate('.editarest','click', function(){
		var id= $(this).attr('ideditarest'); 
		datos_estudiantes(id)
	});

	//al darle borrar se invoca el metodo para realizar el borrado de un estudiante
	$('body').delegate('.borrarest','click', function(){
		var id= $(this).attr('idborrarest');
		borrar_estudiantes(id)
	});

	// al ocultarse la modal de crear/editar estudiante se borran todos los campos
	$('#myModalEstudiante').on('hide.bs.modal',function(){
		$('.estcampos').val('');
	});


	//al aceptar el formulario se invoca el metodo de guardado de datos del estudiante
	$('#ingresaestudiante').submit(function(e){

		e.preventDefault();
		guarda_estudiante();

	})

})

////////////////////////////////////////////funciones electivas////////////////////////////////

// carga la lista de electivas
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

//guarda los datos ingresados en el formulario de electivas mediante una solicitud ajax
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

//borra los datos electivas mediante una solicitud ajax
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

// carga los datos de una electiva que será editada mediante una solicitud ajax
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

//registra la inscripcion o la salida del curso mediante una solicitud ajax

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

//trae el listado de estudiantes en una materia mediante una solicitud ajax

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

// carga la lista de estudiantes
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

//trae el listado de electivas de un estudiante mediante una solicitud ajax
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

//borra los datos de estudiantes mediante una solicitud ajax
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

// carga los datos de un estudiante que será editada mediante una solicitud ajax
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

//guarda los datos ingresados en el formulario de estudiantes mediante una solicitud ajax
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