{if $successes|default:"" != "" || $infos|default:"" != "" || $warnings|default:"" != "" || $errors|default:"" != ""}
    <div class="paragraph-center col-sm-12">
        {if $successes|default:"" != ""}
            <p class="message-success">
                {foreach $successes as $success}
                    {$success}<br>
                {/foreach}
            </p>
        {/if}
        {if $infos|default:"" != ""}
            <p class="message-info">
                {foreach $infos as $info}
                    {$info}<br>
                {/foreach}
            </p>
        {/if}
        {if $warnings|default:"" != ""}
            <p class="message-warning">
                {foreach $warnings as $warning}
                    {$warning}<br>
                {/foreach}
            </p>
        {/if}
        {if $errors|default:"" != ""}
            <p class="message-error">
                {foreach $errors as $error}
                    {$error}<br>
                {/foreach}
            </p>
        {/if}
    </div>
{/if}
