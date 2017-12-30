<aside id="secundaryMenu">
  <h1>&nbsp;</h1>

  <nav>
    <ul>
      {foreach $secundaryMenuUser as $menuItem}
      <li>
        <a href="{$BASE_URL} {$menuItem.url}">{$menuItem.nome}</a>
      </li>
      {/foreach}
      {if (isset($secondaryMenuAdmin))}
        {foreach $secundaryMenuAdmin as $menuItem}
        <li>
          <a href="{$BASE_URL} {$menuItem.url}">{$menuItem.nome}</a>
        </li>
        {/foreach}
      {/if}
    </ul>
  </nav>

</aside>
