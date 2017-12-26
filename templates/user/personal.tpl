{include file='common/header.tpl'}

<section id="personalProfile">
  <h1>
    Dados do utilizador
  </h1>

  <section>
    <h2>
      Dados de utilizador
    </h2>

    <p>
      <b>Nome: </b> {$userData.nome}
    </p>
    <p>
      <b>Email: </b> {$userData.email}
    </p>
    <p>
      <b>Nome de utilizador: </b> {$userData.username}
    </p>
    <p>
      <b>Telefone: </b> {$userData.telefone}
    </p>
  </section>

  <section>
    <h2>
      Dados de faturação
    </h2>

    <p>
      <b>NIF: </b> {$userData.nif}
    </p>
    <div id="addressBox">
      <p id="id"><b>Morada: </b></p>
      <p id="address">{$userData.morada}</p>
      <p id="location">
      {if (isset($postcode1) AND isset($postcode2))}
        {$postcode1} &ndash; {$postcode2}
      {/if}
      {$userData.localidade}</p>
    </div>
  </section>
</section>

{include file='common/secundaryMenu.tpl'}
{include file='common/footer.tpl'}
