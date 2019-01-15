
		/**
		 * DtataTables 
		 */
		  
		$('#tablaUsuarios').DataTable({
			"language" : {
				"sProcessing"     : "Procesando...",
				"sLengthMenu"     :    "Mostrar _MENU_ registros",
				"sZeroRecords"    :    "No se encontraron resultados",
				"sEmptyTable"     :    "No hay datos disponibles para esta tabla",
				"sInfo"           :    "Mostrando registros del <b>_START_</b> al <b>_END_</b> de un total de <b>_TOTAL_</b>",
				"sInfoEmpty"      :    "Mostrando registros del <b>0</b> al <b>0</b> de un total de <b>0</b>",
				"sInfoFiltered"   :    "(Filtrado de un total de <b>_MAX_</b> registros)",
				"sInfoPosFix"     :    "",
				"sSearch"         :    "Buscar:",
				"sUrl"            :    "",
				"sInfoThousands"  :    ",",
				"sLoadingRecords" :    "Cargando",
				"oPaginate"       :    {
					"sFirst"      :    "Primero",
					"sLast"       :    "Último",
					"sNext"       :    "Siguiente",
					"sPrevious"   :    "Anterior",
				},
				"oAria"           :    {
					"sSortAscending"     :    "Activar para ordenar la columna de manera ascendente",
					"sSortDescending"    :    "Activar para ordenar la columna de manera descendente",
				}
			}
		});

	/**
	 * Validación de formulario 
	 */
	  
	var formulario = $('#formularioUser');
    formulario.parsley();
    formulario.on('submit',function(){
    	var usuario = $('#nombreUsuario').val();
		    	swal({
		    		type              : "success",
		    		title             : "El usuario "+ usuario + " ha sido creado correctamente",
		    		position: 'top-end',
		    		type: 'success',
		    		showConfirmButton: true,
                    confirmButtonText : "Cerrar",
		    		timer: 4000
		    	});
	    		location.reload();
      //       setTimeout(function(){
	    	// },5000);

    });
    /**
     * Valida que no se creen correos repetidos 
     */
      
    $('#correo').on('change',function(){
    	var correo =  $('#correo').val(),
    	    datos  = new FormData()
    	;

    	datos.append('validarCorreo', correo);

    	$.ajax({
    		url : "ajax/usuarios.ajax.php",
    		dataType : "json",
    		method  : "POST",
    		data : datos,
    		cache: false,
    		processData : false,
    		contentType : false,
    		success:function(respuesta){
    			alert(respuesta);
    			if(respuesta == "true")
    			{
    				$('#errorCorreo').removeClass('d-none');
    			} else {
    				alert('todo bien');
    			}
    		}
    	})
    });
    /**
     * Subir Foto  
     */
    $('.fotoUsuario').change(function(){
    	var imagen = this.files[0];
        // console.log(imagen);

    	/*FORMA 1*/
    	// console.log(imagen[0].size);
    	// var input = $(this).val();
    	// var extensiones = input.substring(input.lastIndexOf("."));
    	// // alert(extensiones);
    	// if(extensiones != ".jpg" && extensiones != ".png")
    	// {
    	// 	$(".fotoUsuario").val("");
    	// 	$('#errorFotoType').removeClass('d-none');
    	// 	$('.fotoUsuario').addClass('alert alert-danger');
    	// } else {
    	// 	alert('todo bien!!');
    	// }
    
    	/*FORMA 2*/
    	
    	if(imagen.type != "image/jpg" && 
    	   imagen.type != "image/JPG" && 
    	   imagen.type != "image/jpeg" && 
    	   imagen.type != "image/PNG" && 
    	   imagen.type != "image/png")
    	{
    		$('#errorFotoSize').addClass('d-none');
    		$('#errorFotoType').addClass('d-none');
    		$(".fotoUsuario").val("");
    		$('#errorFotoType').removeClass('d-none');
    		$('.fotoUsuario').addClass('alert alert-danger');
    		return;
    	} else if (imagen.size > 150000){
    		$('#errorFotoSize').addClass('d-none');
    		$('#errorFotoType').addClass('d-none');
    		$(".fotoUsuario").val("");
    		$('#errorFotoSize').removeClass('d-none');
    		$('.fotoUsuario').addClass('alert alert-danger');
    		return;
    	} else {
    		$('#errorFotoSize').addClass('d-none');
    		$('#errorFotoType').addClass('d-none');
    		$('.fotoUsuario').removeClass('alert alert-danger');
    		
            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on('load',function(event){
                var rutaImagen = event.target.result;
                console.log(rutaImagen);

                $('.previsualizar').attr('src',rutaImagen);
            });
    	}
    });
      