<!-- HABILITAR EL SIGUIENTE TALLER ESTA EN TALLER 3
HABILITAR EL BOTON DEL VIDEO
CREAR EL AREGLO DE PREGUNTAS Y RESPUESTAS EN LA EVALUACION
HACER CAMBIOS EN EL DATATABLE DE ACUERDO A LO QUE QUE QUIERE VISUALIZAR

-->
<?php
if (!$this->session->userdata('is_logged')) {
    redirect(base_url());
}
?>
<?php $taller1 = $this->session->userdata('taller1') ?> 
<?php $taller2 = $this->session->userdata('taller2') ?> 
<?php $taller3 = $this->session->userdata('taller3') ?> 
<?php $taller4 = $this->session->userdata('') ?> 

<html>
    <head>

        <link rel="stylesheet" href="assets/plugins/video/video-js.css">
        <script src="assets/plugins/video/video.js"></script>
        <link rel="stylesheet" href="assets/plugins/video/estilo.css">
    </head>
    <body>
        <style>
            body{

                background-color: #d9faf1;
            }

            .thumbnail {   
                margin-top: 15px;
                margin-bottom: 5px;   
            }
            .thumbnail img{
                width: 120px;
                height: 80px;
                margin-top: 10px;
                margin-bottom: 5px;    
            }
            .cont-second{
                margin-top: 10px;
                margin-bottom: 10px;
                margin-left: 0px;
                box-shadow: 0px 0px 6px #6a6b6b;             
            }
            .cont-second:hover{
                box-shadow: 0px 0px 14px #6a6b6b;
            }
            .modal-content{

                box-shadow: 0px 0px 4px #6a6b6b;

            }

            .alinear{
                position: absolute;
                bottom:  10px;
                right: 10px;

            }
            .btn-dark:hover{
                box-shadow: 0px 0px 10px slategray;
            }

            .sombra{
                position: absolute;
                left: 52px;
                bottom: 62px;
            }
            .sombra:hover{
                box-shadow: 0px 0px 11px #007bff;
                color: #7abaff
            }



        </style>


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

        <!--Inicio Cursos -->
        <div class="container my-4">
            <div class="modal-content  col-sm-12 ">
                <div class="container text-center col-sm-12">
                    <div class="row">                      
                        <div class="col-sm-12 col-md-3 sobre">
                            <div class="container cont-second">
                                <div class="thumbnail">
                                    <img src="img/lavado.jpg">
                                    <h5>BPM BUENAS PRACTICAS</h5>
                                    <?php if ($taller1 === '1'): ?>
                                        <p>
                                            <button disabled id="btnVerVideo"class="btn btn-dark mb-3" >CURSO APROBADO</button>
                                            <!--<span class="text-success" id="idEstado">Aprobado</span>-->
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <button  id="btnVerVideo" class="btn btn-dark mb-3" value="taller1">NO DISPONIBLE</button>
                                            <span class="text-success" id="idEstado"></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3 ">
                            <div class=" cont-second mb-8">
                                <div class="thumbnail">
                                    <img src="img/haccp.jpg">
                                    <h5>HACCP ANALISIS DE PUNTOS CRITICOS</h5>

                                    <?php if ($taller2 === '1'): ?>
                                        <p>
                                            <button disabled id="btnVerVideo2"class="btn btn-dark mb-3" >CURSO APROBADO</button>
                                            <!--<span class="text-success" id="idEstado">Aprobado</span>-->
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <button  id="btnVerVideo2"class="btn btn-dark mb-3" value="taller2" >NO DISPONIBLE</button>
                                            <span class="text-success" id="idEstado2"></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class=" cont-second">
                                <div class="thumbnail">
                                    <img src="img/mail.png">
                                    <h5>BUEN USO DEL CORREO ELECTRÓNICO</h5>

                                    <?php if ($taller3 === '1'): ?>
                                        <p>
                                            <button disabled id="btnVerVideo3"class="btn btn-dark mb-3" >CURSO APROBADO</button>
                                            <!--<span style="color: yellowgreen"  id="idEstado">Aprobado</span>-->
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <button  id="btnVerVideo3"class="btn btn-primary mb-3"value="taller3" >ACCEDER AL CURSO</button>
                                            <span class="text-success" id="idEstado3"></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-12 col-md-3">
                            <div class=" cont-second">
                                <div class="thumbnail">
                                    <img src="img/manos.png">
                                    <h5>LAVADO DE MANOS</h5>

                                    <?php if ($taller4 === '1'): ?>
                                        <p>
                                            <button disabled id="btnVerVideo4"class="btn btn-dark mb-3" >ACCEDER AL CURSO</button>
                                          
                                        </p>
                                    <?php else: ?>
                                        <p>
                                            <button  id="btnVerVideo4"class="btn btn-dark mb-3"value="taller4" >NO DISPONIBLE</button>
                                            <span class="text-success" id="idEstado4"></span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>                                                            
                        </div>                                                            
                    </div>

                </div>
            </div>
        </div>
        <!--Fin Cursos -->



        <script>

            $(function () {

                //Si en caso se quiere usar botones de play y pause personalizados habilitamos este metodo y el html del Swal.fire
                window.reproducir = function () {
                    var valor = document.getElementById('idControl').value;
                    if (valor === 'Pause') {
                        document.getElementById('idVideo').pause();
                        document.getElementById('idControl').value = "Play";
                        $('#idSpan').html('<i class="fas fa-play"></i>');
                    } else {
                        document.getElementById('idVideo').play();
                        document.getElementById('idControl').value = "Pause";
                        $('#idSpan').html('<i class="fas fa-pause"></i>');
                    }
                };

                $("#btnVerVideo-").click(function () {
                    var opc = $("#btnVerVideo").val();//esta variable debe estar alimentada con el mismo nombre de la columna de la base de datos, para enviarle a la evaluacion y explicarle a que taller va a acceder
                    opc = window.btoa(opc);
                    Swal.fire({
                        width: '85%',
                        allowOutsideClick: false,
                        allowEacapeKey: false,
                        showConfirmButton: false,
                        html: '<video class="fm-video vjs-big-play-centered" autoplay="autoplay" id="idVideo"><source src="videos/bpm.mp4" type="video/mp4"></video> <button class="btn btn-sm sombra" id="idControl" type="button" Value="Pause"onclick="reproducir()"><span id="idSpan"><i class="fas fa-pause"></i></span></button>',
//                        html: '<video class="fm-video video-js vjs-big-play-centered" autoplay="autoplay" controls id="fm-video" data-setup="{}"><source src="videos/bpm.mp4" type="video/mp4"></video> ',
                        footer: '<span id="idEvaluar"></span>'
                    }
                    );
                    $('#idVideo').on('ended', function () {
                        document.getElementById('idEvaluar').innerHTML = '<a  href="<?php echo base_url() ?>evaluacion_controller?opc=' + opc + '" name="post" class="btn btn-success btn-sm alinear"><li class="fas fa-file-alt"></li><strong>  EVALUACION >></strong></a>';

                    });
//                    var reproductor = videojs('fm-video', {fluid: true});

                });
                $("#btnVerVideo-2").click(function () {
                    var opc = $("#btnVerVideo2").val();//esta variable debe tener el mismo nombre de la columna de la base de datos, para enviarle a la evaluacion y explicarle a que taller va a acceder
                    opc = window.btoa(opc);
                    Swal.fire({
                        width: '85%',
                        allowOutsideClick: false,
                        allowEacapeKey: false,
                        showConfirmButton: false,
                        html: '<video class="fm-video vjs-big-play-centered" autoplay="autoplay" id="idVideo"><source src="videos/haccp1.mp4" type="video/mp4"></video> <button class="btn btn-sm sombra" id="idControl" type="button" Value="Pause"onclick="reproducir()"><span id="idSpan"><i class="fas fa-pause"></i></span></button>',
//                        html: '<video class="fm-video video-js vjs-big-play-centered" autoplay="autoplay" controls id="fm-video"><source src="videos/haccp1.mp4" type="video/mp4"></video> ',
                        footer: '<span id="idEvaluar"></span>'
                    }
                    );
                    $('#idVideo').on('ended', function () {
                        document.getElementById('idEvaluar').innerHTML = '<a href="<?php echo base_url() ?>evaluacion_controller?opc=' + opc + '" class="btn btn-success btn-sm alinear"><li class="fas fa-file-alt"></li><strong>  EVALUACION >></strong></a>'
                    });
//                    var reproductor = videojs('fm-video', {fluid: true});

                });
                $("#btnVerVideo3").click(function () {
                    var opc = $("#btnVerVideo3").val();//esta variable debe tener el mismo nombre de la columna de la base de datos, para enviarle a la evaluacion y explicarle a que taller va a acceder
                    opc = window.btoa(opc);
                    Swal.fire({
                        width: '85%',
                        allowOutsideClick: false,
                        allowEacapeKey: false,
                        showConfirmButton: false,
                        html: '<video class="fm-video vjs-big-play-centered" autoplay="autoplay" id="idVideo"><source src="videos/correos.mp4" type="video/mp4"></video> <button class="btn btn-sm sombra" id="idControl" type="button" Value="Pause"onclick="reproducir()"><span id="idSpan"><i class="fas fa-pause"></i></span></button>',
//                        html: '<video class="fm-video video-js vjs-big-play-centered" autoplay="autoplay" controls id="fm-video"><source src="videos/haccp1.mp4" type="video/mp4"></video> ',
                        footer: '<span id="idEvaluar"></span>'
                    }
                    );
                    $('#idVideo').on('ended', function () {
                        document.getElementById('idEvaluar').innerHTML = '<a href="<?php echo base_url() ?>evaluacion_controller?opc=' + opc + '" class="btn btn-success btn-sm alinear"><li class="fas fa-file-alt"></li><strong>  EVALUACION >></strong></a>'
                    });
//                    var reproductor = videojs('fm-video', {fluid: true});

                });


                //Otra forma de ver
                $("#btnVerVideo4-").click(function () {
                    var opc = 'taller4';//esta variable debe tener el mismo nombre de la columna de la base de datos, para enviarle a la evaluacion y explicarle a que taller va a acceder
                    Swal.fire({

                        width: '85%',
                        allowOutsideClick: false,
                        allowEacapeKey: false,
                        showConfirmButton: false,
                        timer: 9000,
                        timerProgressBar: true,
//                        html: '<video class="fm-video video-js vjs-16-9 vjs-big-play-centered" data-setup="{}" controls id="fm-video"><source src="videos/manos.mp4" type="video/mp4"></video>',
                        html: '<video id="idVideo" class="fm-video vjs-big-play-centered" ><source src="videos/haccp1.mp4" type="video/mp4"></video> <button class="btn btn-sm sombra" id="idControl" type="button" Value="Pause"onclick="reproducir()"><span id="idSpan"><i class="fas fa-pause"></i></span></button>',

                    }).then(() => {
                        swal.fire({
                            width: '85%',
                            allowOutsideClick: false,
                            allowEacapeKey: false,
                            showConfirmButton: false,
                            timerProgressBar: false,
                            showCloseButton: true,
                            animation: false,
                            html: '<video class="fm-video vjs-big-play-centered" controls><source src="videos/haccp1.mp4" type="video/mp4"></video>',
                            footer: '<a href="<?php echo base_url() ?>evaluacion_controller?opc=' + opc + '" class="btn btn-success alinear"><li class="fas fa-file-alt"></li><strong>  EVALUACION >></strong></a>'
                        });
                    })
                });

            });

