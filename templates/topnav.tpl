<nav id="navbar" class="navbar navbar-blue" style="top:0px;">
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
                    {if $item.location != ""}
                        <li {if $item.active}class="active"{/if}>
                            <a href="{$item.location}" {if $item.target != ""}target={$item.target}{/if}>{$item.title}</a>
                        </li>
                    {else}
                        <li class="dropdown{if $item.active} active{/if}">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                {$item.title}
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                {foreach $item.subItems as $subitem}
                                    <li {if $subitem.active}class="active"{/if}>
                                        <a href="{$subitem.location}">{$subitem.title}</a>
                                    </li>
                                {/foreach}
                            </ul>
                        </li>
                    {/if}
                {/foreach}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    {if $loggedIn}
                        <a href="?page=profile&action=logout">
                            <span class="glyphicon glyphicon-log-in"></span> Logout
                        </a>
                    {else}
                        <a href="?page=login">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </a>
                    {/if}
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="belowtopnav"></div>
