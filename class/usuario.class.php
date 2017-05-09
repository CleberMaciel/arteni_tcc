<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author krypton
 */
class usuario {

    private $id;
    private $nome;
    private $senha;

    function __construct($id, $nome, $senha) {
        $this->id = $id;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}
