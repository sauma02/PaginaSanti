function datoUsuario(id) {
    $.ajax({
        url: url + "usuarioController/datoUsuario",
        type: "post",
        dataType: "json",
        data: { 'id': id }
    }).done(function(respuesta) {
        $.each(respuesta, function(index, value) {
            $('#selTipoDocumento').val(value.idTipoDocumento);
            $('#txtDocumento').val(value.Documento);
            $('#txtNombres').val(value.Nombres);
            $('#txtApellidos').val(value.Apellidos);
            $('#txtFechaNacimiento').val(value.FechaNacimiento);
            $('#txtTelefono').val(value.Telefono);
            $('#txtEmail').val(value.Email);
            $('#txtDireccion').val(value.Direccion);
            // $('#selGenero').val(value.Genero);
            $('#txtUsuario').val(value.Usuario);
            $('#txtClave').val(value.Clave);
            $('#txtIdUsuario').val(value.idUsuario);
            $('#selRoles').val(value.idRol);
        })
    }).fail(function(error) {
        console.log(error)
    })
}

function cambiarEstado(id){
    Swal.fire({
        title:'¿Desea cambiar el estado del usuario?',
        icon: 'warning', 
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, Cambiar estado',
    }).then((result)=>{
        if(result.isConfirmed){
            $.ajax({
                type: "post",
                url:url+"usuarioController/cambiarEstado",
                data: {'id':id,}
            }).done(function(respuesta){
                if(respuesta == 1){
                    window.location = url + "usuarioController/listarUsuarios";
                    window.reload();
                }else{
                    Swal.fire('Error al cambiar el estado', '', 'error');
                }
            }).fail(function(error){
                console.log(error);
            })
        }
    })
}

function eliminarUsuario(id){
    Swal.fire({
        title:'¿Desea eliminar el usuario?',
        icon: 'danger', 
        showCancelButton: true,
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar usuario',
    }).then((result)=>{
        if(result.isConfirmed){
            Swal.fire({
                title:'Usuario Eliminado',
                confirmButtonText: 'OK',
            }).then((result)=>{
                if(result.isConfirmed){
                    $.ajax({
                        type: "post",
                        url:url + "usuarioController/eliminarUsuario",
                        data: {'id':id,}
                    }).done(function(respuesta){
                        if(respuesta == 1){
                            window.location = url + "usuarioController/listarUsuarios";
                            window.reload();
                        }else{
                            Swal.fire('Error al eliminar el usuario', '', 'error');
                        }
                    }).fail(function(error){
                        console.log(error);
                    })
                }
            })
        }
    })
}
