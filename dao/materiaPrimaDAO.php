<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaPrimaDAO
 *
 * @author krypton
 */
class materiaPrimaDAO {

    function cadastrarMateriaPrima($materia) {
        global $con;
        try {
            $sql = $con->prepare("INSERT INTO MATERIA_PRIMA(NOME, IMAGEM, QTD_TOTAL, MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO, ESTAMPA_ID_ESTAMPA) VALUES (?,?,?,?,?)");
            $sql->bind_param('ssiii', $materia->nome, $materia->imagem, $materia->quantidade, $materia->tipo, $materia->estampa);
            if ($sql->execute()) {
                echo '<script>alert("Matéria-Prima Salva com sucesso!");</script>';
                header("Refresh: 0; ../view/cad_materiaPrima.php");
            } else {
                echo '<script>alert("Não foi possível cadastrar!");</script>';
                header("Refresh: 0; ../view/cad_materiaPrima.php");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function montarCombo() {
        global $con;
        $ops = "";
        try {
            $sql = $con->prepare("SELECT MATERIA_PRIMA.ID_MATERIA_PRIMA, MATERIA_PRIMA.NOME, MATERIA_PRIMA.QTD_TOTAL, ESTAMPA.NOME AS ESTAMPA FROM MATERIA_PRIMA JOIN ESTAMPA ON MATERIA_PRIMA.ESTAMPA_ID_ESTAMPA = ESTAMPA.ID_ESTAMPA WHERE MATERIA_PRIMA.QTD_TOTAL > 0 ORDER BY ESTAMPA.NOME ASC");
            $sql->execute();
            $sql->bind_result($id, $nome, $qtd, $estampa);
            while ($sql->fetch()) {
                $ops .= "<option value='" . $id . "'>[".$estampa."] " . $nome . " - Quantidade total: " . $qtd . "</option>";
            }//while
            return $ops;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }//fim trycatch
    }

    function AtualizarQuantidade($quantidade, $id) {
        global $con;
//aqui vai variavel
        try {
            $sql = $con->prepare("UPDATE MATERIA_PRIMA SET QTD_TOTAL = QTD_TOTAL - ? WHERE ID_MATERIA_PRIMA = ?");
            $sql->bind_param("ii", $quantidade, $id);
            $sql->execute();
        } catch (Exception $ex) {
            echo "Erro: " . $ex->getMessage();
        }
    }

    function exibir() {
        global $con;

        try {
            $sql = ("SELECT MATERIA_PRIMA.ID_MATERIA_PRIMA, MATERIA_PRIMA.NOME, MATERIA_PRIMA.IMAGEM, MATERIA_PRIMA.QTD_TOTAL, ESTAMPA.NOME AS ESTAMPA FROM MATERIA_PRIMA JOIN ESTAMPA ON MATERIA_PRIMA.ESTAMPA_ID_ESTAMPA = ESTAMPA.ID_ESTAMPA");
            $result = mysqli_query($con, $sql);
            $dados = "<thead>"
                    . "<tr>"
                    . "<th>Codigo</th>"
                    . "<th>Estampa</th>"
                    . "<th>Imagem</th>"
                    . "<th>Nome</th>"
                    . "<th>Quantidade disponivel</th>"
                    . "<th>Funções</th>"
                    . "</tr>"
                    . "</thead>";


            while ($row = mysqli_fetch_array($result)) {
                $dados .= "<tr>"
                        . "<td>" . $row["ID_MATERIA_PRIMA"] . "  </td>"
                        . "<td>" . $row["ESTAMPA"] . "  </td>"
                        . "<td><img src='../imagens/" . $row["IMAGEM"] . "'width='120' height='80'/>  </td>"
                        . "<td>" . $row["NOME"] . "  </td>"
                        . "<td>" . $row["QTD_TOTAL"] . "  </td>"
                        . "<td>" . "<a href='../action/editarMateriaPrima.php?ID_MATERIA_PRIMA=" . $row["ID_MATERIA_PRIMA"] . "'>Editar </a></td>"
                        . "</tr>";
            }
            $dados .= "";
            echo $dados;
        } catch (Exception $ex) {
            
        }
    }

    //refatorado
    function exibir_thumb() {
        global $con;

        try {
            $sql = ("SELECT ID_MATERIA_PRIMA, NOME, IMAGEM, QTD_TOTAL FROM MATERIA_PRIMA ORDER BY NOME ASC");

            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $dados .= "<div class='col-lg-2 col-sm-4 col col-xs-6' ><a title='" . $row["NOME"] . "' href='#'><img class='thumbnail img-responsive lazy'  data-src='../imagens/" . $row["IMAGEM"] . "'></a>" . $row["NOME"] . "</div>";
            }
            echo $dados;
        } catch (Exception $ex) {
            
        }
    }

    function exibir_thumb2() {
        global $con;

        try {
            $sql = $con->prepare("SELECT ID_MATERIA_PRIMA, NOME, IMAGEM, QTD_TOTAL FROM MATERIA_PRIMA ORDER BY NOME ASC");
            $sql->execute();
            $sql->bind_result($id, $nome, $imagem, $qtd_total);

            while ($sql->fetch()) {
                $dados .= "<div class='col-lg-2 col-sm-4 col col-xs-6' ><a title='" . $nome . "' href='#'><img class='lazy thumbnail img-responsive ' src='../imagens/" . $imagem . "' data-size:'400:200'></a>$nome</div>";
            }

            echo $dados;
        } catch (Exception $ex) {
            
        }
    }

    function buscarPorId($id) {
        $id = $_GET['ID_MATERIA_PRIMA'];
        global $con;

        $ops = "";
        try {
            $sql = $con->query("SELECT MATERIA_PRIMA.ID_MATERIA_PRIMA, MATERIA_PRIMA.NOME, MATERIA_PRIMA.IMAGEM, MATERIA_PRIMA.QTD_TOTAL, MATERIA_PRIMA.MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO FROM MATERIA_PRIMA JOIN MATERIA_PRIMA_TIPO ON MATERIA_PRIMA.MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO = MATERIA_PRIMA_TIPO.ID_MATERIA_PRIMA_TIPO WHERE MATERIA_PRIMA.ID_MATERIA_PRIMA ='$id'");
            $linha = mysqli_fetch_array($sql);
            $nome = $linha["NOME"];
            $id = $linha["ID_MATERIA_PRIMA"];
            $imagem = $linha["IMAGEM"];
            $quantidade = $linha["QTD_TOTAL"];
            $materia_prima = $linha["MATERIA_PRIMA.MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO"];
            include "../template/header.php";
            // echo "<input type='text' name='cor_alter' value='" . $nome . "'required>";
            echo "<div class='container'>";
            echo "<div class = 'col-sm-4'>";

            echo "<form name = 'editarMateriaPrima' action = '../action/salvarMateriaPrima.php' method = 'POST' enctype = 'multipart/form-data'>";
            echo "<input type = 'text' name = 'nome' id = 'nome' placeholder = 'Nome da matéria-prima' required = 'TRUE' class = 'form-control' value = '" . $nome . "'/><br/>";
            echo "<input type = 'file' name = 'imagem' id = 'imagem' class = 'form-control form-control-file'/>";
            echo "<p class = 'help-block'>Selecione uma imagem para a matéria-prima se houver.</p>";
            echo "<input type = 'number' name = 'quantidade' id = 'quantidade' placeholder = 'Quantidade em estoque' class = 'form-control' min = '0' required = 'TRUE' value = '" . $quantidade . "'/><br/>";
            echo "<select name = 'materiaPrimaTipo' id = 'materiaPrimaTipo' class = 'form-control' required>";
            echo "<option selected> Selecione o tipo da materia prima </option >";
            include "../includes/conexao.inc.php";
            include "../dao/materiaPrimaTipoDAO.php";
            $materiaPrimaTipo = new materiaPrimaTipoDAO;
            echo $materiaPrimaTipo->montarCombo();

            echo "</select>";

            echo "</br>";
            echo "<input type = 'submit' name = 'acao' value = 'Salvar alteração' class = 'btn btn-success'/>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }//fim trycatch
    }

}
