<?php include "../template/header.php"; ?>
<?php

include '../dao/estampaDAO.php';
include '../includes/conexao.inc.php';
include '../class/estampa.class.php';

$nome = $_POST["nome"];
if (!empty($_POST)) {
    if (isset($nome)) {

        $eDAO = new estampaDAO();

        $estampa = new estampa("", $nome);
        $eDAO->cadastrarEstampa($estampa);
        ?>
        <?php

        include "../template/footer.php";
        ?>
        <script>
            $(document).ready(function () {
                swal({
                    title: "Estampa cadastrada com sucesso",
                    text: "Clique em Ok para voltar",
                    type: "success"
                },
                        function () {
                            window.location.href = '../view/cad_estampa.php';
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
    