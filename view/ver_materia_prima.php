<?php
include "../template/header.php";
include '../includes/conexao.inc.php';
include '../dao/materiaPrimaDAO.php';
$acoes = new materiaPrimaDAO();
?>
<table class="table table-hover">
    <?php echo $acoes->exibir(); ?>
</table>

<?php include "../template/footer.php"; ?>


