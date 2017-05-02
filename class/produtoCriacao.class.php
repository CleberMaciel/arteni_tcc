<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of produto
 *
 * @author krypton
 */
class produtoCriacao {

    private $id;
    private $nome;
    private $largura;
    private $altura;
    private $profundidade;
    private $materiaPrima;
    private $qtd_usada;
    private $codigo;

    function __construct($id, $nome, $largura, $altura, $profundidade, $materiaPrima, $qtd_usada, $codigo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->largura = $largura;
        $this->altura = $altura;
        $this->profundidade = $profundidade;
        $this->materiaPrima = $materiaPrima;
        $this->qtd_usada = $qtd_usada;
        $this->codigo = $codigo;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}
