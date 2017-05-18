<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of estampa
 *
 * @author krypton
 */
class estampa {

    private $id;
    private $nome;

    function __construct($id, $nome) {
        $this->id = $id;
        $this->nome = $nome;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}
