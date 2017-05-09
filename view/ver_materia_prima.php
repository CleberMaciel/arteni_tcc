<?php
include "../template/header.php";
if ($_SESSION["tipo_usuario"] == 1) {
    include '../includes/conexao.inc.php';
    include '../dao/materiaPrimaDAO.php';
    $acoes = new materiaPrimaDAO();
    ?>
    <table class="table table-hover">
        <?php echo $acoes->exibir(); ?>
    </table>

    <?php
} else {
    echo 'area restrita';
}
include "../template/footer.php";
?>


