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
            $sql = $con->prepare("INSERT INTO MATERIA_PRIMA(NOME, IMAGEM, QTD_TOTAL, MATERIA_PRIMA_TIPO_ID_MATERIA_PRIMA_TIPO) VALUES (?,?,?,?)");
            $sql->bind_param('ssii', $materia->nome, $materia->imagem, $materia->quantidade, $materia->tipo);
            if ($sql->execute())
                echo "cadastrou";
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function montarCombo() {
        global $con;
        $ops = "";
        try {
            $sql = $con->prepare("SELECT ID_MATERIA_PRIMA, NOME, QTD_TOTAL FROM MATERIA_PRIMA WHERE QTD_TOTAL > 0");
            $sql->execute();
            $sql->bind_result($id, $nome, $qtd);
            while ($sql->fetch()) {
                $ops .= "<option value='" . $id . "'>" . $nome . " - Quantidade total: " . $qtd . "</option>";
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
            $sql = $con->prepare("SELECT ID_MATERIA_PRIMA, NOME, IMAGEM, QTD_TOTAL FROM MATERIA_PRIMA");
            $sql->execute();
            $sql->bind_result($id, $nome, $imagem, $qtd_total);
            $dados = "<tr>"
                    . "<th>Imagem</th>"
                    . "<th>Nome</th>"
                    . "<th>Quantidade disponivel</th>"
                    . "</tr>";
            while ($sql->fetch()) {
                $dados .= "<tr>"
                        . "<td><img src='../imagens/" . $imagem . "'width='120' height='80'/>  </td>"
                        . "<td>" . $nome . "  </td>"
                        . "<td>" . $qtd_total . "  </td>"
                        . "</tr>";
            }
            $dados .= "";
            echo $dados;
        } catch (Exception $ex) {
            
        }
    }

    function exibir_thumb() {
        global $con;

        try {
            $sql = $con->prepare("SELECT ID_MATERIA_PRIMA, NOME, IMAGEM, QTD_TOTAL FROM MATERIA_PRIMA");
            $sql->execute();
            $sql->bind_result($id, $nome, $imagem, $qtd_total);

            while ($sql->fetch()) {
                $dados .= "<div class='col-lg-2 col-sm-4 col-xs-6' ><a title='" . $nome . "' href='#'><img class='thumbnail img-responsive' src='../imagens/" . $imagem . "'></a></div>";

               // echo $dados;
            }

            echo $dados;
        } catch (Exception $ex) {
            
        }
    }

}
