{include file='common/header.tpl'}

<section id="addFilm">
  <h1>
    Adicionar Filme
  </h1>

  <section>
    <form class="" action="{$BASE_URL}actions/films/addFilm.php" method="POST" enctype="multipart/form-data">
      <input type="text" name="title" value="{if isset($FORM_VALUES)}{$FORM_VALUES.title}{/if}" placeholder="Título do filme" required>

      <span id="year">
        Ano
        <input type="text" name="year" value="{if isset($FORM_VALUES)}{$FORM_VALUES.year}{/if}" {literal} pattern="\d{4}" {/literal} required>
      </span>

      <span id="classEtaria">
        Classificação etária

        <select name="classEtaria">
          <option value="3" {if isset($FORM_VALUES)}{if ($FORM_VALUES.classEtaria == 3 )}selected{/if}{/if}>M/3</option>
          <option value="6" {if isset($FORM_VALUES)}{if ($FORM_VALUES.classEtaria == 6 )}selected{/if}{/if}>M/6</option>
          <option value="12" {if isset($FORM_VALUES)}{if ($FORM_VALUES.classEtaria == 12 )}selected{/if}{/if}>M/12</option>
          <option value="14" {if isset($FORM_VALUES)}{if ($FORM_VALUES.classEtaria == 14 )}selected{/if}{/if}>M/14</option>
          <option value="16" {if isset($FORM_VALUES)}{if ($FORM_VALUES.classEtaria == 16 )}selected{/if}{/if}>M/16</option>
          <option value="18" {if isset($FORM_VALUES)}{if ($FORM_VALUES.classEtaria == 18 )}selected{/if}{/if}>M/18</option>
        </select>
      </span>

      <span id="duration">
        Duração
        <input type="" name="duration" value="{if isset($FORM_VALUES)}{$FORM_VALUES.duration}{/if}" placeholder="min" {literal} pattern="[0-9]+" {/literal} required>
      </span>

      <span id="imdb">
        IMDB
        <input type="text" name="imdb" value="{if isset($FORM_VALUES)}{$FORM_VALUES.imdb}{/if}" {literal} pattern="[0-9]*\.?[0-9]*" {/literal}>
      </span>

      <span id="genre">
        Género

        <select name="genre">
          {foreach $genres as $genre}
            <option value="{$genre.id}"{if isset($FORM_VALUES)}{if ($FORM_VALUES.genre == $genre.id )}selected{/if}{/if}>{$genre.nome}</option>
          {/foreach}
        </select>
      </span>

      <span id="cover">
        Cover
        <input type="file" name="cover" value="" required>
      </span>

      <span id="trailer">
        Trailer
        <input type="text" name="trailer" value="{if isset($FORM_VALUES)}{$FORM_VALUES.trailer}{/if}" placeholder="YouTube code" {literal} pattern="[a-zA-Z0-9-]+" {/literal} title="Introduza apenas o código do YouTube" required>
      </span>

      <span id="sinopse">
        Sinopse
        <textarea name="sinopse" rows="8" cols="80" required>{if isset($FORM_VALUES)}{$FORM_VALUES.sinopse}{/if}</textarea>
      </span>

      <span id="price">
        Preço
        <input type="text" name="price" value="{if isset($FORM_VALUES)}{$FORM_VALUES.price}{/if}" placeholder="0,00€" {literal} pattern="[-+]?[0-9]*\.?[0-9]*" {/literal} required>
      </span>
      <span id="qt">
        <input type="text" name="qt" placeholder="qt" value="{if isset($FORM_VALUES)}{$FORM_VALUES.qt}{/if}" {literal} pattern="[0-9]+" {/literal} required>
      </span>
      <div class="submit">
        <input type="submit" name="add" value="Adicionar">
      </div>
    </form>
  </section>

</section>

{include file='common/secundaryMenu.tpl'}
{include file='common/footer.tpl'}
