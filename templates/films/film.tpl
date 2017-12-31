{include file="common/header.tpl"}

<section id="film">
  <h1>
    Detalhes do filme
  </h1>

  <section id="filmDetails">
    <img src="{$film.cover}" alt="{$film.nome}">

    <section id="filmHeader">
      <p id="filmName">
        {$film.nome}
      </p>
      <p id="filmParticulars">
        {$film.ano} | M{$film.classificacao_etaria} | {$film.genero} | {$film.duracao} | IMDB {$film.pontuacao_imdb}
      </p>

      <p id="preco">
        {$film.preco}
      </p>
    </section>

    <section id="sinopse">
      {$film.sinopse}
    </section>

    <section id="trailer">
      <iframe src="{$film.link_trailer}" frameborder="0" width="560" height="315"></iframe>
    </section>

    <section id="buttons">
      {if $admin}
      <form class="" action="" method="post">
        <input type="text" name="id" value="{$film.id}" hidden>
        <button type="submit" name="edit" value=""> <i class="fas fa-edit fa-lg"></i> </button>
        <button type="submit" name="delete" value=""> <i class="fas fa-trash-alt fa-lg"></i> </button>
      </form>
      {/if}

      <form action="" method="GET">
        <input type="text" name="id" value="{$film.id}" hidden>
        <input type="submit" name="buy" value="Comprar">
      </form>
    </section>
  </section>
</section>

{include file="common/footer.tpl"}
