<html>
    <head>
    </head>
    <body>
        <style>
            body{
                background-color: #d9faf1;
            }

            .main-section{
                margin:0 auto;
            }
            .modal-content{
                box-shadow: 0px 0px 4px #6a6b6b;   
            }

            .img-user{
                margin-top: -50px;
                margin-bottom: 15px;
            }
            .img-user img{
                width: 100px;
                height: 100px;
                box-shadow: 0px 0px 4px #6a6b6b;
                border-radius: 50px;
            }
        </style>
        <div class="modal-dialog text-center ">
            <div class="col-sm-8 main-section">
                <p class="display-4" >LOGIN</p>
                <hr class="bg-info"></hr>   
            </div>       
        </div>

        <div     class="modal-dialog text-center ">
            <div class="col-sm-8 main-section">
                <div class="modal-content">
                    <div class="col-12 img-user">
                        <img src="img/user.png">
                    </div>            
                    <form id="idFormulario" method="get" class="col-12 " action="<?php echo base_url() ?>Login_controller/login">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><li class="fa fa-user"></li></span>
                            </div>    
                            <input name="txtUser" type="text" required="" id="idUser" class="form-control" placeholder="Usuario">      
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><li class="fa fa-key"></li></span>
                            </div>    
                            <input name="txtPass" type="password" required="" id="idPass" class="form-control" placeholder="Contraseña">      
                        </div>

                        <div class="form-group">
                            <button type="button" id="btnLogin" class="btn btn-primary"><li class="fas fa-sign-in-alt"></li>  ENTRAR</button>      
                        </div>
                        <div class="mb-3 aler alert-danger">
                            <span class="display text-danger" id="idError"></span>
                        </div>

                    </form>

                </div> 
            </div>
        </div>
    </body>
</html>            

<script>

    $('#btnLogin').click(function () {
        if (validarLogin()) {
            var user = $('#idUser').val();
            var pass = $('#idPass').val();

            var url = $('#idFormulario').attr('action');

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: {user: user, pass: pass},
                async: false,
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        window.location.href = '<?php echo base_url(); ?>opciones_controller';
//                    alert(data.estado)
                    } else {
                        $('#idError').html('Usuario no registrado')
                    }
                },
                error: function () {
                    Command: toastr["error"]("Posible error en la DB", 'Error');
                }
            });
        } else {
            Command: toastr["warning"]("Todos los campos son obligatorios", '!Campos Vacios');
        }
    });


    function validarLogin() {
        if ($('#idPass').val().length > 0
                && $('#idUser').val().length > 0) {
            return true;
        }
    }
</script>
<!--<form>
  <div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
  </div>
</form>-->



