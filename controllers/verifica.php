<?php 
ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);

require_once "./../dao/MusicaDAO.php";
require_once "./../utils/Conexao.php";
$musicaDAO = new MusicaDAO();
$msgErro = "";

if (isset($_POST['titulo'])) {
    $titulo = trim($_POST['titulo']);
    $artista = trim($_POST['artista']);
    $genero = trim($_POST['genero']);
    $idioma = trim($_POST['idioma']);
    $duracao = (int)$_POST['duracao'];
    $imagem = trim($_POST['imagem']);

    // Validações
    $erros = [];
    
    if (empty($titulo)) {
        $erros[] = "O campo título é obrigatório.";
    } else if (strlen($titulo) < 3 || strlen($titulo) > 50) {
        $erros[] = "O campo título deve ter entre 3 e 50 caracteres.";
    }else if ($musicaDAO->buscarMusicaPorNome($titulo)) {
        $erros[] = "Já existe uma música cadastrada com esse título.";
    }

    if (empty($artista)) {
        $erros[] = "O campo artista é obrigatório.";
    }

    if (empty($genero)) {
        $erros[] = "O campo gênero é obrigatório.";
    }

    if (empty($idioma)) {
        $erros[] = "O campo idioma é obrigatório.";
    }

    if (empty($duracao)) {
        $erros[] = "O campo duração é obrigatório.";
    }else if ($duracao <= 0) {
        $erros[] = "O campo duração deve ser maior que zero.";
    }

    if (empty($imagem)) {
        $erros[] = "O campo URL da imagem é obrigatório.";
    }

    if (empty($erros)) {
        try {
            // Cria o objeto Musica
            $musica = new Musica($titulo, $artista, $genero, $idioma, $duracao, $imagem);
            // Usa o DAO para inserir
            if ($musicaDAO->adicionarMusica($musica)) {
                session_start();
                $_SESSION['sucesso'] = "Música cadastrada com sucesso!";                
                header('Location: ../views/formulario.php');
                exit;
            } else {
                $msgErro = "Erro ao cadastrar música no banco de dados.";
            }
        } catch(Exception $e) {
            $msgErro = "Erro no sistema: " . $e->getMessage();
        }
    } else {
        $msgErro = implode("<br>", $erros);
    }
}

// Se houve erro, redireciona com mensagem pra session ali q criei só pra isso pq n queria deixar tudo no msm arquivo
if (!empty($msgErro)) {
    session_start();
    $_SESSION['dadosNaoSalvos'] = $_POST; // achei isso massa porque é uma maneira de manter os dados do post
    $_SESSION['erro'] = $msgErro;
    header('Location: ../views/formulario.php?');
    exit;
}
?>