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
/* Inserir Tabela usuario */

id, perfil, nome, email, senha, cep, endereco

insert into usuario values 
(null,'adm','adm@adm.com',md5('1'),'2');


insert into usuario values
(null,'juca','juca@adm.com',md5('1'),'0');

insert into usuario values
(null,'jose','jose@adm.com',md5('1'),'1');

insert into usuario values
(null,'joao','joao@adm.com',md5('1'),'0');


/* Alterar propriedade de uma coluna 

ALTER TABLE Nome_da_Tabela CHANGE Nome_do_Campo Nome_do_Campo/Novo_Nome Tipo_de_Variavel(Tamanho) null/not null;

ALTER TABLE usuario CHANGE nome nome varchar(30) null;

 Concertar o campo email 
 ALTER TABLE usuario CHANGE email email varchar(50) unique not null; */