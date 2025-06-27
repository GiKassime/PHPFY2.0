<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Músicas | Phpfy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="flex flex-col min-h-screen text-white  bg-[var(--cor-cards)]">
    <canvas id="matrix-bg"></canvas>
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
            <a href="./formulario.php" class="text-white hover:text-[var(--cor3)] font-semibold transition">
                Gerenciar Músicas
            </a>
        </div>
    </nav>
    <main class="container mx-auto flex-grow flex flex-col items-center py-10">
        <h1 class="font-bold text-center mb-8 text-3xl md:text-4xl drop-shadow-lg tracking-wide">
            Todas as Músicas
        </h1>
        <!-- Cards de músicas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">
            <?php
            require_once './../dao/MusicaDAO.php';
            $musicas = new MusicaDAO();
            $musicas = $musicas->listarMusicas();
            if (!$musicas || count($musicas) === 0) {
                echo '<p class="text-[var(--texto-secundario)] col-span-3">Nenhuma música cadastrada ainda.</p>';
            } else {
                foreach ($musicas as $i => $musica) {
                    // Tradução do gênero
                    echo $musica->criaCard($i);
                }
            }
            ?>
        </div>
    </main>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="../assets/js/matrix.js"></script>
</body>
</html>