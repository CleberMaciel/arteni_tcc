<?php
//define('BASE_URL', 'http://clebermaciel.online/arteni');
define('BASE_URL', 'http://localhost/arteni_tcc');
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="................">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>ArteNi</title>
    <link href="<?php echo BASE_URL; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/estilo.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/css/login.css" rel="stylesheet">
</head>
<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand"  href="<?php echo BASE_URL; ?>/index.php"><img style="max-width:80px; margin-top: -12px;" src="<?php echo BASE_URL; ?>/img/logo/logo.png"></a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo BASE_URL; ?>/index.php" id="colors">Página Principal</a></li>
                     <li><a href="<?php echo BASE_URL; ?>/view/ver_materia_prima_2.php" id="colors">Galeria de Material</a></li>
                    <!--inicia drop-->
                    <li class="dropdown">
                        <a class="dropdown-toggle" id="colors" data-toggle="dropdown" href="#">Criação<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo BASE_URL; ?>/view/cad_prod_criacao.php">Criar Produto</a></li>
                            <li><a href="<?php echo BASE_URL; ?>/view/visualizar_prod_criacao.php">Lista de Produtos</a></li>
                            <li class="divider"></li>
                            <li><a href="<?php echo BASE_URL; ?>/view/cad_materiaPrima.php">Adicionar Matéria-prima</a></li>
                            <li><a href="<?php echo BASE_URL; ?>/view/ver_materia_prima.php">Ver matéria-prima</a></li>
                        </ul>
                    </li>
                    <!--fecha drop-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" id="colors" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                <h1>Entre com sua conta</h1><br>
                <form>
                    <input type="text" name="user" placeholder="Usuario">
                    <input type="password" name="pass" placeholder="Senha">
                    <input type="submit" name="login" class="login loginmodal-submit" value="Entrar">
                </form>
            </div>
        </div>
    </div>
