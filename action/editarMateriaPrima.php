<?php

include '../includes/conexao.inc.php';
include '../dao/materiaPrimaDAO.php';
include '../class/mateiraPrima.class.php';

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
$id = $_GET['ID_MATERIA_PRIMA'];

$mDAO = new materiaPrimaDAO();
$dados = $mDAO->buscarDados($id);

echo $dados->NOME;


