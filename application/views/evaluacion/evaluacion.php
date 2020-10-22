<?php
if (!$this->session->userdata('is_logged')) {
    redirect(base_url());
}
?>


<div class="modalfade col-sm-12 col-md-12" id="idEval">
    <div class="modal-dialog modal-lg col-md-12">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h1 class="display-4 font-weight-bold font-italic " >EVALUACIÓN</h1>
                <span id="contador" class="font-weight-bold">Tiempo: </span>
            </div>
            <div class="modal-body alinear">
                <form class="form control form"id="formulario" name="formu" action="#">
                    <!--aqui viene el js-->
                </form>

            </div>
            <div class="modal-footer bg-info ">
                <input class="btn btn-success" type="button" value="Enviar Respuestas" id="idEnviar" />
            </div>

        </div>

    </div>
</div>

<style>
    .verde{color: green; font-weight: bold; font-size: x-large}

    .rojo{ color: red; font-weight: bold; font-size: x-large}

</style>

<script>

    //En este metodo obtengo por parametro el taller al que voy a aceder (taller1, taller2, taller3, etc)
//    function obtenerParametro() {
//        var parametro = window.location.search.substring(1);
//        var arrayPrm = parametro.split('&');
//        for (var i = 0; i < arrayPrm.length; i++) {
//            var dato = arrayPrm[i].split('=');
//            return dato[1];
//        }
//        return null;
//    }
//    ;

    let puntaje = 0;
    let contRespC = '0';
    let contRespI = '0';
    let contador;
    let tiempo = 600;
    //Creo el areglo de preguntas y respuestas
    let respuestasCorrectas = [];
    var cuestionario = [];
    let arraySeleccion = [];

//    var taller = obtenerParametro();

    //Obtenemos en la variable $taller el parametro ENCRIPTADO que viene por la URL 
