create database churrasco;
use churrasco;

create table usuarios(
id int auto_increment primary key,
nome varchar(100) not null,
email varchar(100) not null unique,
senha varchar(255) not null
);

create table participantes(
id INT AUTO_INCREMENT PRIMARY key,
nome VARCHAR(100) NOT null,
turma VARCHAR(50) NOT null,
telefone VARCHAR(20),
tipo_churrasco VARCHAR(30) NOT NULL,
acompanhamento VARCHAR(50),
confirmado BOOLEAN NOT null,
pago BOOLEAN NOT NULL
);

insert into usuarios(id, nome, email, nome) values (1, "Guilherme", "guilherme@gmail.com", 1234), (2, "Lucas", "ninja@gmail.com", 4321);