var v = new Vue({
    el: '#app',
    data: {
        url: 'http://localhost/capacitacion/',
        nuevaTarea: {
            nombreTarea: '',
            imagenTarea: '',
            contenidoTarea: '',
            estadoTarea: '',
        },
        activo: 'Active',
        successMSG: '',
        formValidacion: []

    },
    created: {

    },
    methods: {

        agregarTarea() {
            var datos = v.formData(v.nuevaTarea);
            axios.post(this.url + 'Tarea_controller/insertarTarea', datos).then((response) => {
                if (response.data.error) {
                    v.formValidacion = response.data.msg;
                } else {
                    toastr['success'](v.successMSG = response.data.msg, 'Insertado');
//                    v.cargarTareas();
                    v.limpiar();
                    $('#modalTareas').modal('hide');
                    $('.modal-backdrop').remove();
                }
            })
        },
        formData(obj) {
            var formData = new FormData();
            for (var key in obj) {
                formData.append(key, obj[key]);
            }
            return formData;
        },

        limpiar() {
            v.nuevaTarea = {
                nombreTarea: '',
                imagenTarea: '',
                videoTarea: '',
                estadoTarea: true
            };
            v.formValidacion = false;
        }

    }
});
