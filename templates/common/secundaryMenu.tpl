<aside id="secundaryMenu">
  <h1>&nbsp;</h1>

  <nav>
    <ul>
      {foreach $secundaryMenuUser as $menuItem}
      <li>
        <a href="{$BASE_URL}{$menuItem.url}" {if ($BASE_URL|cat:$menuItem.url == $REQUEST_URI)} class="selected" {/if}>{$menuItem.nome}</a>
      </li>
      {/foreach}
      {if (isset($secundaryMenuAdmin))}
        {foreach $secundaryMenuAdmin as $menuItem}
        <li>
          <a href="{$BASE_URL}{$menuItem.url}" {if ($BASE_URL|cat:$menuItem.url == $REQUEST_URI)} class="selected" {/if}>{$menuItem.nome}</a>
        </li>
        {/foreach}
      {/if}
    </ul>
  </nav>

</aside>
