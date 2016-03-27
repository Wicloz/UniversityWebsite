{foreach $sidenav as $navbox}
    <div class="navbox">
        <h2>{$navbox.header}</h2>
        <ul>
            {foreach $navbox.content as $item}
                <li{if $item.active} class="active"{/if}>
                    <a href="{$item.location}">{$item.title}</a>
                </li>
            {/foreach}
        </ul>
    </div>
{/foreach}
