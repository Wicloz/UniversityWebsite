<nav class="navbar navbar-blue">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?page=home">s1704362</a>
        </div>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="nav navbar-nav">
                {foreach $topnav as $item}
                <li{if $item.active} class="active"{/if}>
                    <a href="{$item.location}"{if $item.target != ""} target={$item.target}{/if}>{$item.title}</a>
                </li>
                {/foreach}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="?page=login">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>