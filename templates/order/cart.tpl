{include file="common/header.tpl"}

<section id="cartList">
  <h1>
    Carrinho de compras
  </h1>

  <section>
    {foreach $cart as $film}
      <form class="film" action="{$BASE_URL}actions/order/cart.php" method="GET">
        <img src="{$film.cover}" alt="{$film.nome}">
        <div class="description">
          <p class="title">{$film.nome}</p>
          <p class="Particulars">{$film.ano} | M{$film.classificacao_etaria} | {$film.genero} | {$film.duracao}min. | IMDB {$film.pontuacao_imdb}</p>
        </div>
        <p class="price">{$film.preco|number_format:2:',':'.'} &euro; x </p>
        <input type="number" name="qt" value="{$film.qt}" pattern="[0-9]">
        <p class="total">{($film.preco*$film.qt)|number_format:2:',':'.'} &euro;</p>
        <div class="buttons">
          <input type="text" name="id" value="{$film.id}" hidden>
          <button type="submit" name="updateQt"><i class="fas fa-check-circle fa-2x"></i></button> <br>
          <button type="submit" name="delete"><i class="fas fa-times-circle fa-2x"></i></button>
        </div>
      </form>
    {/foreach}

    {if ($total != 0)}
      <form class="submit" action="{$BASE_URL}actions/order/cart.php" method="POST">
        <p><b>Valor total:</b> {$total|number_format:2:',':'.'} &euro;</p>
        <input type="submit" name="confirm" value="Confirmar">
      </form>
    {else}
      <p id="cleanCart">
        Adicione um produto ao carrinho de compras!
      </p>
    {/if}
  </section>
</section>

{include file="common/footer.tpl"}
