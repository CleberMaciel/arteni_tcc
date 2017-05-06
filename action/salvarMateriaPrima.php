<?php

include '../dao/materiaPrimaDAO.php';
include '../includes/conexao.inc.php';
include '../class/materiaPrima.class.php';

$nome = $_POST['nome'];
$imagem = $_FILES["imagem"];
$quantidade = $_POST["quantidade"];
$tipo = $_POST["materiaPrimaTipo"];

preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);

$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
$caminho_imagem = "../imagens/" . $nome_imagem;
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

$mpDAO = new materiaPrimaDAO();
$mp = new materiaPrima("", $nome, $tipo, $nome_imagem, $quantidade);

$mpDAO->cadastrarMateriaPrima($mp);
