<?php 
require_once './../dao/MusicaDAO.php';

session_start();
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    if (MusicaDAO::buscarMusicaPorId($id)) {
        MusicaDAO::excluirMusica($id);
        $_SESSION['sucesso'] = "Música excluída com sucesso!";
        header('Location: ../views/formulario.php');
    } else {
        $_SESSION['erro'] = "Essa música não existe ou já foi excluída.";
        header('Location: ../views/formulario.php');
    }
} else {
    $_SESSION['erro'] = "ID da música não fornecido.";
    header('Location: ../views/formulario.php');
}