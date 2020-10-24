<?php
//if (!$this->session->userdata('is_logged')) {
//    redirect(base_url());
//}
?>
<div id='app'>
    <div class="container my-5">

        <button  type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTareas" >Nueva Tarea</button>

        <hr>
        <div class="table-responsive">
            <table id="tblTareas" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
                <thead>
                    <tr style="height: 18px; border: 2px; solid: #000000; background-color: #17a2b8; ">
                        <th>ID</th>
                        <th>TAREA</th>
                        <th>IMAGEN</th>
                        <th>ACTIVIDAD</th>
                        <th>ESTADO</th>                  
                        <th>ACCIONES</th>                  
                    </tr>
                </thead>

                <tbody id='tableBody'>
                    <tr v-for='tarea of tareas'>
                        <td>{{tarea.id}}</td>
                        <td>{{tarea.task_nombre}}</td>
                        <td>{{tarea.task_imagen}}</td>
                        <td>{{tarea.task_contenido}}</td>
                        <td>
                            <span v-if=(tarea.task_estado=='Activo')>
                                <div class="bg-success text-white text-center">Activo</div>
                            </span>
                            <span v-else>
                                <div class="bg-danger text-white text-center">Inactivo</div>
                            </span>
                        </td>
                        <td >
                            <a href="#" class="btn btn-warning btn-sm " @click="obtenerTarea(tarea)" data-toggle="modal" data-target="#modalTareasAct"><li class="fa fa-edit"></li></a>
                            <a href="#" class="btn btn-danger btn-sm "  @click="eliminarTarea(tarea)" ><li class="fa fa-trash-alt"></li></a>
                        </td>   
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Fin Modal soporte-->

    <div class="modal fade" role="dialog " id="modalTareas" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog col-md-12">
            <div class="modal-content">
                <div class="modal-header">

                    <p class=" lead text-justify font-weight-bold"data-dismiss="modal" >Registro de Tareas</p>     

                </div>
                <div class="modal-body ">
                    <!-- Aqui inicia el codigo de formulario modal NUEVO CLIENTE-->
                    <form class="container" id="formuInsertar">
                        <div class="row">

                            <label for="nombre" class="col-form-label col-md-5">Nombre de la Tarea</label>   
                            <input type="text"  id="nombre" name="txtNombre" class="form-control col-form-input col-md-7 text-uppercase"
                                   :class="{'is-invalid':formValidacion.nombre}"
                                   v-model="nuevaTarea.nombre">
                        </div>
                        <br>
                        <div class="row">
                            <label for="img" class="col-form-label col-md-2" >Imagen</label>
                            <input type="file" class="col-md-10" id="img" name="img" 
                                   :class="{'is-invalid':formValidacion.imagen}"
                                   v-model="nuevaTarea.imagen">
                        </div>
                        <br>
                        <div class="row">                            
                            <div class="form-group col-md-2">
                                <label>Estado</label><br>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-dark " :class="{'active':(nuevaTarea.estado == 'Activo')}" 
                                            @click="pincharEstado('Activo')"> Activo</button>

                                    <button type="button" class="btn btn-outline-danger " :class="{'active': (nuevaTarea.estado == 'Inactivo')}" 
                                            @click="pincharEstado('Inactivo')">Inactivo</button>
                                </div>
                                <div  class="text-danger"v-html="formValidacion.estado"></div>
                            </div>
                        </div>


                        <br>
                        <div class="row">
                            <button type="button" @click="insertarTarea()" class="btn btn-success float-center" id="idBtnInsertar"  >Insertar</button>
                            <button type="button" @click='refrescarDatos()' class="btn btn-danger ml-1" data-dismiss="modal" id="idBtnCancelar" >Cancelar</button>                    
                        </div>

                    </form>

                    <!-- Aqui termina el codigo de formulario modal NUEVO CLIENTE-->

                </div>
                <div class="modal-footer">
                    <p id="modal-title">Registre una nueva tarea</p>

                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" role="dialog " id="modalTareasAct" data-backdrop=static data-keyboard=false>
        <div class="modal-dialog col-md-12">
            <div class="modal-content">
                <div class="modal-header">

                    <p class=" lead text-justify font-weight-bold"data-dismiss="modal" >Actualizar Tarea</p>     

                </div>
                <div class="modal-body ">
                    <!-- Aqui inicia el codigo de formulario modal NUEVO CLIENTE-->
                    <form class="container" id="formuInsertar">
                        <div class="row">

                            <label for="nombre" class="col-form-label col-md-5">Nombre de la Tarea</label>   
                            <input type="text"  id="nombre" name="txtNombre" class="form-control col-form-input col-md-7 text-uppercase"
                                   :class="{'is-invalid':formValidacion.nombre}"
                                   v-model="actualizarTarea.task_nombre">
                        </div>
                        <br>
                        <div class="row">
                            <label for="img" class="col-form-label col-md-2" >Imagen</label>
                            <input type="file" class="col-md-10" id="img" name="img" 
                                   :class="{'is-invalid':formValidacion.imagen}"
                                   v-model="actualizarTarea.task_imagen">
                        </div>
                        <br>
                        <div class="row">                            
                            <div class="form-group col-md-2">
                                <label>Estado</label><br>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-dark " :class="{'active':(actualizarTarea.task_estado == 'Activo')}" 
                                            @click="changeEstado('Activo')"> Activo</button>

                                    <button type="button" class="btn btn-outline-danger " :class="{'active': (actualizarTarea.task_estado == 'Inactivo')}" 
                                            @click="changeEstado('Inactivo')">Inactivo</button>
                                </div>
                                <div  class="text-danger"v-html="formValidacion.estado"></div>
                            </div>
                        </div>


                        <br>
                        <div class="row">
                            <button type="button" @click="agregarTarea()"class="btn btn-success float-center" id="idBtnInsertar"  >Insertar</button>
                            <button type="button" @click='formValidacion=false,refrescarDatos()' class="btn btn-danger ml-1" data-dismiss="modal" id="idBtnCancelar" >Cancelar</button>                    
                        </div>

                    </form>

                    <!-- Aqui termina el codigo de formulario modal NUEVO CLIENTE-->

                </div>
                <div class="modal-footer">
                    <p id="modal-title">Registre una nueva tarea</p>

                </div>
            </div>
        </div>
    </div>
</div>



<script>

    $(function () {

        // mostrarDatosDataTable();


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
                                titleAttr: 'Crear nueva Tarea',
                                className: 'btn btn-primary',
                                action: function () {
                                    $('#modalTareas').modal('show')
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
