<?php 
class Musica {
    private $titulo;
    private $artista;
    private $genero;
    private $idioma;
    private $duracao;
    private $imagem_url;

    public function __construct($titulo, $artista, $genero, $idioma, $duracao, $imagem_url) {
        $this->titulo = $titulo;
        $this->artista = $artista;
        $this->genero = $genero;
        $this->idioma = $idioma;
        $this->duracao = $duracao;
        $this->imagem_url = $imagem_url;
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
}

?>