<?php $taller = base64_decode($_GET['opc']); ?>
    //Pasamos el valor de la variable $taller de php a la variable taller de js
    var taller = "<?= $taller; ?>"

    //De acuerdo al parametro cargo la evaluacion, por ejemplo si por parametro viene (taller1, cargo la evaluacion del taller 1)
    if (taller === 'taller1') {
        cuestionario = [
            {'pregunta': 'Quien mato al mar muerto?', 'respuesta': ['Cristobal Colon', 'TU', 'Jose Pizarro']},
            {'pregunta': 'Quien descubrio america?', 'respuesta': ['Cristobal Colon', 'Americo Bescusio', 'TU']},
            {'pregunta': '¿Quién pintó Las meninas?', 'respuesta': ['Francisco de Goya', 'TU', 'Diego Velázquez']},
            {'pregunta': '¿Cada que tiempo se lava las manos?', 'respuesta': ['Cada hora', 'Cada 30 M', 'Cada cambio de actividad']}
        ]
    } else {

        if (taller === 'taller2') {
            cuestionario = [
                {'pregunta': 'Que es haccp?', 'respuesta': ['Analisis', 'Puntos criticos de control', 'lavado de manos']},
                {'pregunta': 'Quien descubrio america?', 'respuesta': ['Cristobal Colon', 'Americo Bescusio', 'TU']},
                {'pregunta': '¿Quién pintó Las meninas?', 'respuesta': ['Francisco de Goya', 'TU', 'Diego Velázquez']},
                {'pregunta': '¿Cada que tiempo se lava las manos?', 'respuesta': ['Cada hora', 'Cada 30 M', 'Cada cambio de actividad']}
            ]
        } else {
            if (taller === 'taller3') {
                cuestionario = [
                    {'pregunta': 'De los siguientes ejemplos ¿Cual es un correo no personalizado?', 'respuesta': ['manuel.jose@cateringclp.com', 'contabilidad.clp@cateringclp.com', 'luis.994@cateringclp.com']},
                    {'pregunta': 'Antes de enviar un correo electrónico debo:?', 'respuesta': ['Revisar las faltas ortográficas y de gramática.', 'Que esté redactado en texto puro.', 'Si adjunto un archivo, revisar que el archivo adjunto sea para el destinatario.','Todas son correctas.']},
                    {'pregunta': '¿Porque es impórtate utilizar el campo asunto?', 'respuesta': ['Para que el destinatario, a simple vista, puede decidir si leer o no un correo electrónico.', 'Por que es un campo obligatorio., caso contrario no se envía el mensaje.', 'Por normativas de la empresa.','Ninguna es correcta.']},
                    {'pregunta': '¿Por que no debemos redactar un correo electrónico en mayúsculas?', 'respuesta': ['Por qué escribir en mayúsculas en Internet equivale a gritar.', 'Por qué escribir en mayúsculas hace que el correo sea más pesado.', 'Las 2 son correctas.']},
                    {'pregunta': '¿Reenviar correos en cadena es una buena práctica?', 'respuesta': ['SI, por que puedo ver toda la cadena de mensajes que me han llegado.', 'NO, porque mientras más mensajes contenga más confuso se hace comprender el correo.']},
                    {'pregunta': '¿Qué debo hacer cuando me llega un correo no deseado (San)?', 'respuesta': ['Archivarlo para leerlo más tarde.', 'Abrirlo y leer el contenido.', 'Borrarlo inmediatamente.']},
                    {'pregunta': '¿Como debo estructurar una contraseña de correo electrónico?', 'respuesta': ['Mínimo 7 dígitos solo numeros.', 'Mínimo 4 dígitos con minusculas.', 'Mínimo 8 dígitos y combinar mayúsculas y minúsculas.']},
                ]
            }
        }
        //aqui continuara el taller 3.....

    }



    //METODO PARA CARGAR TODO EL FORMULARIO DE PREGUNTAS
    const mostrarCuestionario = (i) => {

        const cuest = cuestionario[i];//Cargo las preguntas a la variable cuest
        let  resp = cuest.respuesta;//la variable resp obtiene del cuestionario las respuestas

        //De acuerdo al parametro cargo las respuestas, por ejemplo si por parametro viene (taller1, valido las respuestas de la evaluacion1)        
        if (taller === 'taller1') {
            respuestasCorrectas = [
                {'respuesta': ['TU']},
                {'respuesta': ['Cristobal Colon']},
                {'respuesta': ['Francisco de Goya']},
                {'respuesta': ['Cada cambio de actividad']}
            ]
        } else {
            if (taller === 'taller2') {
                respuestasCorrectas = [
                    {'respuesta': ['Puntos criticos de control']},
                    {'respuesta': ['Cristobal Colon']},
                    {'respuesta': ['Francisco de Goya']},
                    {'respuesta': ['Cada cambio de actividad']}
                ]

            } else {
                if (taller === 'taller3') {
                    respuestasCorrectas = [
                        {'respuesta': ['contabilidad.clp@cateringclp.com']},
                        {'respuesta': ['Todas son correctas.']},
                        {'respuesta': ['Para que el destinatario, a simple vista, puede decidir si leer o no un correo electrónico.']},
                        {'respuesta': ['Por qué escribir en mayúsculas en Internet equivale a gritar.']},
                        {'respuesta': ['NO, porque mientras más mensajes contenga más confuso se hace comprender el correo.']},
                        {'respuesta': ['Borrarlo inmediatamente.']},
                        {'respuesta': ['Mínimo 8 dígitos y combinar mayúsculas y minúsculas.']}
                    ]
                }
            }
            //aqui continuara el taller 3.....
        }



        resp = resp.sort((resp, b) => Math.floor(Math.random() * 3) - 1);//metodo randon para las respuestas

        //Cargamos a un array el check y la respuesta  LA VARIABLE ${respAct}= AL RADIO SELECIONADO,                        LA FUNCION onClick="validadRespuesta SOLO EN EL CASO SI HABILITAMOS LA OPCION DE PINTAR LA RESPUESTA         LA VARIABLE THIS HACE REFERENCIA AL RADIO, Y LA VARIABLE (i) concatena el nombre del chech+i :check1 (1: llegaria a ser la variable i)
        const  arraycodigoHtmlR = resp.map(respAct => `<p id="removeColor"><input value="${respAct}" name="resp` + i + `"  onClick="validadRespuesta('${respAct}',this,` + i + `)" type="radio">
                                                    <span>${respAct}</span>
                                                   </p>`);

        const codigoHtmlR = arraycodigoHtmlR.join('');//obtenemos el valor del arraycodigoHtmlR a la variable codigoHtmlR 

        let codigoHtmlP = `<p class="font-weight-bold">${i+1+') '+cuest.pregunta}</p><div class="ml-5">${codigoHtmlR}</div><hr>`; //Concatenamos la pregunta con las posibles respuestas

//        document.querySelector('#formulario').innerHTML = codigoHtmlP; //pintamos el codigo html en el formulario
        document.getElementById('formulario').innerHTML += codigoHtmlP;


    }
    contador = setInterval(function () {
        tiempo--;
        if (tiempo === -1) {
            swal.fire({
                title: 'Tiempo',
                text: 'Su tiempo ha culminado',
                icon: 'warning',
                allowOutsideClick: false,
                allowEscapeKey: false,
                showConfirmButton: true,
            }).then(function () {
                window.location.href = '<?php echo base_url(); ?>opciones_controller';
            });
            clearInterval(contador);
        } else {
            document.querySelector('#contador').innerHTML = 'Tiempo: ' + tiempo;
        }

    }, 1000);





