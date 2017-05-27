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
                
            } else {
                $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    function montarCombo($variavel) {
        global $con;

        try {
            $sql = $con->prepare("SELECT ID_ESTAMPA, NOME FROM ESTAMPA");
            $sql->execute();
            $sql->bind_result($id, $nome);
            while ($sql->fetch()) {
                if ($variavel == $id) {
                    $ops .= "<option value ='" . $id . "'selected='selected' >" . $nome . "</option>";
                } else {

                    $ops .= "<option value ='" . $id . " '>" . $nome . "</option>";
                }
            }
            return $ops;
        } catch (Exception $e) {
            echo "Erro: " . $e->getMessage();
        }//fim trycatch
    }

}
