<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class estampaDAO {

    function cadastrarEstampa($estampa) {
        global $con;

        try {
            $sql = $con->prepare("INSERT INTO ESTAMPA(NOME) VALUES (?)");
            $sql->bind_param('s', $estampa->nome);
            if ($sql->execute()) {
                echo '<script>alert("Estampa salva com sucesso!");</script>';
                header("Refresh: 0; ../view/cad_estampa.php");
            } else {
                echo '<script>alert("Não foi possível cadastrar!");</script>';
                header("Refresh: 0; ../view/cad_estampa.php");
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function montarCombo() {
        global $con;
        $ops = "";
        try {
            $sql = $con->prepare("SELECT ID_ESTAMPA, NOME FROM ESTAMPA");
            $sql->execute();
            $sql->bind_result($id, $nome);
            while ($sql->fetch()) {
                $ops .= "<option value='" . $id . "'>" . $nome . "</option>";
            }//while
            return $ops;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }//fim trycatch
    }

}
