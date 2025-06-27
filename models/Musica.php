<?php
class Musica
{
    private $id;
    private $titulo;
    private $artista;
    private $genero;
    private $idioma;
    private $duracao;
    private $imagem_url;

    public function __construct($titulo, $artista, $genero, $idioma, $duracao, $imagem_url, $id = null)
    {
        $this->titulo = $titulo;
        $this->artista = $artista;
        $this->genero = $genero;
        $this->idioma = $idioma;
        $this->duracao = $duracao;
        $this->imagem_url = $imagem_url;
        $this->id = $id;
    }
    public function criaCard($i)
    {
        $background = "radial-gradient(circle at 50% 40%,rgb(17, 25, 38) 70%,rgb(0, 0, 0) 150%)";

        return "<div class='bg-white/10 rounded-xl shadow-lg p-4 flex flex-col items-center hover:scale-105 transition'  style='background:{$background};'>
        <img src='" . $this->imagem_url  . "' alt='Capa da música' class='w-32 h-32 object-cover rounded mb-4 bg-white/20'>
        <h5 class='font-bold text-lg text-white mb-1 text-center'>" . ($i + 1) . " - " . $this->titulo . "</h5>
        <p class='text-[var(--texto-secundario)] text-sm mb-1 text-center'>" . $this->artista . "</p>
        <p class='text-xs mb-1 text-center'><span class='font-semibold'>Gênero:</span> {$this->switchGenero()}</p>
        <p class='text-xs mb-1 text-center'><span class='font-semibold'>Idioma:</span> {$this->switchIdioma()}</p>
        <p class='text-xs mb-2 text-center'><span class='font-semibold'>Duração:</span> " . $this->duracao . " min</p>
    </div>";
    }
   
    public function criaLinha()
    {
        return '
    <tr class="hover:bg-gray-700 transition duration-200 text-white">
        <td class="font-bold text-sm px-4 py-3">' . $this->id . '</td>
        <td class="px-4 py-3">
            <img src="' . $this->imagem_url . '" alt="Capa da música" class="w-16 h-16 object-cover rounded bg-white/20">
        </td>
        <td class="font-bold text-sm">' . $this->titulo . '</td>
        <td class="text-xs text-[var(--texto-secundario)]">' . $this->artista . '</td>
        <td class="px-4 py-3 text-sm">' . $this->switchGenero() . '</td>
        <td class="px-4 py-3 text-sm">' . $this->switchIdioma() . '</td>
        <td class="px-4 py-3 text-sm">' . $this->duracao . 'min</td>
        <td class="px-4 py-3">
            <form action="../utils/excluir.php" method="get" onsubmit="return confirm(\'Tem certeza que deseja excluir a música?\');">
                <input type="hidden" name="id" value="' . $this->id . '">
                <button type="submit" class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-red-600 text-white hover:bg-red-800 text-xs font-semibold transition">
                    <i class="bi bi-trash-fill"></i>Excluir
                </button>
            </form>
        </td>
    </tr>
';

    }

    public function switchIdioma()
    {
        $idioma = "";
        switch ($this->idioma) {
            case 'P':
                $idioma = "Português";
                break;
            case 'I':
                $idioma = "Inglês";
                break;
            case 'E':
                $idioma = "Espanhol";
                break;
            case 'F':
                $idioma = "Francês";
                break;
            case 'O':
                $idioma = "Outro";
                break;
            default:
                $idioma = "N/A";
                break;
        }
        return $idioma;
    }

    public function switchGenero()
    {
        $genero = "";
        switch ($this->genero) {
            case 'P':
                $genero = "Pop";
                break;
            case 'R':
                $genero = "Rock";
                break;
            case 'S':
                $genero = "Sertanejo";
                break;
            case 'E':
                $genero = "Eletrônica";
                break;
            case 'O':
                $genero = "Outro";
                break;
            default:
                $genero = "N/A";
                break;
        }
        return $genero;
    }
    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of artista
     */
    public function getArtista()
    {
        return $this->artista;
    }

    /**
     * Set the value of artista
     */
    public function setArtista($artista): self
    {
        $this->artista = $artista;

        return $this;
    }

    /**
     * Get the value of genero
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     */
    public function setGenero($genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of idioma
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set the value of idioma
     */
    public function setIdioma($idioma): self
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get the value of duracao
     */
    public function getDuracao()
    {
        return $this->duracao;
    }

    /**
     * Set the value of duracao
     */
    public function setDuracao($duracao): self
    {
        $this->duracao = $duracao;

        return $this;
    }

    /**
     * Get the value of imagem
     */
    public function getImagemUrl()
    {
        return $this->imagem_url;
    }

    /**
     * Set the value of imagem
     */
    public function setImagemUrl($imagem): self
    {
        $this->imagem_url = $imagem;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}
