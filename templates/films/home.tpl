{include file='common/header.tpl'}

<section>
  <h1>
    Últimos Filmes
  </h1>

  <section class="flexbox">
    {foreach $films as $film}
    <a href="{$BASE_URL}pages/films/film.php?id={$film.id}" class="filmbox">
      <div class="thumb">
        <img src="{$BASE_URL}img/films/movies-imgeffect.png" alt="">
      </div>
      <img src="{$film.cover}" alt="{$film.nome}" height="150px">
      <p class="filmname">{$film.nome}</p>
      <div class="years">
        <span class="filmyear">{$film.ano}</span>
        <span class="filmetar">{$film.classificacao_etaria}</span>
      </div>
      <p class="filmpreco">{$film.preco}</p>
    </a>
    {/foreach}
  </section>

</section>

<aside id="loginData">
  <h1>
    Dados de Login
  </h1>

  <section id="user">
    <p class="title">Conta de Utilizador</p>
    <p><b>Username:</b> user</p>
    <p><b>Password:</b> user</p>
  </section>
  <section id="admin">
    <p class="title">Conta de Administrador</p>
    <p><b>Username:</b> admin</p>
    <p><b>Password:</b> admin</p>
  </section>
</aside>

{include file='common/footer.tpl'}
