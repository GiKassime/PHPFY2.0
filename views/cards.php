<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Músicas | Phpfy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="flex flex-col min-h-screen text-white">
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
            $matriz = MusicaDAO::listarMusicas();
            if (!$matriz || count($matriz) === 0) {
                echo '<p class="text-[var(--texto-secundario)] col-span-3">Nenhuma música cadastrada ainda.</p>';
            } else {
                foreach ($matriz as $i => $musica) {
                    // Tradução do gênero
                    switch ($musica['genero'] ?? '') {
                        case 'P': $genero = "Pop"; break;
                        case 'R': $genero = "Rock"; break;
                        case 'S': $genero = "Sertanejo"; break;
                        case 'E': $genero = "Eletrônica"; break;
                        case 'O': $genero = "Outro"; break;
                        default:  $genero = "N/A"; break;
                    }
                    // Tradução do idioma
                    switch ($musica['idioma'] ?? '') {
                        case 'P': $idioma = "Português"; break;
                        case 'I': $idioma = "Inglês"; break;
                        case 'E': $idioma = "Espanhol"; break;
                        case 'F': $idioma = "Francês"; break;
                        case 'O': $idioma = "Outro"; break;
                        default:  $idioma = "N/A"; break;
                    }
                    echo "
                    <div class='bg-white/10 rounded-xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition'>
                        <div class='w-32 h-32 bg-white/20 rounded-lg mb-4 flex items-center justify-center overflow-hidden'>
                            <img src='" . htmlspecialchars($musica['imagem_url'] ?? '') . "' alt='Capa da música' class='object-cover w-full h-full'>
                        </div>
                        <h2 class='font-bold text-xl text-white mb-1 text-center'>" . ($i+1) . " - " . htmlspecialchars($musica['titulo'] ?? '') . "</h2>
                        <p class='text-[var(--texto-secundario)] text-sm mb-2 text-center'>" . htmlspecialchars($musica['artista'] ?? '') . "</p>
                        <div class='flex flex-wrap gap-2 justify-center mb-2'>
                            <span class='px-2 py-1 rounded-full bg-[var(--cor2)]/80 text-xs font-semibold'>{$genero}</span>
                            <span class='px-2 py-1 rounded-full bg-[var(--cor3)]/80 text-xs font-semibold'>{$idioma}</span>
                            <span class='px-2 py-1 rounded-full bg-white/20 text-xs font-semibold'>" . htmlspecialchars($musica['duracao'] ?? '') . " min</span>
                        </div>
                       
                    </div>
                    ";
                }
            }
            ?>
        </div>
    </main>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>