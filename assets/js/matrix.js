// Inicializa o canvas
var canvas = document.getElementById('matrix-bg') || document.querySelector('canvas');
var ctx = canvas.getContext('2d');

// Ajusta o tamanho do canvas
function resizeCanvas() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}
resizeCanvas();
window.addEventListener('resize', resizeCanvas);

// Array de emojis de notas musicais
var letters = [
    '🎵','🎶','🎼','🎹','🎷','🎺','🎸','🥁','🪕','🎻','🎤','🎧'
];

// Tamanho da fonte dos emojis
var fontSize = 36;
var columns = Math.floor(canvas.width / fontSize);

// Inicializa as "gotas"
var drops = [];
for (var i = 0; i < columns; i++) {
    drops[i] = Math.random() * canvas.height / fontSize;
}

// Função de desenho
function draw() {
    ctx.fillStyle = 'rgba(32, 44, 57, 0.85)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.font = fontSize + "px 'Segoe UI Emoji', 'Noto Color Emoji', Arial";
    for (var i = 0; i < drops.length; i++) {
        var text = letters[Math.floor(Math.random() * letters.length)];
        ctx.fillStyle = '#0f0';
        ctx.fillText(text, i * fontSize, drops[i] * fontSize);
        if (drops[i] * fontSize > canvas.height && Math.random() > 0.980) {
            drops[i] = 0;
        }
        drops[i] += 1
    }
}

// Animação
setInterval(draw, 75);