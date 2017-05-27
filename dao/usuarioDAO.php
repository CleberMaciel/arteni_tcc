<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDAO
 *
 * @author krypton
 */
class usuarioDAO {

    function validarUsuario($usuario) {
        global $con;
        try {

            $sql = $con->prepare("SELECT USUARIO.ID_USUARIO, USUARIO.TIPO_USUARIO_ID_TIPO_USUARIO, USUARIO.NOME FROM USUARIO JOIN  TIPO_USUARIO ON USUARIO.TIPO_USUARIO_ID_TIPO_USUARIO  = TIPO_USUARIO.ID_TIPO_USUARIO WHERE USUARIO.NOME = ? AND USUARIO.SENHA = ?");
            $sql->bind_param('ss', $usuario->nome, $usuario->senha);
            if ($sql->execute()) {
                $sql->bind_result($id_usuario, $id_tipo, $nome);
                $sql->fetch();
            }

            return $id_tipo;
        } catch (Exception $exc) {
            echo "ERRO" . $exc->getMessage();
        }
    }

}
