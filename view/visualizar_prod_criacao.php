<?php
include "../template/header.php";

if ($_SESSION["tipo_usuario"] == 1) {

    include "../includes/conexao.inc.php";
    include '../dao/produtoCriacaoDAO.php';
    $acoes = new produtoCriacaoDAO();
    ?>
    <table class="table table-hover">
        <?php echo $acoes->mostrar(); ?>
    </table>

    <?php
} else {
    echo "area restrita";
}
include "../template/footer.php";
