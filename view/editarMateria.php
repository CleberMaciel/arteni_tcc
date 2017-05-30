<?php
include "../template/header.php";

include "../includes/conexao.inc.php";
include "../dao/materiaPrimaDAO.php";
include "../class/materiaPrima.class.php";

$id = $_GET['ID_MATERIA_PRIMA'];

$mDAO = new materiaPrimaDAO();
$dados = $mDAO->buscarDados($id);
?>

<div class="container">
    <div class="col-sm-4">

        <form name="cadastroMateriaPrima" action="../action/salvarMateriaEditada.php"method="POST" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id ?>" name="idMateria" id="idMateria">
            <input type="text" name="nome" id="nome" placeholder="Nome da matéria-prima"  value="<?php echo $dados->NOME; ?>"required="TRUE" class="form-control"/><br/>
            <input type="file" name="imagem" id="imagem" value="<?php echo $dados->IMAGEM ?>" class="form-control form-control-file" required="TRUE"/>
            <p class="help-block">Selecione uma imagem para a matéria-prima se houver.</p>
            <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade adicional" value="<?php echo $dados->QTD_TOTAL; ?>"class="form-control" min="0" required="TRUE"/><br/>
            <select name = "materiaPrimaTipo" id = "materiaPrimaTipo" class = "form-control" required>
                <option disabled selected = ""> Selecione o tipo da materia prima </option>
                <?php
                include "../includes/conexao.inc.php";
                include "../dao/materiaPrimaTipoDAO.php";
                $materiaPrimaTipo = new materiaPrimaTipoDAO;
                $tipoId = $dados->MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO;
                echo $materiaPrimaTipo->montarCombo($tipoId);
                ?>
            </select>

            </br>

            <select name = "estampa" id = "estampa" class = "form-control" required>
                <option disabled selected = ""> Selecione a estampa</option>
                <?php
                include "../includes/conexao.inc.php";
                include "../dao/estampaDAO.php";
                $estampa = new estampaDAO();
                $estampaId = $dados->ESTAMPA_ID_ESTAMPA;
                echo $estampa->montarCombo($estampaId);
                ?>
            </select>

            </br>

            <input type="submit" name="acao" value="Salvar Edição" class="btn btn-success"/>
        </form>
    </div>
</div>


<?php include "../template/footer.php"; ?>

