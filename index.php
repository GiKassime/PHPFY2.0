<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phpfy Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body class="flex flex-col min-h-screen text-white" style="background: var(--cor1);">
    <main class="container mx-auto flex-grow flex flex-col items-center justify-center py-10">
        <img src="./assets/images/PHPfy.gif" alt="Logo animado"
            class=" mb-8 w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/4 max-w-xs">
        <h1 class="font-bold text-center mb-8 text-3xl md:text-4xl drop-shadow-lg tracking-wide">
            Bem-vindo(a)!
        </h1>
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 mb-10">
            <a href="./views/cards.php" class="px-8 py-3 text-lg font-semibold rounded-full border transition
                bg-[var(--cor1)] border-[var(--cor2)] text-white hover:bg-[var(--cor2)] hover:text-[var(--cor1)]">
                <i class="bi bi-music-note-beamed mr-2"></i> Músicas
            </a>
            <a href="./views/formulario.php" class="px-8 py-3 text-lg font-semibold rounded-full border transition
                bg-[var(--cor2)] border-[var(--cor1)] text-white hover:bg-[var(--cor1)] hover:text-[var(--cor2)]">
                <i class="bi bi-gear-fill mr-2"></i> Gerenciar Músicas
            </a>
        </div>
    </main>
  
    <!-- Bootstrap Icons CDN para os ícones -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</body>

</html>