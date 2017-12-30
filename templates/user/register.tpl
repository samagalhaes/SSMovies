{include file='common/header.tpl'}

<section id="register">
  <h1>
    Registar
  </h1>

  <section>
    <form id="formRegister" action="{$BASE_URL}actions/user/register.php" method="POST">
      <h2>
        Dados do utilizador
      </h2>

      <p>
        <input type="text" name="firstName" placeholder="Primeiro Nome" value="{if isset($FORM_VALUES)} {$FORM_VALUES.firstName} {/if}" required>
        <input type="text" name="lastName" placeholder="Último Nome" value="{if isset($FORM_VALUES)} {$FORM_VALUES.lastName} {/if}">
      </p>
      <p>
        <input type="email" name="email" placeholder="E-mail" value="{if isset($FORM_VALUES)} {$FORM_VALUES.email} {/if}" required>
      </p>
      <p>
        <input type="text" name="username" placeholder="Nome de utilizador" value="{if isset($FORM_VALUES)} {$FORM_VALUES.username} {/if}" required>
      </p>
      <p>
        <input type="password" name="password" placeholder="Password" required>
      </p>
      <p>
        <input type="tel" name="telephone" placeholder="Telefone" value="{if isset($FORM_VALUES)} {$FORM_VALUES.telephone} {/if}" {literal} pattern="\d{9}" {/literal} title="Insira um contacto telefónico com 9 dígitos.">
      </p>


      <h2>
        Dados de facturação
      </h2>

      <p>
        <input type="text" name="nif" placeholder="NIF" value="{if isset($FORM_VALUES)} {$FORM_VALUES.nif} {/if}">
      </p>
      <p>
        <input type="text" name="address" placeholder="Morada" value="{if isset($FORM_VALUES)} {$FORM_VALUES.address} {/if}">
      </p>
      <p>
        <input type="text" name="postcode1" value="{if isset($FORM_VALUES)} {$FORM_VALUES.postcode1} {/if}"  placeholder="0000" {literal} pattern="\d{4}" {/literal} title="Insira a primeira parte do código postal com 4 dígitos"> &ndash;
        <input type="text" name="postcode2" value="{if isset($FORM_VALUES)} {$FORM_VALUES.postcode2} {/if}" placeholder="000" {literal} pattern="\d{3}" {/literal} title="Insira a segunda parte do código postal com 3 dígitos">
        <input type="text" name="locality" placeholder="Localidade" value="{if isset($FORM_VALUES)} {$FORM_VALUES.locality} {/if}">
      </p>

      <input type="submit" name="register" value="Registar">
    </form>
  </section>
</section>

{include file='common/footer.tpl'}
