var 
    nombreUsuario = $('#nombre_usuario'),
    correo        = $('#correo'),
    formUserAdd   = $('#formUserAdd'),
    formUserEdit  = $('#formUserEdit'),
    tablaUsuarios = $('#tablaUsuarios')
;

/**
 * DtataTables 
 */
  
tablaUsuarios.DataTable({
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [                
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        // "ajax" : 
        //         {
        //             url : '../ajax/categoria.php?op=listar',
        //             type : "get",
        //             dataType : "json",
        //             error : function(e){
        //                 console.log(e.responseText);
        //             }
        //         },
        "bDestroy": true,
        "iDisplayLength": 8,//Paginación
        "order": [[ 0, "desc" ]],//Ordenar (columna,orden)
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
     * Agregar Nuevo Usuario 
     */
      $('#addUser').on('click',function(){
        $('#signup-modal .modal-header h3:nth-child(2)').addClass('d-none');
        $('#signup-modal .modal-header h3:nth-child(1)').removeClass('d-none');
        $('#formularioUser')[0].reset();
        $('#errorCorreo').addClass('d-none');
      });

	/**
	 * Validación de formulario 
	 */
	  
    formUserAdd.parsley();
    formUserEdit.parsley();
    formUserAdd.on('submit',function(){
    	var usuario = nombreUsuario.val();
        
    	swal({
    		type              : "success",
    		title             : "El usuario "+ usuario + " ha sido creado correctamente",
    		position: 'top-end',
    		type: 'success',
    		showConfirmButton: true,
            confirmButtonText : "Cerrar",
    		timer: 4000
    	});
        formUserAdd.reset();
    });
    /**
     * Valida que no se creen correos repetidos 
     */
      
    correo.on('keyup',function(){
    	var valCorreo =  correo.val(),
    	    datos  = new FormData()
    	;
        // console.log("El correo es "+ valCorreo);
    	datos.append('validarCorreo', valCorreo);

    	$.ajax({
            url         : "ajax/usuarios.ajax.php",
            method      : "POST",
            dataType    : "json",
            data        : datos,
            cache       : false,
            contentType : false,
            processData : false,
    		success:function(respuesta){
    			// console.log(respuesta);
    			if(respuesta != "")
    			{
    				$('#errorCorreo').removeClass('d-none');
    			} else {
    				$('#errorCorreo').addClass('d-none');
    			}
    		},
            error:function(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
    	})
    });
    /**
     * Subir Foto  
     */
    $('.foto_usuario').change(function(){
    	var imagen = this.files[0];
        // console.log(imagen);

    	/*FORMA 1*/
    	// console.log(imagen[0].size);
    	// var input = $(this).val();
    	// var extensiones = input.substring(input.lastIndexOf("."));
    	// // alert(extensiones);
    	// if(extensiones != ".jpg" && extensiones != ".png")
    	// {
    	// 	$(".foto_usuario").val("");
    	// 	$('#errorFotoType').removeClass('d-none');
    	// 	$('.foto_usuario').addClass('alert alert-danger');
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
    		$(".foto_usuario").val("");
    		$('#errorFotoType').removeClass('d-none');
    		$('.foto_usuario').addClass('alert alert-danger');
    		return;
    	} else if (imagen.size > 30000){
    		$('#errorFotoSize').addClass('d-none');
    		$('#errorFotoType').addClass('d-none');
    		$(".foto_usuario").val("");
    		$('#errorFotoSize').removeClass('d-none');
    		$('.foto_usuario').addClass('alert alert-danger');
    		return;
    	} else {
    		$('#errorFotoSize').addClass('d-none');
    		$('#errorFotoType').addClass('d-none');
    		$('.foto_usuario').removeClass('alert alert-danger');
    		
            var datosImagen = new FileReader;
            datosImagen.readAsDataURL(imagen);

            $(datosImagen).on('load',function(event){
                var rutaImagen = event.target.result;
 
                $('.previsualizar').attr('src',rutaImagen);
            });
    	}

          
    });
    /**
     * Canclar edición 
     */
    $('.cancelEditUser').on('click',function(){
        $('#edicionUsuarios').addClass('d-none');
        $('#listaUsuarios').removeClass('d-none');
    });
      
    /**
     * Editar Usuarios 
     */
    $('.editarUser').on('click',function(){

        $('#listaUsuarios').addClass('d-none');
        $('#edicionUsuarios').removeClass('d-none');

        var 
            idUsuario = $(this).attr('idUser'),
            datos     = new FormData()
        ;
        // console.log("El id es : " +idUsuario);

        datos.append('idUsuario',idUsuario)

        $.ajax({
            url         : "ajax/usuarios.ajax.php",
            method      : "POST",
            dataType    : "json",
            data        : datos,
            cache       : false,
            contentType : false,
            processData : false,
            success:function(resp){
                console.log(resp);
                nombreUsuario.attr('value',resp.nombreUsuario);
                correo.attr('value',resp.correo);
                $('#optPerfil').html(resp["perfil"]);
                formUserAdd.reset();
            },
            error:function(x,y,z){
                console.log(x);
                console.log(y);
                console.log(z);
            }
        })
    });
      