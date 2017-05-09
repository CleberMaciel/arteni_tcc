<?php
session_start();
include "../template/header.php";

include "../includes/conexao.inc.php";
include '../dao/produtoCriacaoDAO.php';
$acoes = new produtoCriacaoDAO();
?>
<table class="table table-hover">
    <?php echo $acoes->mostrar(); ?>
</table>
<?php
include "../template/footer.php";
?>