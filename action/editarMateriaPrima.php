<?php

include '../includes/conexao.inc.php';
include '../dao/materiaPrimaDAO.php';


$id = $_GET['ID_MATERIA_PRIMA'];

$mDAO = new materiaPrimaDAO();

$mDAO->buscarPorId($id);
