<div class="container-fluid" id="header">
    <a href="http://liacs.leidenuniv.nl/" target="_blank">
        <img src="media/leidenuniv.png" alt="Logo Universiteit Leiden">
    </a>
    <div id="username">
        <h1>
            <a href="{if $loggedIn}?page=profile{else}?page=login{/if}">
                {$user_name|default:"Not Logged In"}
            </a>
        </h1>
    </div>
</div>
