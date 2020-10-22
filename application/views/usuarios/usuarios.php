<?php
if (!$this->session->userdata('is_logged')) {
    redirect(base_url());
}
?>
<div class="container my-5">
    <!--    <div class="col col-md-12  text-left">
            <a class="btn btn-info" data-target="#modalUsuario" data-toggle="modal" href="" id="btnUsuario"><li class="fa fa-user-plus"></li> Nuevo Usuario</a>          
    
        </div>-->
    <hr>
    <div class="table-responsive">
        <table id="tblUsuarios" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
            <thead>
                <tr style="height: 18px; border: 2px; solid: #000000; background-color: #17a2b8; ">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>USUARIO</th>
                    <th>CONTRASEÑA</th>
                    <th>ROL</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>

            <tbody id='tableBody'>
            </tbody>
        </table>
    </div>
</div>

 <!--Inicio Modal soporte-->
        <div id="modalSoporte" class="modal fade" data-backdrop=static data-keyboard=false>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Contactos</h1>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <p>
                                <label>Telefono: 0992094788</label><br>
                                <label>Correo: pcris.994@gmail.com</label>
                            </p>
                        </div> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mover" data-dismiss="modal">Cerrar</button>                    
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal soporte-->

<div class="modal fade" role="dialog " id="modalUsuario" data-backdrop=static data-keyboard=false>
    <div class="modal-dialog col-md-12">
        <div class="modal-content">
            <div class="modal-header">

                <p class=" lead text-justify font-weight-bold"data-dismiss="modal" >Registro de Usuarios</p>     

            </div>
            <div class="modal-body ">
                <!-- Aqui inicia el codigo de formulario modal NUEVO CLIENTE-->

                <form class="container" method="post" id="formuInsertar" action="<?php echo base_url() ?>Usu_controller/agregarUsuario">
                    <div class="row">
                        <input type="hidden" name="txtId">
                        <label for="nombre" class="col-form-label col-md-5">Ingrese el nombre</label>   
                        <input type="text"  id="nombre" name="txtNombre" class="form-control col-form-input col-md-7 text-uppercase"  value="">
                    </div>
                    <br>
                    <div class="row">
                        <label for="apellido" class="col-form-label col-md-5" >Ingrese el Apellido</label>
                        <input type="text" id="apellido" name="txtApellido" class="form-control col-form-input col-md-7 text-uppercase"   value="" >
                    </div>

                    <br>
                    <div class="row">
                        <label for="cedula" class="col-form-label col-md-5">Ingrese un nombre de Usuario</label>
                        <input type="text" id="cedula" name="txtUser" class="form-control col-form-imput col-md-7"   value="" >
                    </div>

                    <br>
                    <div class="row">
                        <label for="telefono" class="col-form-label col-md-5">Ingrese una contraseña</label>
                        <input type="text" id="telefono" name="txtPass" class="form-control col-form-imput col-md-7"  value="" >
                    </div>
                    <br>

                    <div class="row">
                        <label for="idComboRol" class="col-form-label col-md-5">Ingrese el Rol</label>
                        <select id="idComboRol" class="form-control col-form-select col-md-7" name="comboRol" >
                            <option value="0">Usuario</option>
                            <option value="1">Administrador</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <button type="button" class="btn btn-success float-center" id="idBtnInsertar" >Insertar</button>
                        <button type="button" onclick="resetearFormu()" class="btn btn-danger ml-1" data-dismiss="modal" id="idBtnCancelar" >Cancelar</button>                    
                    </div>

                </form>

                <!-- Aqui termina el codigo de formulario modal NUEVO CLIENTE-->

            </div>
            <div class="modal-footer">
                <p id="modal-title">Registre un nuevo Usuario</p>

            </div>
        </div>
    </div>
</div>
<!--FIN del modal NUEVO DOCENTE-->


