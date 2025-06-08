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
        <form class="w-full max-w-lg bg-white/10 rounded-xl p-6 mb-10 shadow-lg flex flex-col gap-4">
            <div>
                <label for="titulo" class="block mb-1 text-white font-semibold">Título</label>
                <input type="text" id="titulo" name="titulo" required
                    placeholder="Ex: Shape of You"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
            </div>
            <div>
                <label for="artista" class="block mb-1 text-white font-semibold">Artista</label>
                <input type="text" id="artista" name="artista" required
                    placeholder="Ex: Ed Sheeran"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
            </div>
            <div>
                <label for="genero" class="block mb-1 text-white font-semibold">Gênero</label>
                <select id="genero" name="genero" required
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
                    <option value="" disabled selected>Selecione o gênero</option>
                    <option value="P">Pop</option>
                    <option value="R">Rock</option>
                    <option value="S">Sertanejo</option>
                    <option value="E">Eletrônica</option>
                    <option value="O">Outro</option>
                </select>
            </div>
            <div>
                <label for="idioma" class="block mb-1 text-white font-semibold">Idioma</label>
                <select id="idioma" name="idioma" required
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
                    <option value="" disabled selected>Selecione o idioma</option>
                    <option value="P">Português</option>
                    <option value="I">Inglês</option>
                    <option value="E">Espanhol</option>
                    <option value="F">Francês</option>
                    <option value="O">Outro</option>
                </select>
            </div>
            <div>
                <label for="duracao" class="block mb-1 text-white font-semibold">Duração (minutos)</label>
                <input type="number" id="duracao" name="duracao" min="1" max="30" required
                    placeholder="Ex: 4"
                    class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
            </div>
            <div>
        <label for="imagem" class="block mb-1 text-white font-semibold">URL da Imagem</label>
        <input type="url" id="imagem" name="imagem" placeholder="https://exemplo.com/imagem.jpg"
            class="w-full px-4 py-2 rounded-lg bg-white/80 text-black focus:outline-none focus:ring-2 focus:ring-[var(--cor2)]">
    </div>
            <button type="submit"
                class="mt-2 px-6 py-2 rounded-full font-bold bg-[var(--cor2)] text-white hover:bg-[var(--cor1)] transition">
                Adicionar Música
            </button>
        </form>

        <section class="w-full max-w-2xl">
            <h2 class="text-2xl font-semibold mb-4 text-white">Músicas cadastradas</h2>
            <ul class="space-y-3">
                <li class="bg-white/10 rounded-lg px-4 py-3 flex flex-col md:flex-row md:items-center md:justify-between">
                    <span class="font-bold">Shape of You</span>
                    <span class="text-sm text-[var(--texto-secundario)]">Ed Sheeran • Pop</span>
                </li>
            </ul>
        </section>
    </main>
    <footer class="text-center py-4 mt-auto bg-white/10 text-[var(--texto-principal)] text-base tracking-wide">
        Projeto Phpfy © 2025
    </footer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>
</html>