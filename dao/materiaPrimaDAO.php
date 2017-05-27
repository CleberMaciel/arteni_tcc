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
                
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function buscarDados($id) {
        global $con;
        try {
            $sql = "SELECT * FROM MATERIA_PRIMA WHERE ID_MATERIA_PRIMA = $id";
            if ($resultado = mysqli_query($con, $sql)) {
                while ($objeto = mysqli_fetch_object($resultado)) {
                    return $objeto;
                }
                mysqli_free_result($resultado);
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
                $ops .= "<option value='" . $id . "'>[" . $estampa . "] " . $nome . " - Quantidade total: " . $qtd . "</option>";
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
                        . "<td>" . "<a class='btn btn-primary' href='../view/editarMateria.php?ID_MATERIA_PRIMA=" . $row["ID_MATERIA_PRIMA"] . "' >Editar </a></td>"
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
        $dados ="";
        try {
            $sql = ("SELECT ID_MATERIA_PRIMA, NOME, IMAGEM, QTD_TOTAL FROM MATERIA_PRIMA ORDER BY NOME ASC");
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $dados .= "<div class='col-lg-2 col-sm-4 col col-xs-6' ><a title='" . $row["NOME"] . "' ><img class='thumbnail img-responsive lazy'  data-src='../imagens/" . $row["IMAGEM"] . "'></a>" . $row["NOME"] . "</div>";
            }
            echo $dados;
        } catch (Exception $ex) {
            
        }
    }

    function atualizarMateria($materia) {
        global $con;

        $sql = $con->prepare("UPDATE MATERIA_PRIMA SET NOME = ?, IMAGEM = ?,  QTD_TOTAL = ? MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO = ?, ESTAMPA_ID_ESTAMPA = ? WHERE ID_MATERIA_PRIMA = ?");
        $sql->bind_param('ssiiii', $materia->nome, $materia->imagem, $materia->quantidade, $materia->tipo, $materia->estampa, $materia->id);

        if ($sql->execute()) {
            echo '<script>alert("Matéria-Prima Editada com sucesso!");</script>';
            header("Refresh: 0; ../view/ver_materia_prima.php");
        } else {
            echo '<script>alert("Erro ao Editar!");</script>';
            hheader("Refresh: 0; ../view/ver_materia_prima.php");
        }
    }

}
