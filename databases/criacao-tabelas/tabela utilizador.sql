create table utilizador(
id serial primary key,
username varchar(50) unique,
nome varchar(50) not null,
email varchar(50) not null unique,
password varchar(50) not null,
telefone integer not null,
NIF integer, 
morada text not null,
codigo_postal varchar(8) not null,
localidade varchar(50) not null,
admin boolean not null
)