//   ESTE METODO ES UN ADICIONAL, ES SOLO PARA VALIDAR LA RESPUESTA AL MOMENTO DE CHECKEAR, NO AFECTA EN NADA AL LA EVALUACION 
    const validadRespuesta = (respSelec, obj, i) => {
        //Limpiamos los colores de seleccion    
        document.querySelectorAll('#removeColor').forEach(resp => resp.classList.remove('rojo', 'verde'));
        //EN ESTE FRAGMENTO OBTENGO LA RESPUESTA CORRECTA
        const cuest = respuestasCorrectas[i];
        let resp = cuest.respuesta;
        let respC = resp[0];
//        console.log('Incorrecta:  ' + respSelec+'   '+'RESPUESTA CORRECTA: ' + respC);
        //CON ESTE FRAGMENTO SELECIONO LA ETIQUETA <P> PARA PINTAR
        const pintar = obj.parentNode;
        let elemento = document.getElementById('pintar');
        //EN ESTE FRAGMENTO PINTO LAS RESPUESTAS CON LAS CLASES verde y rojo(son estilos css)
//        if (respSelec === respC) {
//            pintar.classList.add('verde');
//
//        } else {
//            pintar.classList.add('rojo');
//
//        }
    }
//FIN DEL METODO VALIDAR RESPUESTA


// LLamamos al metodo mediante un bucle para que muestre en pantalla todas las preguntas
    for (var i = 0; i < cuestionario.length; i++) {
        mostrarCuestionario(i);

    }



    $('#idEnviar').click(function () {
        let selecionados = [];
        let k = 0;
        //RECORRO UN FOR CON EL TAMAÑO DE cuestionario PARA SACRA LA LISTA DE SELECIONADOS O MARCACIONES
        for (var i = 0; i < cuestionario.length; i++) {
            let dato = $(`input[name=resp` + i + `]`).is(':checked');
            if (dato === true) {
                selecionados[k] = dato;//CARGO LAS SELECIONES AL AREGLO EN LA POCICION K
                k++;
            }
        }
        //PREGUNTO SI EL AREGLO DE MARCACIONES ES DEL MISMO TAMAÑO DEL CUESTIONARIO Y MUESTRO LOS RESULTADOS ELSE MUESTRO MRNSAJE
        if (selecionados.length === cuestionario.length) {
            obtenerRespuesta();
            $('#idResultados').modal('show');
            clearInterval(contador);
        } else {
            Command: toastr["warning"]("Selecione todas las opciones", '!');//ALERTA SI NO SE HAN MARCADO TODAS LAS OPCIONES
        }
    });


