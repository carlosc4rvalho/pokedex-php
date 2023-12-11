create database pokemon;

use pokemon;

create table pokedex(
   id serial,
   nome varchar(50),
   tipo varchar(50)
);

CREATE TABLE usuarios (
    id SERIAL,
    nome VARCHAR(50),
    email VARCHAR(50),
    senha VARCHAR(255)
);

CREATE TABLE recupera_senha (
    id serial,
    usuario varchar(50),
    chave varchar(50),
    dia_hora varchar(25)
);

INSERT INTO pokedex (nome, tipo) VALUES
   ('Bulbasaur', 'Grama/Venenoso'),
   ('Charmander', 'Fogo'),
   ('Squirtle', 'Água'),
   ('Pikachu', 'Elétrico'),
   ('Jigglypuff', 'Normal/Fada');