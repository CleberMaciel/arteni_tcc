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
    private $codigo;

//    function __construct() {
//        $args = func_get_args();
//        $numberOfArgs = func_num_args();
//
//        if (method_exists($this, $funtion = '__construct' . $numberOfArgs)) {
//            call_user_func_array(array($this, $funtion), $args);
//        }
//    }

    function __construct($id, $nome, $largura, $altura, $profundidade, $codigo) {
        $this->id = $id;
        $this->nome = $nome;
        $this->largura = $largura;
        $this->altura = $altura;
        $this->profundidade = $profundidade;
        $this->codigo = $codigo;
    }

    function &__set($prop, $val) {
        $this->$prop = $val;
    }

    function&__get($prop) {
        return $this->$prop;
    }

}
