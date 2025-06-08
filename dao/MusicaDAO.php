<?php 
require_once './../models/Musica.php';
require_once './../utils/Conexao.php';

class MusicaDAO {

    public static function adicionarMusica(Musica $musica) {
        $conexao = Conexao::getConexao();
        $sql = "INSERT INTO musicas (titulo, artista, genero, idioma, duracao, imagem_url) VALUES (?, ?, ?, ?, ?, ?)";
        
        $stm = $conexao->prepare($sql);
        
        return $stm->execute(array(
            $musica->getTitulo(), 
            $musica->getArtista(), 
            $musica->getGenero(), 
            $musica->getIdioma(), 
            $musica->getDuracao(), 
            $musica->getImagemUrl()
        ));
    }

    public static function listarMusicas() {
        $conexao = Conexao::getConexao();
        $sql = "SELECT * FROM musicas";
        
        $stm = $conexao->prepare($sql);
        $stm->execute();
        
        return $stm->fetchAll();
    }

    public static function buscarMusicaPorId($id) {
        $conexao = Conexao::getConexao();
        $sql = "SELECT * FROM musicas WHERE id = ?";
        
        $stm = $conexao->prepare($sql);
        $stm->execute([$id]);
        
        return $stm->fetchObject();
    }
    public static function buscarMusicaPorNome($nome) {
        $conexao = Conexao::getConexao();
        $sql = "SELECT * FROM musicas WHERE titulo = ?";
        
        $stm = $conexao->prepare($sql);
        $stm->execute([$nome]);
        
        return $stm->fetchObject();
    }


    public static function excluirMusica($id) {
        $conexao = Conexao::getConexao();
        $sql = "DELETE FROM musicas WHERE id = ?";
        
        $stm = $conexao->prepare($sql);
        return $stm->execute([$id]);
    } 
}  


