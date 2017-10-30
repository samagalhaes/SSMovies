create table encomenda(
   codigo serial primary key,
   utilizador integer references utilizador not null,
   estado integer references estado not null,
   data_inicio timestamp not null,
   data_fim timestamp
)