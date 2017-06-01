<?php

include "../template/header.php";
if (isset($_POST["acao"])) {
    include '../includes/conexao.inc.php';
    include '../class/produtoMateria.class.php';
    include '../dao/produtoMateriaDAO.php';
    include '../dao/materiaPrimaDAO.php';
    include "../template/footer.php";


    $atualizar = new materiaPrimaDAO();

    $id_produto = $_POST["id_produto"];

    $acoes = new produtoMateriaDAO();
    foreach ($_POST['materiaPrima'] as $k => $m) {
        $q = $_POST['quantidade'][$k];
        $pm = new produtoMateria($id_produto, $m, $q);
        $acoes->cadastro($pm);
        $atualizar->AtualizarQuantidade($q, $m);
    }
    ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "Produto cadastrado com sucesso",
                text: "Clique em Ok para voltar",
                type: "success"
            },
                    function () {
                        window.location.href = '../view/cad_prod_criacao.php';
                    });
        });
    </script>
    <?php

} else {
    ?>
    <script>
        $(document).ready(function () {
            swal({
                title: "Erro ao cadastradar",
                text: "Clique em Ok para voltar",
                type: "error"
            },
                    function () {
                        window.location.href = '../view/cad_estampa.php';
                    });
        });
    </script>
    <?php

}