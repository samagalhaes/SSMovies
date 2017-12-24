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
        <input type="text" name="telephone" placeholder="Telefone" value="{if isset($FORM_VALUES)} {$FORM_VALUES.telephone} {/if}" pattern="/d{9}">
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
        <input type="text" name="postcode1" value="{if isset($FORM_VALUES)} {$FORM_VALUES.postcode1} {/if}" pattern="/d{4}"> &ndash;
        <input type="text" name="postcode2" value="{if isset($FORM_VALUES)} {$FORM_VALUES.postcode2} {/if}" pattern="/d{3}">
        <input type="text" name="locality" placeholder="Localidade" value="{if isset($FORM_VALUES)} {$FORM_VALUES.locality} {/if}">
      </p>

      <input type="submit" name="register" value="Registar">
    </form>
  </section>
</section>
