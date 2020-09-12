//$('#tblClientes').dataTable({
////          lengthMenu: [[5, 10, 15, -1], [5, 10, 15, "Todo"]],
//            retrieve: true,
//            paging: true,
//            flter: true,
//            searching: true,
//            language: {
//                lengthMenu: "Mostrar _MENU_ registros",
//                zeroRecords: "No se encontraron resultados",
//                info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
//                infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
//                infoFiltered: "(filtrado de un total de _MAX_ registros)",
//                sSearch: "Buscar:",
//                oPaginate: {
//                    sFirst: "Primero",
//                    sLast: "Último",
//                    sNext: "Siguiente",
//                    sPrevious: "Anterior"
//                },
//                sProcessing: "Procesando..."
//            }
//        });




 swal.fire({
                        title: "¿Deseas unirte al lado oscuro?",
                        text: "Este paso marcará el resto de tu vida...",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "¡Claro!",
                        cancelButtonText: "No, jamás",
                        closeOnConfirm: false,
                        closeOnCancel: false}).then((result)=>{
                        if (result.value) {
                                    swal.fire("¡Hecho!",
                                            "Ahora eres uno de los nuestros",
                                            "success");
                                } else {
                                    swal.fire("¡Gallina!",
                                            "Tu te lo pierdes...",
                                            "error");
                                }
                        })