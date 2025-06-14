<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Músicas | Phpfy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="flex flex-col min-h-screen text-white">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_erros', 1);
    error_reporting(E_ALL);

    session_start();
    require_once "./../dao/MusicaDAO.php";

    // Recupera dados antigos do formulário, se existirem
    $dadosAntigos = $_SESSION['dadosNaoSalvos'] ?? [];
    unset($_SESSION['dadosNaoSalvos']);
    $musicaDAO = new MusicaDAO();
    $mensagem = "";
    $tipo = "";

    if (isset($_SESSION['erro'])) {
        $mensagem = $_SESSION['erro'];
        $tipo = "erro";
        unset($_SESSION['erro']);
    } elseif (isset($_SESSION['sucesso'])) {
        $mensagem = $_SESSION['sucesso'];
        $tipo = "sucesso";
        unset($_SESSION['sucesso']);
    }
    ?>
    <!-- NAVBAR -->
    <nav class="w-full px-4 flex items-center justify-between shadow max-h-20">
        <div class="flex-1 flex items-center">
            <a href="javascript:history.back()" class="flex items-center gap-1 text-white hover:text-[var(--cor3)] font-semibold transition">
                <i class="bi bi-arrow-left"></i>
                <span class="hidden sm:inline">Voltar</span>
            </a>
        </div>
        <!-- Logo centralizada -->
        <div class="flex-1 flex justify-center">
            <img src="../assets/images/PHPfy.gif" alt="Logo animada" class="h-32 w-auto" />
        </div>
        <!-- Links à direita -->
        <div class="flex-1 flex justify-end items-center gap-4">
            <a href="../index.php" class="text-white hover:text-[var(--cor3)] font-semibold transition">
                Início
            </a>
            <a href="./cards.php" class="text-white hover:text-[var(--cor3)] font-semibold transition">
                Músicas
            </a>
        </div>
    </nav>
    <main class="container mx-auto flex-grow flex flex-col items-center justify-center py-10">
        <h1 class="font-bold text-center mb-8 text-3xl md:text-4xl drop-shadow-lg tracking-wide">
            Adicionar Música
        </h1>
        <!-- Formulário de cadastro -->
        <form class="w-full max-w-lg bg-white/10 rounded-xl p-6 mb-10 shadow-lg flex flex-col gap-4" method="POST" action="./../utils/verifica.php">
            <div>
                <label for="titulo" class="block mb-1 text-white font-semibold">Título</label>
                <input type="text" id="titulo" name="titulo"
                    placeholder="Ex: Shape of You"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]"
                    value="<?= isset($dadosAntigos['titulo']) ? $dadosAntigos['titulo'] : '' ?>">
            </div>
            <div>
                <label for="artista" class="block mb-1 text-white font-semibold">Artista</label>
                <input type="text" id="artista" name="artista"
                    placeholder="Ex: Ed Sheeran"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]"
                    value="<?= isset($dadosAntigos['artista']) ? $dadosAntigos['artista'] : '' ?>">
            </div>
            <div>
                <label for="genero" class="block mb-1 text-white font-semibold">Gênero</label>
                <select id="genero" name="genero"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
                    <option value="" <?= empty($dadosAntigos['genero']) ? 'selected' : '' ?>>Selecione o gênero</option>
                    <option value="P" <?= (isset($dadosAntigos['genero']) && $dadosAntigos['genero'] == 'P') ? 'selected' : '' ?>>Pop</option>
                    <option value="R" <?= (isset($dadosAntigos['genero']) && $dadosAntigos['genero'] == 'R') ? 'selected' : '' ?>>Rock</option>
                    <option value="S" <?= (isset($dadosAntigos['genero']) && $dadosAntigos['genero'] == 'S') ? 'selected' : '' ?>>Sertanejo</option>
                    <option value="E" <?= (isset($dadosAntigos['genero']) && $dadosAntigos['genero'] == 'E') ? 'selected' : '' ?>>Eletrônica</option>
                    <option value="O" <?= (isset($dadosAntigos['genero']) && $dadosAntigos['genero'] == 'O') ? 'selected' : '' ?>>Outro</option>
                </select>
            </div>
            <div>
                <label for="idioma" class="block mb-1 text-white font-semibold">Idioma</label>
                <select id="idioma" name="idioma"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
                    <option value="" <?= empty($dadosAntigos['idioma']) ? 'selected' : '' ?>>Selecione o idioma</option>
                    <option value="P" <?= (isset($dadosAntigos['idioma']) && $dadosAntigos['idioma'] == 'P') ? 'selected' : '' ?>>Português</option>
                    <option value="I" <?= (isset($dadosAntigos['idioma']) && $dadosAntigos['idioma'] == 'I') ? 'selected' : '' ?>>Inglês</option>
                    <option value="E" <?= (isset($dadosAntigos['idioma']) && $dadosAntigos['idioma'] == 'E') ? 'selected' : '' ?>>Espanhol</option>
                    <option value="F" <?= (isset($dadosAntigos['idioma']) && $dadosAntigos['idioma'] == 'F') ? 'selected' : '' ?>>Francês</option>
                    <option value="O" <?= (isset($dadosAntigos['idioma']) && $dadosAntigos['idioma'] == 'O') ? 'selected' : '' ?>>Outro</option>
                </select>
            </div>
            <div>
                <label for="duracao" class="block mb-1 text-white font-semibold">Duração (minutos)</label>
                <input type="number" id="duracao" name="duracao"
                    placeholder="Ex: 4"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]"
                    value="<?= isset($dadosAntigos['duracao']) ? $dadosAntigos['duracao'] : '' ?>">
            </div>
            <div>
                <label for="imagem" class="block mb-1 text-white font-semibold">URL da Imagem</label>
                <input type="url" id="imagem" name="imagem" placeholder="https://exemplo.com/imagem.jpg"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]"
                    value="<?= isset($dadosAntigos['imagem']) ? $dadosAntigos['imagem'] : '' ?>">
            </div>
            <button type="submit"
                class="mt-2 px-6 py-2 rounded-full font-bold bg-[var(--cor2)] text-white hover:bg-[var(--cor1)] transition">
                Adicionar Música
            </button>
        </form>

        <section class="w-full max-w-6xl">

            <h2 class="text-2xl font-semibold mb-4 text-white">Músicas cadastradas</h2>
            <?php
            //Listar músicas
            $musicas =  $musicaDAO->listarMusicas();
            if (!$musicas || count($musicas) === 0) : ?>
                <p class="text-[var(--texto-secundario)]">Nenhuma música cadastrada ainda.</p>

            <?php else: ?>
                <table class="min-w-full divide-y divide-gray-700 bg-gray-800 text-white text-sm">
                    <thead class="bg-gray-900">
                        <tr>
                            <th class="px-4 py-3 text-left">Id</th>
                            <th class="px-4 py-3 text-left">Imagem</th>
                            <th class="px-4 py-3 text-left">Título</th>
                            <th class="px-4 py-3 text-left">Artista</th>
                            <th class="px-4 py-3 text-left">Gênero</th>
                            <th class="px-4 py-3 text-left">Idioma</th>
                            <th class="px-4 py-3 text-left">Duração</th>
                            <th class="px-4 py-3 text-left">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        <?php
                        foreach ($musicas as $i => $musica) {
                            echo $musica->criaLinha();
                        }
                        ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </section>
    </main>

    <?php if ($mensagem): ?>
        <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/40">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full text-black relative">
                <h2 class="text-xl font-bold mb-4 <?php echo $tipo === 'erro' ? 'text-red-600' : 'text-green-600'; ?>">
                    <?php echo $tipo === 'erro' ? 'Erro' : 'Sucesso'; ?>
                </h2>
                <p class="mb-4"><?php echo $mensagem; ?></p>
                <button onclick="document.getElementById('modal').classList.add('hidden')"
                    class="absolute top-2 right-2 text-gray-500 hover:text-red-500 text-2xl">&times;</button>
                <button onclick="document.getElementById('modal').classList.add('hidden')"
                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Fechar</button>
            </div>
        </div>
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>

</html>