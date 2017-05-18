<?php
include "../template/header.php";
if ($_SESSION["tipo_usuario"] == 1) {
    include '../includes/conexao.inc.php';
    include '../dao/materiaPrimaDAO.php';
    $acoes = new materiaPrimaDAO();
    ?>
    <div class="container">
        <div class="table-responsive">
            <table id="employee_data" class="table table-striped table-bordered">

                <?php echo $acoes->exibir(); ?>


            </table>
        </div>
    </div>
    <?php
    include "../template/footer.php";
} else {
    echo 'area restrita';
}




