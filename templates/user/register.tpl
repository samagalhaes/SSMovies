{include file='common/header.tpl'}

<section id="register">
  <h1>
    Registar
  </h1>

  <section>
    <form class="" action=$BASE_URL"actions/user/register.php" method="post">

      </form>
      <h2>
        Dados do utilizador
      </h2>

      <p>
        <input type="text" name="firstName" placeholder="Primeiro Nome" value="">
        <input type="text" name="lastName" placeholder="Último Nome" value="">
      </p>
      <p>
        <input type="email" name="email" placeholder="E-mail" value="">
      </p>
      <p>
        <input type="text" name="username" placeholder="Nome de utilizador" value="">
      </p>
      <p>
        <input type="password" name="password" placeholder="Password">
      </p>
      <p>
        <input type="text" name="telephone" placeholder="Telefone" value="">
      </p>


      <h2>
        Dados de facturação
      </h2>

      <p>
        <input type="text" name="nif" placeholder="NIF" value="">
      </p>
      <p>
        <input type="text" name="address" placeholder="Morada" value="">
      </p>
      <p>
        <input type="text" name="postcode1" value=""> &ndash;
        <input type="text" name="postcode2" value="">
        <input type="text" name="locality" placeholder="Localidade" value="">
      </p>

      <input type="submit" name="register" value="Registar">
    </form>
  </section>
</section>
