{include file='common/header.tpl'}

<section id="addFilm">
  <h1>
    Editar Filme | {$film.nome}
  </h1>

  <section>
    <form class="" action="{$BASE_URL}actions/films/editFilm.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="title" value="{if isset($FORM_VALUES)}{$FORM_VALUES.title}{else}{$film.nome}{/if}" placeholder="Título do filme" required>

      <span id="year">
        Ano
        <input type="text" name="year" value="{if isset($FORM_VALUES)}{$FORM_VALUES.year}{else}{$film.ano}{/if}" {literal} pattern="\d{4}" {/literal} required>
      </span>

      <span id="classEtaria">
        Classificação etária

        <select name="classEtaria">
          <option value="3"
          {if isset($FORM_VALUES)}
            {if ($FORM_VALUES.classEtaria == 3)}
              selected
            {/if}
          {elseif ($film.classificacao_etaria == 3)}
            selected
          {/if}>M/3</option>
          <option value="6" {if isset($FORM_VALUES)}
            {if ($FORM_VALUES.classEtaria == 6)}
              selected
            {/if}
          {elseif ($film.classificacao_etaria == 6)}
            selected
          {/if}>M/6</option>
          <option value="12" {if isset($FORM_VALUES)}
            {if ($FORM_VALUES.classEtaria == 12)}
              selected
            {/if}
          {elseif ($film.classificacao_etaria == 12)}
            selected
          {/if}>M/12</option>
          <option value="14" {if isset($FORM_VALUES)}
            {if ($FORM_VALUES.classEtaria == 14)}
              selected
            {/if}
          {elseif ($film.classificacao_etaria == 14)}
            selected
          {/if}>M/14</option>
          <option value="16" {if isset($FORM_VALUES)}
            {if ($FORM_VALUES.classEtaria == 16)}
              selected
            {/if}
          {elseif ($film.classificacao_etaria == 16)}
            selected
          {/if}>M/16</option>
          <option value="18" {if isset($FORM_VALUES)}
            {if ($FORM_VALUES.classEtaria == 18)}
              selected
            {/if}
          {elseif ($film.classificacao_etaria == 18)}
            selected
          {/if}>M/18</option>
        </select>
      </span>

      <span id="duration">
        Duração
        <input type="" name="duration" value="{if isset($FORM_VALUES)}{$FORM_VALUES.duration}{else}{$film.duracao}{/if}" placeholder="min" {literal} pattern="[0-9]+" {/literal} required>
      </span>

      <span id="imdb">
        IMDB
        <input type="text" name="imdb" value="{if isset($FORM_VALUES)}{$FORM_VALUES.imdb}{else}{$film.pontuacao_imdb}{/if}" {literal} pattern="[0-9]*\.?[0-9]*" {/literal}>
      </span>

      <span id="genre">
        Género

        <select name="genre">
          {foreach $genres as $genre}
            <option value="{$genre.id}"
            {if isset($FORM_VALUES)}
              {if ($FORM_VALUES.genre == $genre.id )}
                selected
              {/if}
            {/if}
            {if ($film.genero == $genre.nome) AND !isset($FORM_VALUES)}
              selected
            {/if}>{$genre.nome}</option>
          {/foreach}
        </select>
      </span>

      <span id="cover">
        Cover
        <input type="file" name="cover" value="">
      </span>

      <span id="trailer">
        Trailer
        <input type="text" name="trailer" value="{if isset($FORM_VALUES)}{$FORM_VALUES.trailer}{else}{$film.link_trailer}{/if}" placeholder="YouTube code" {literal} pattern="[a-zA-Z0-9-]+" {/literal} title="Intruduza apenas o código do YouTube" required>
      </span>

      <span id="sinopse">
        Sinopse
        <textarea name="sinopse" rows="8" cols="80" required>{if isset($FORM_VALUES)}{$FORM_VALUES.sinopse}{else}{$film.sinopse}{/if}</textarea>
      </span>

      <span id="price">
        Preço
        <input type="text" name="price" value="{if isset($FORM_VALUES)}{$FORM_VALUES.price}{else}{$film.preco}{/if}" placeholder="0,00€" {literal} pattern="[-+]?[0-9]*\.?[0-9]*" {/literal} required>
      </span>
      <span id="qt">
        <input type="text" name="qt" placeholder="qt" value="{if isset($FORM_VALUES)}{$FORM_VALUES.qt}{else}{$film.quantidade_disponivel}{/if}" {literal} pattern="[0-9]+" {/literal} required>
      </span>
      <div class="submit">
        <input type="text" name="id" value="{$film.id}" hidden>
        <input type="submit" name="change" value="Alterar">
      </div>
    </form>
  </section>

</section>

{include file='common/secundaryMenu.tpl'}
{include file='common/footer.tpl'}
