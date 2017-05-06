<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materiaPrima
 *
 * @author krypton
 */
class materiaPrima {

    //put your code here
    private $id;
    private $nome;
    private $tipo;
    private $imagem;
    private $quantidade;

    function __construct($id, $nome, $tipo, $imagem, $quantidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->imagem = $imagem;
        $this->quantidade = $quantidade;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}