//OBTENGO LA RESPUESTA CHEKEADA
    function obtenerRespuesta() {
        for (var i = 0; i < cuestionario.length; i++) {
//          var dato= $('input:[name=resp1]:checked').val();          
            let dato = document.querySelector(`input[name=resp` + i + `]:checked`).value;
            arraySeleccion[i] = dato;
            console.log(arraySeleccion);
        }
        comparoRespuestas(arraySeleccion);
//        respCorretas(); //LLAMADO AL METODO ADICIONAL SOLO PARA MOSTRAR EN PANTALLA LAS RESPUESTAS CORRECTAS
    }

    //METODO PARA MOSTRAR EN PANTALLA EL TOTAL DE CORRECTAS E INCORRECTAS
    function comparoRespuestas(array) {

        for (var i = 0; i < array.length; i++) {
            const cuest = respuestasCorrectas[i];
            let resp = cuest.respuesta;
            console.log('SELECIONADO: ' + array[i] + '   ' + 'CORRECTO:  ' + resp);
            if (array[i] == resp) {
                contRespC++;
//                 $('#idContC').html(contRespC);
                document.getElementById('idContC').innerHTML = contRespC;// con js            
                console.log('ok:' + ' ' + contRespC);
            } else {
                contRespI++;
                $('#idContI').html(contRespI);//con jq
                console.log('se jodio:' + '  ' + contRespI);
            }
        }
        let a = respuestasCorrectas.length;
        let b = contRespC * 10 / a;
        puntaje = Math.round(b);
        $('#idPuntuacion').html(puntaje);


    }

    //METODO PARA MOSTRAR EN PANTALLA LAS RESPUESTAS CORRECTAS
    function respCorretas() {
        for (var i = 1; i <= respuestasCorrectas.length; i++) {
            const cuest = respuestasCorrectas[i - 1];
            let rc = cuest.respuesta;
            let rs = arraySeleccion[i - 1];
//            document.getElementById('idRespuesta').innerHTML +=rc;
            document.querySelector('#idRespuesta').innerHTML += 'R' + i + ': ' + rc + ' - Selecionada: ' + rs + '<br>';
//            alert(rc);

        }
    }


</script>



<div class="modal fade  col-sm-12 col-md-12" id="idResultados" data-backdrop=static data-keyboard=false>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="container">
                <div class="modal-body">
                    <div class="modal-head text-center">
                        <h2>RESULTADOS</h2>
                    </div>
                    <hr>
                    <!--<div class="alert alert-info"><label  class="my-3"><span id="idRespuesta"></span></label><br></div>--Habilitar junto con el metodo  en caso de querer mostrar las respuestas correctas-->
                    <div class="alert alert-success"><label>TOTAL DE ACIERTOS: <span id="idContC"  name="contc"/>0</span></label><br></div>
                    <div class="alert alert-danger"><label>TOTAL DE INCORRECTAS: <span id="idContI"  name="conti"/>0</span></label><br></div>
                    <div class="alert alert-dark text-center"><label>Su puntuación es: <span id="idPuntuacion"  name="puntuacion"/></span>/10</label>    
                    </div>
                    <style>.centrar{position: relative;right: 125px; margin-top: 7px }</style>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-primary centrar" id="idEnviarNota" >Enviar Resultados</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>

<?php $idUser = $this->session->userdata('id'); ?>
<?php $taller = base64_decode($_GET['opc']); ?>

        $('#idEnviarNota').click(function () {
            var nota = $('#idPuntuacion').text();
            if (nota === '10') {
                $.ajax({
                    type: 'ajax',
                    method: 'POST',
                    url: "<?php echo base_url(); ?>eval_controller/cambiarEstado",
                    data: {id:<?= $idUser ?>, taller: "<?= $taller ?>"}, //Tienes que tener en cuenta que si se trata del tipo string debes hacerlo entre comillas
                    dataType: 'json',
                    success: function (responce) {
                        if (responce) {
                            swal.fire({
                                title: 'Aprobado',
                                text: 'Puede continuar con el siguiente modulo',
                                icon: 'success',
                                showConfirmButton: true
                            }).then(function () {
                                window.location.href = "<?php echo base_url() ?>opciones_controller";
                            });
                        }
                    }

                });
            } else {
                swal.fire({
                    title: 'Reprobado',
                    text: 'Repita el modulo, Tiene que aprobar para poder continuar',
                    icon: 'warning',
                    showConfirmButton: true
                }).then(function () {
                    window.location.href = "<?php echo base_url() ?>opciones_controller";
                });

            }

        });

    </script>
