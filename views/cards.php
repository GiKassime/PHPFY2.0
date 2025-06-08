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
                Gerencias Músicas
            </a>
        </div>
    </nav>
    <main class="container mx-auto flex-grow flex flex-col items-center py-10">
        <h1 class="font-bold text-center mb-8 text-3xl md:text-4xl drop-shadow-lg tracking-wide">
            Todas as Músicas
        </h1>
        <!-- Cards de músicas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 w-full max-w-6xl">
            <!-- Card exemplo 1 -->
            <div class="bg-white/10 rounded-xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition">
                <div class="w-32 h-32 bg-white/20 rounded-lg mb-4 flex items-center justify-center overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=facearea&w=256&q=80" alt="Capa da música" class="object-cover w-full h-full">
                </div>
                <h2 class="font-bold text-xl text-white mb-1 text-center">Shape of You</h2>
                <p class="text-[var(--texto-secundario)] text-sm mb-2 text-center">Ed Sheeran</p>
                <div class="flex flex-wrap gap-2 justify-center mb-2">
                    <span class="px-2 py-1 rounded-full bg-[var(--cor2)]/80 text-xs font-semibold">Pop</span>
                    <span class="px-2 py-1 rounded-full bg-[var(--cor3)]/80 text-xs font-semibold">Inglês</span>
                    <span class="px-2 py-1 rounded-full bg-white/20 text-xs font-semibold">3:54 min</span>
                </div>
                <button class="mt-2 px-4 py-1 rounded-full bg-[var(--cor1)] text-white hover:bg-[var(--cor3)] transition text-sm font-semibold">
                    Ver detalhes
                </button>
            </div>
        </div>
    </main>
    <footer class="text-center py-4 mt-auto bg-white/10 text-[var(--texto-principal)] text-base tracking-wide">
        Projeto Phpfy © 2025
    </footer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>