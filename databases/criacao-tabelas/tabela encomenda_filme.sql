create table encomenda_filme(
   cod_encomenda integer references encomenda not null,
   id_filme integer references filme not null,
   quantidade integer 
      not null
      default 1
)