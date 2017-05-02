<?php
include "../template/header.php";
include "../includes/conexao.inc.php";
include '../dao/produtoCriacaoDAO.php';



    $codigo = $_GET['codigo'];
    $acoes = new produtoCriacaoDAO();
?>
<table class="table table-hover">

    <?php
    echo $acoes->mostrarMateriaPrimaUsada($codigo);
    ?>
</table>

<?php
include "../template/footer.php";
?>
    