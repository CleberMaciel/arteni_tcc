<?php
include "../template/header.php";

if ($_SESSION["tipo_usuario"] == 1) {

    include "../includes/conexao.inc.php";
    include '../dao/produtoCriacaoDAO.php';
    $acoes = new produtoCriacaoDAO();
    ?>
    <div class="container">
        <table class="table table-hover">
            <?php echo $acoes->mostrar(); ?>
        </table>
    </div>
    <?php
} else {
    echo "area restrita";
}
include "../template/footer.php";
