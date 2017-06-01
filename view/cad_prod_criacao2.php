<?php
include "../template/header.php";
include '../dao/produtoCriacaoDAO.php';
include '../class/produtoCriacao.class.php';
include "../includes/conexao.inc.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$id = $_GET["codigo"];

$pDAO = new produtoCriacaoDAO();
$dados = $pDAO->buscarDadosCodigo($id);
$id_produto = $dados->ID_PRODUTO_CRIACAO;
echo $id_produto;
?>

<div class="container">
    <div class="col-sm-4">

        <div class="container">

            <div class="col-sm-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Altura (cm)</th>
                            <th>Largura (cm)</th>
                            <th>Profundidade (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $dados->CODIGO ?></td>
                            <td><?php echo $dados->NOME ?></td>
                            <td><?php echo $dados->ALTURA ?></td>
                            <td><?php echo $dados->LARGURA ?></td>
                            <td><?php echo $dados->PROFUNDIDADE ?></td>

                        </tr>
                    </tbody>
                </table>
                <form method="POST" action="../action/salvarProdutoMateria.php">

                    <input hidden="TRUE" value="<?php echo $dados->ID_PRODUTO_CRIACAO ?>" name="id_produto">

                    <a class="btn btn-primary" href="javascript:void(0)" id="addSelect">
                        Adicionar Matéria-Prima
                    </a>
                    <br>
                    <div id="campoDinamico">

                    </div><br>
                    <input type="submit" name="acao" value="Salvar" class="btn btn-success"/>
            </div>
            </form>
        </div>
    </div>

    <?php include "../template/footer.php"; ?>
    <script>
        $(function () {
            var scntDiv = $('#campoDinamico');
            $(document).on('click', '#addSelect', function () {
                $('<p>' +
                        '<select name="materiaPrima[]" id="materiaPrima" class="form-control" required>' +
                        '<option  disabled selected="">' +
                        'Escolha o tipo da materia prima' +
                        '</option>' +
                        "<?php
    include "../includes/conexao.inc.php";
    include "../dao/materiaPrimaDAO.php";
    $materiaPrima = new materiaPrimaDAO();
    echo $materiaPrima->montarCombo();
    ?>" +
                        '</select>' +
                        '<input type="number" name="quantidade[]" id="quantidade" placeholder="quantidade" class="form-control" pattern="^[0-9]{1,}$"/>' +
                        '<a class="btn btn-danger" href="javascript:void(0)" id="remSelect">' +
                        ' Remover campo' +
                        ' </a>  ' +
                        '</p>').appendTo(scntDiv);
                return false;
            });
            $(document).on('click', '#remSelect', function () {
                $(this).parents('p').remove();
                return false;
            });
        });
    </script>
</div>
</div>
</div>
<?php
include "../template/footer.php";
