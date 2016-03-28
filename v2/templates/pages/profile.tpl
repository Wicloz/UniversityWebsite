{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>Logout</h2>
        <p>
            <form action="" method="POST">
                <input type="hidden" name="action" value="logout">
                <input type="hidden" name="token" value="{$token|default:""}">
                <input class="button submit-button" type="submit" value="Log out">
            </form>
        </p>
    </div>
{/block}
