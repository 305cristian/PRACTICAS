
<?php $rol = $this->session->userdata('rol') ?> 
<?php $nombreUser = $this->session->userdata('nombre') ?> 
<?php $apellidoUser = $this->session->userdata('apellido') ?> 

<style>
    .titulo{
        font-size: 26px;
        padding: 0;
    }

    #subMenu a{
        display: block;
        color: white;
        text-decoration: none;


    }
    #subMenu a:hover{
        display: block;
        font-weight: bold;
        text-decoration: none;
        background: white;
        color: darkgray;

    }

   
    #menu li a{
        display: block;
        color: white;

    }
    #menu li a:hover{
        display: block;
        color: white;
        background: gray;
        opacity: 1;

    }
    #menu li a:focus{
        display: block;
        color: white;
        background: gray;
        opacity: 0.5;
    }


    .support:hover{
        font-weight: bold;
    }

    .fa-headset{
        color: white;
    }
    .fa-user{
        color: white;
    }


</style>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="text-white font-weight-bold ">
            <!--<img class="navbar-brand" width="130" height="50" src="img/logo2.png">-->
            <a class="titulo nav-link text-white" href="<?php echo base_url(); ?>opciones_controller">CAPACITACION PREINGRESO</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-5" id="menu">
                <?php if ($rol === '1'): ?>
                    <li class="nav-item active">
                        <a class="nav-link " href="<?php echo base_url(); ?>opciones_controller">Home <span class="sr-only">(current)</span></a>
                    </li>
                <?php endif; ?>
                <?php if ($rol === '1'): ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url() ?>Usu_controller">Usuarios</a>
                    </li>
                <?php endif; ?>
                <?php if ($rol === '1'): ?>
                    <li class="nav-item">
                        <a class="nav-link " href="<?php echo base_url() ?>tar_controller">Tareas</a>
                    </li>
                <?php endif; ?>
                <?php if ($rol === '1'): ?>
                    <li class="nav-item">
                        <a id="idAprobados" class="nav-link " href="#">Resultados</a>
                    </li>
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="fas fa-headset fa-2x"></li>
                <a class="nav-link support text-white mr-4" href="" data-toggle="modal" data-target="#modalSoporte">Soporte</a>                

                <li class="fa fa-user fa-2x "></li>
                <li class="nav-item dropdown show">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expand="true" aria-haspopup="true"><span class="text-white"><?= $nombreUser . ' ' ?></span><span class="text-white"><?= $apellidoUser ?></span></a>

                    <div class="dropdown-menu navbar-light bg-dark " id="subMenu">
                        <?php if ($rol === '1'): ?>
                            <a id="idAprobados2" class=" dropdown-item " href="#">Resultados</a>                               
                        <?php endif; ?>

                        <?php if ($rol === '1'): ?>
                            <a class=" dropdown-item" href="<?php echo base_url() ?>Usu_controller">Usuarios</a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a class=" dropdown-item" href="<?php echo base_url(); ?>Login_controller/logout">LogOut</a> 
                    </div>

                </li>

            </ul>
        </div>
    </nav>

</header>
