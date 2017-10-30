create table filme (
id serial primary key,
nome varchar(50) not null,
ano integer not null
   constraint ano_positivo check (ano > 0),
pontuacao_imdb float(24)
   constraint pontuacao_positiva check (pontuacao_imdb >= 0),
classificacao_etaria integer not null
   constraint idade_positiva check (classificacao_etaria > 0),
duracao integer not null
   constraint duracao_positiva check (duracao > 0),
sinopse text,
link_trailer varchar(50),
preco money not null,
quantidade_disponivel integer not null,
cover varchar(50)
)