<script>
    
    function resetearFormu() {
        $('#formuInsertar')[0].reset();
        $('input[type="hidden"]').val('');
        $('#idBtnInsertar').text('Insertar')
        $('#modal-title').text('Registre un nuevo Usuario');
    }
    $(function () {
     
        mostrarDatosDataTable();


        $('#idBtnInsertar').click(function () {
            if (validarCamposVacios()) {

                //obtengo la direccion action del formulario y los datos del formulario
                var url = $('#formuInsertar').attr('action');
                var data = $('#formuInsertar').serialize();
                //cargo a una variable los datos del formulario
                $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: url,
                    data: data,
                    dataType: 'json',
                    success: function (response) {
                        if (response.success) {
                            $('#tblUsuarios').DataTable().destroy();
                            mostrarDatosDataTable();
                            resetearFormu();
                            $('#modalUsuario').modal('hide');
                            $('.modal-backdrop').remove();

                            if (response.type === 'add') {
                                var type = 'Agregado exitosamente';
                            } else {
                                var type = 'Actualizado exitosamente';
                                resetearFormu();
                            }
                            Command: toastr["success"](type, "Insertado")
                        } else {
                            Command: toastr["error"]("Posible error en la DB", 'Error')
                        }

//                    buscarClientes();
                    },
                    error: function () {
                        Command: toastr["error"]("Posible error en la DB", 'Error')
                    }
                });
            } else {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Los campos estan vacios',
                    timer: 2100,
                    showConfirmButton: false
                });
            }
        });

        $('#tblUsuarios').on('click', '.item-edit', function () {

            var id = $(this).attr('data');
            $('#modalUsuario').find('#modal-title').text('Actualize los datos del usuario');
            $('#idBtnInsertar').text('Actualizar');

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: "<?php echo base_url() ?>Usu_controller/obtenerUsuario",
                data: {id: id},
                dataType: 'json',
                success: function (data) {
                    $('input[name="txtId"]').val(data.id);
                    $('input[name="txtNombre"]').val(data.nombre);
                    $('input[name="txtApellido"]').val(data.apellido);
                    $('input[name="txtUser"]').val(data.usuario);
                    $('input[name="txtPass"]').val(data.contrasenia);
                    $('select[name="comboRol"]').val(data.rol);
                }

            });
        })


        $('#tblUsuarios').on('click', '.item-delete', function () {

            var id = $(this).attr('data');

            swal.fire({
                title: "¿Estas seguro?",
                text: "Este paso eliminara definitivamente el Usuario,  siempre que no este asociada a otra tabla, caso contrario dara erro al eliminar",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#CC0000",
                confirmButtonText: "¡Si!",
                cancelButtonText: "Cancelar",
                closeOnConfirm: false,
                closeOnCancel: false}).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'ajax',
                        method: 'post',
                        url: '<?php echo base_url() ?>Usu_controller/eliminarUsuario',
                        data: {id: id},
                        dataType: 'json',
                        success: function (response, textStatus, jqXHR) {
                            if (response) {
                                mostrarDatosDataTable();
                                $('#tblUsuarios').DataTable().destroy();
                                Swal.fire({
                                    title: 'Eliminado',
                                    text: 'Usuario eliminado exitosamente',
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            } else {
                                Command: toastr['error']('No se obtubo respuesta de la base de datos', '!');
                            }
                        },
                        error: function () {
                            Command: toastr['error']('No se obtubo respuesta de la base de datos', '!');
                        }
                    });
                }

            });

        });
        //CARGAR DATOS A LA TABLA CON LA LIBRERIA DATATABLE
        function mostrarDatosDataTable() {
            $.ajax({
                url: "<?php echo base_url() ?>Usu_controller/obtenerUsuarios",
                type: "post",
                dataType: 'json',
                success: function (data) {
                    $('#tblUsuarios').DataTable({
                        lengthMenu: [[6, 10, 15, -1], [6, 10, 15, "Todo"]],
                        dom: "<'row'<'col-sm-12 col-md-12'B>>" +
                                "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" +
                                "<'row'<'col-sm-12'tr>>" +
                                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        buttons: [{

                                text: '<li class="fa fa-user-plus"></li> Nuevo Usuario',
                                titleAttr: 'Crear nuevo Docente',
                                className: 'btn btn-primary',
                                action: function () {
                                    $('#modalUsuario').modal('show')
                                }

                            }, {
                                extend: 'excelHtml5',
                                text: '<li class="fas fa-file-excel"></li> EXCEL',
                                titleAttr: 'Exportar a EXCEL',
                                className: 'btn btn-success'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<li class="fas fa-file-pdf"></li> PDF',
                                titleAttr: 'Exportar a PDF',
                                className: 'btn btn-danger'
                            },
                            {
                                extend: 'print',
                                text: '<li class="fas fa-print"></li> IMPRIMIR',
                                titleAttr: 'Imprimir Documento',
                                className: 'btn btn-info'
                            }
                        ],
                        retrieve: true,
                        paging: true,
                        flter: true,
                        searching: true,
                        language: {
                            lengthMenu: "Mostrar _MENU_ registros",
                            zeroRecords: "No se encontraron resultados",
                            info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                            infoFiltered: "(filtrado de un total de _MAX_ registros)",
                            sSearch: "Buscar:",
                            oPaginate: {
                                sFirst: "Primero",
                                sLast: "Último",
                                sNext: "Siguiente",
                                sPrevious: "Anterior"
                            },
                            sProcessing: "Procesando..."
                        },
                        responsive: true,
                        data: data,
                        columns: [
                            {data: "id"},
                            {data: "nombre"},
                            {data: "apellido"},
                            {data: "usuario"},
                            {data: "contrasenia"},
                            {data: "rol"},
                            {data: function (data, type, row, meta) {//si se usa render en vez de data: cambiar en el boton de aciones a ${row.id}, pero posiblemente no sera resposive la tabla
                                    var a =
                                            `<a href="#" class="btn btn-warning item-edit" data="${data.id}" data-target="#modalUsuario" data-toggle="modal"><li class="fa fa-user-edit"></li></a>
                                               <a href="#" class="btn btn-danger item-delete" data="${data.id}"><li class="fa fa-trash-alt"></li></a>
                                             `;
                                    return a;
                                }
                            }

                        ],
                        columnDefs: [
                            {
                                targets: [5],
                                data: 'rol',
                                render: function (data, type, row) {
                                    if (data === '0') {
                                        return '<span>Usuario</span>';
                                    } else {
                                        return '<span>Admin</span>';
                                    }
                                }
                            }
                        ]
                    });
                }
            });
        }

    }
    );
    //CARGAR DATOS A LA TABLA CON LA LIBRERIA DATATABLE

</script>
