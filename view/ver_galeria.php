<?php
include "../template/header.php";
include '../includes/conexao.inc.php';
include '../dao/materiaPrimaDAO.php';
$acoes = new materiaPrimaDAO();
?>

<div class="container">

    <div class="row">

        <?php echo $acoes->exibir_thumb(); ?>



    </div>
</div>

<div tabindex="-1" class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">×</button>
                <h3 class="modal-title">Heading</h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?php include "../template/footer.php"; ?>