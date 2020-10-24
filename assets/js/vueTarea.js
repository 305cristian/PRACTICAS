var v = new Vue({
    el: '#app',
    data: {
        url: 'http://localhost/capacitacion/',
        tareas: [],
        nuevaTarea: {
            nombre: '',
            imagen: '',
            contenido: '',
            estado: '',
        },
        actualizarTarea: {},
        successMSG: '',
        formValidacion: []

    },
    created() {
        this.cargarTareas();
    },
    methods: {
        tabla() {
            $(function () {
                $('#tblTareas').DataTable({
                    lengthMenu: [[7, 10, 15, -1], [7, 10, 15, "Todo"]],
                    responsive: true,
                    retrieve:true,
                    dom: "<'row'<'col-sm-12 col-md-12'B>>" +
                            "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [{

                            text: '<li class="fa fa-user-plus"></li> Nuevo Cliente',
                            titleAttr: 'Crear nuevo Cliente',
                            className: 'btn btn-primary mb-2',
                            action: function () {
                                $('#modalClientes').modal('show');
                            }

                        },
                        {
                            extend: 'excelHtml5',
                            text: '<li class="fas fa-file-excel"></li> EXCEL',
                            titleAttr: 'Exportar a EXCEL',
                            className: 'btn btn-success  btn-sm'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<li class="fas fa-file-pdf"></li> PDF',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn btn-danger  btn-sm'
                        },
                        {
                            extend: 'print',
                            text: '<li class="fas fa-print"></li> IMPRIMIR',
                            titleAttr: 'Imprimir Documento',
                            className: 'btn btn-info btn-sm'
                        }
                    ]

                });

            });

        },
        cargarTareas() {
            axios.post(this.url + 'Tarea_controller/obtenerTareas').then((response) => {
                if (response.data.tareas == null) {
                    v.noResult();
                } else {
                    v.tareas = response.data.tareas;
                    v.tabla();
                }
            })
        },
        insertarTarea() {
            var datos = v.formData(v.nuevaTarea);
            axios.post(this.url + 'Tarea_controller/insertarTarea', datos).then((response) => {
                if (response.data.error) {
                    v.formValidacion = response.data.msg;
                } else {
                    toastr['success'](v.successMSG = response.data.msg, 'Insertado');
                    v.cargarTareas();
                    v.refrescarDatos();
                    $('#modalTareas').modal('hide');
                    $('.modal-backdrop').remove();
                }
            });
        },
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },
        obtenerTarea(tarea) {
            v.actualizarTarea = tarea;
        },
        pincharEstado(estado) {
            return v.nuevaTarea.estado = estado; // agregar nuevo usuario con la selección de estado
        },
        changeEstado(estado) {
            return v.actualizarTarea.task_estado = estado; // actualizar el género 

        },
        refrescarDatos() {
            v.nuevaTarea = {
                nombre: '',
                imagen: '',
                contenido: '',
                estado: '',
            };
            v.cargarTareas();
            v.formValidacion = false;
        },
        noResult() {
//            v.sinResultado = true;
            v.nuevaTarea = null;


        }

    }
});
