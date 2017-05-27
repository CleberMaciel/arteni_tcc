<?php

include "../template/header.php";
if (isset($_POST["acao"])) {
    include '../includes/conexao.inc.php';
    include '../class/produtoCriacao.class.php';
    include '../dao/produtoCriacaoDAO.php';
    include '../dao/materiaPrimaDAO.php';
    include "../template/footer.php";
    $nome = $_POST["nome"];
    $largura = $_POST["largura"];
    $altura = $_POST["altura"];
    $profundidade = $_POST["profundidade"];
    $codigo = $_POST["codigo"];

    $atualizar = new materiaPrimaDAO();
    $acoes = new produtoCriacaoDAO();

    foreach ($_POST['materiaPrima'] as $k => $m) {
        $q = $_POST['quantidade'][$k];
        $produto = new produtoCriacao("", $nome, $largura, $altura, $profundidade, $m, $q, $codigo);
        $acoes->cadastrarProduto($produto);
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



