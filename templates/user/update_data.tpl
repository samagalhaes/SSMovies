{include file='common/header.tpl'}

<section id="updateData">
  <h1>
    Atualizar dados
  </h1>

  <section>
    <form id="formRegister" action="{$BASE_URL}actions/user/update_data.php" method="POST">
      <h2>
        Dados do utilizador
      </h2>

      <p>
        <input type="text" name="name" placeholder="Nome" value="{$userData.nome}" required>
      </p>
      <p>
        <input type="email" name="email" placeholder="E-mail" value="{$userData.email}" {literal} pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" {/literal} required>
      </p>
      <p>
        <input type="text" name="username" placeholder="Nome de utilizador" value="{$userData.username}" required disabled>
      </p>
      <p>
        <input type="tel" name="telephone" placeholder="Telefone" value="{$userData.telefone}" {literal} pattern="\d{9}" {/literal} title="Insira um contacto telefónico com 9 dígitos.">
      </p>


      <h2>
        Dados de facturação
      </h2>

      <p>
        <input type="text" name="nif" placeholder="NIF" value="{$userData.nif}">
      </p>
      <p>
        <input type="text" name="address" placeholder="Morada" value="{$userData.morada}">
      </p>
      <p>
        <input type="text" name="postcode1" value="{if isset($postcode1)} {$postcode1} {/if}" placeholder="0000" {literal} pattern="\d{4}" {/literal} title="Insira a primeira parte do código postal com 4 dígitos"> &ndash;
        <input type="text" name="postcode2" value="{if isset($postcode2)} {$postcode2} {/if}" placeholder="000" {literal} pattern="\d{3}" {/literal} title="Insira a segunda parte do código postal com 3 dígitos">
        <input type="text" name="locality" placeholder="Localidade" value="{$userData.localidade}">
      </p>

      <h2>
        Confirmar e alterar palavra-passe
      </h2>

      <p>
        <input type="password" name="password" placeholder="Password" required>
      </p>
      <p>
        <input type="password" name="confirmPassword" placeholder="Confirmar password" required>
      </p>

      <div class="submit">
        <input type="submit" name="update" value="Atualizar">
      </div>
    </form>
  </section>
</section>

{include file='common/secundaryMenu.tpl'}
{include file='common/footer.tpl'}
