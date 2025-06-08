-- Cria a database phpfy (se não existir)
CREATE DATABASE IF NOT EXISTS phpfy;

USE phpfy;

CREATE TABLE IF NOT EXISTS musicas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    artista VARCHAR(100) NOT NULL,
    genero CHAR(1) NOT NULL ,
    idioma CHAR(1) NOT NULL ,
    duracao INT NOT NULL,
    imagem_url VARCHAR(255) NOT NULL
) 
