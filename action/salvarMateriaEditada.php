<?php

include '../dao/materiaPrimaDAO.php';
include '../includes/conexao.inc.php';
include '../class/materiaPrima.class.php';
include_once '../wideimage/lib/WideImage.php';

$id = $_GET["ID_MATERIA_PRIMA"];
$nome = $_POST['nome'];
$imagem = $_FILES["imagem"];
$quantidade = $_POST["quantidade"];
$tipo = $_POST["materiaPrimaTipo"];
$estampa = $_POST["estampa"];

preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
$caminho_imagem = "../imagens/";


//WideImage::loadFromUpload('imagem')->resize(null, null, null, 15)->saveToFile($caminho_imagem . $nome_imagem, 20);
WideImage::loadFromUpload('imagem')->saveToFile($caminho_imagem . $nome_imagem, 5);

$mpDAO = new materiaPrimaDAO();
$mp = new materiaPrima($id, $nome, $tipo, $nome_imagem, $quantidade, $estampa);
$mpDAO->atualizarMateria($mp);
var_dump($id);