//            $(function () {
//                $(document).bind("contextmenu", function (e) {
//                    return false;
//                });
//            });
        </script>

        <!--Inicio Modal Resultados-->
        <div class="modal fade  col-sm-12 col-md-12" id="idResultados" data-backdrop=static data-keyboard=false>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="container">
                        <div class="modal-head bg-light">
                            <h1>Resultados de evaluación</h1>  
                        </div>
                        <div class="modal-body">
                            <table id="idTblResultados" class="table table-striped dysplay nowrap" dellspacing="0" style="width: 100%">
                                <thead>
                                    <tr class="bg-info">
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Evaluacion 1</th>
                                        <!--<th>Evaluacion 2</th>-->
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr class="bg-info">
                                        <th>Buscar</th>
                                        <th>Buscar</th>
                                        <th>Buscar</th>
                                        <!--<th>Buscar</th>-->
                                    </tr>
                                </tfoot>
                                <tbody id="idTableBody">

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger mover" data-dismiss="modal">Cerrar</button>                    
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Resultados-->


        <!--Estilo CSS para posesionar los filtros de buscar en el header-->
        <style>
            #idTblResultados tfoot input{
                width: 100% !important;
            }
            #idTblResultados tfoot {
                display: table-header-group !important;
            }
        </style>
        <script>

            $('#idAprobados').click(function () {
                $('#idResultados').modal('show');
                $('#idTblResultados').DataTable().destroy();
                mostrarResultados();
            });
            $('#idAprobados2').click(function () {
                $('#idResultados').modal('show');
                $('#idTblResultados').DataTable().destroy();
                mostrarResultados();
            });

            function mostrarResultados() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo base_url() ?>Eval_controller/obtenerResultados",
                    dataType: 'json',
                    success: function (data) {

                        $('#idTblResultados tfoot th').each(function () {
                            $(this).text(); //es el nombre de la columna
                            $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Buscar..." />');
                        });
                        $('#idTblResultados').DataTable({
                            lengthMenu: [[6, 10, 15, -1], [6, 10, 15, "Todo"]],
                            dom: "<'row'<'col-sm-12 col-md-12'B>>" +
                                    "<'row'<'col-sm-12 col-md-5'l><'col-sm-12 col-md-7'f>>" +
                                    "<'row'<'col-sm-12'tr>>" +
                                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                            buttons: [
                                {
                                    extend: 'excelHtml5',
                                    text: '<li class="fas fa-file-excel"></li> Excel',
                                    titleAttr: 'Exportar a EXCEL',
                                    className: 'btn btn-success btn-sm'
                                },

                                {
                                    extend: 'print',
                                    text: '<li class="fas fa-print"></li> Print',
                                    titleAttr: 'Imprimir Documento',
                                    className: 'btn btn-info btn-sm'
                                }
                            ],
                            orderCellsTop: true,
                            fixedHeader: true,
                            responsive: true,
                            data: data,
                            columns: [
                                {data: 'nombre'},
                                {data: 'apellido'},
//                                {data: 'taller1'},
//                                {data: 'taller2'},
                                {data: 'taller3'}
                            ],
                            columnDefs: [
//                                {
//                                    targets: [2],
//                                    data: 'taller1',
//                                    render: function (data, type, row) {
//                                        if (data === '0') {
//                                            return '<span class="bg-warning text-white">Pendiente</span>';
//                                        } else {
//                                            return '<span class="bg-info text-white">Aprobado</span>';
//                                        }
//                                    }
//                                },
//                                {
//                                    targets: [3],
//                                    data: 'taller2',
//                                    render: function (data, type, row) {
//                                        if (data === '0') {
//                                            return '<span class="bg-warning text-white">Pendiente</span>';
//                                        } else {
//                                            return '<span class="bg-info text-white">Aprobado</span>';
//                                        }
//                                    }
//                                },
                                {
                                    targets: [2],
                                    data: 'taller3',
                                    render: function (data, type, row) {
                                        if (data === '0') {
                                            return '<span class="bg-warning text-white">Pendiente</span>';
                                        } else {
                                            return '<span class="bg-info text-white">Aprobado</span>';
                                        }
                                    }
                                }
                            ],
                            initComplete: function () {
                                this.api().columns().every(function () {
                                    var that = this;

                                    $('input', this.footer()).on('keyup change', function () {
                                        if (that.search() !== this.value) {
                                            that
                                                    .search(this.value)
                                                    .draw();
                                        }
                                    });
                                });
                            }
                        });

                    }

                });

            }
            ;

        </script>
    </body>
</html>

