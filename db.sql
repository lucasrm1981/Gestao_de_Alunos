/* Loga com o usuario root */
mysql -u root

/*Exibe as bases de Dados ja existentes */
show databases;

/* Cria a Base de Dados GestAlunos */
create database GestAlunos;

/* Cria a Base de Dados GestAlunos */
drop database GestAlunos;

/* Seleciona a Base de Dados GestAlunos */
use GestAlunos;

/* Criar Tabela usuario */
create table usuarios

/* Deletar Tabela usuario */
drop table usuarios

/* Exibe o conteudo da tabela usuario */
show columns from usuario;

create table usuario(
        id int primary key auto_increment,
        nome varchar(40) not null,
        email varchar(40) unique not null,
        senha varchar(50) not null,
        perfil int(1)

);


create table tb_avaliacoes(
        cod_avaliacoes_fk int primary key auto_increment,
        cod_livro int,
        nome varchar(20) not null,
        email varchar(30) unique not null,
        nota int(1) not null,
        data_post date,
        comentario varchar(5000)

);
/* Inserir dados na Tabela usuario 

id, nome, email, senha, perfil */
/* Coordenador */
insert into usuario values 
(null,'adm','adm@adm.com',md5('1'),'2');

/* Professor */
insert into usuario values
(null,'jose','jose@adm.com',md5('1'),'1');

/* Alunos */
insert into usuario values
(null,'juca','juca@adm.com',md5('1'),'0');

insert into usuario values
(null,'joao','joao@adm.com',md5('1'),'0');

