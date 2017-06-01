<?php
session_start();
//define('BASE_URL', 'http://clebermaciel.online/arteni');
define('BASE_URL', 'http://localhost/arteni_tcc');
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="................">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">-->
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>ArteNi</title>
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>/icon/favicon.ico" />
    <link href="<?php echo BASE_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/estilo.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/login.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/dataTables.bootstrap.min.css"rel="stylesheet"/> 
    <link href="<?php echo BASE_URL; ?>/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/sweetalert.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/bootstrap-select.css" rel="stylesheet">
</head>

    <header>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand"  href="<?php echo BASE_URL; ?>/index.php"><img style="max-width:80px; margin-top: -12px;" src="<?php echo BASE_URL; ?>/img/logo/logo.png"></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo BASE_URL; ?>/index.php"id="colors">Pagina Inicial</a></li>
                        <li><a href="<?php echo BASE_URL; ?>/view/ver_galeria.php" id="colors">Galeria de Material</a></li>
                        <?php if ($_SESSION["tipo_usuario"] == 1) { ?>
                            <li class="dropdown">
                                <a class="dropdown-toggle" id="colors" data-toggle="dropdown" href="#">Criação<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo BASE_URL; ?>/view/cad_prod_criacao.php" id="colors2">Criar Produto</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>/view/visualizar_prod_criacao.php"id="colors2">Lista de produtos</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo BASE_URL; ?>/view/cad_materiaPrima.php"id="colors2">Adicionar matéria-prima</a></li>
                                    <li><a href="<?php echo BASE_URL; ?>/view/ver_materia_prima.php"id="colors2">Listar matéria-prima</a></li>
                                    <li class="divider"></li>

                                    <li><a href="<?php echo BASE_URL; ?>/view/cad_estampa.php"id="colors2">Cadastrar estampa</a></li>

                                </ul>
                            </li>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="<?php echo BASE_URL; ?>/action/sair.php"id="colors">Sair</a></li>
                            </ul>
                        <?php } else { ?>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#" id="colors" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            </ul>

                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </header>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="loginmodal-container">
                    <h1>Entre com sua conta</h1><br>
                    <form method="POST" action="<?php echo BASE_URL; ?>/action/validarUsuario.php" name="formularioLogin">
                        <input type="text" name="user" id="user" placeholder="Usuario">
                        <input type="password" name="pass" id="pass" placeholder="Senha">
                        <input type="submit" name="acoes" class="login loginmodal-submit" value="Entrar">
                    </form>
                <?php }
                ?>
            </div>
        </div>
    </div>
<body>
    <div class="bg">