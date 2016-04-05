{if !empty($successes) || !empty($infos) || !empty($warnings) || !empty($errors)}
    <div class="paragraph-center col-sm-12">
        {if !empty($successes)}
            <p class="message-success">
                {foreach $successes as $success}
                    {$success->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($infos)}
            <p class="message-info">
                {foreach $infos as $info}
                    {$info->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($warnings)}
            <p class="message-warning">
                {foreach $warnings as $warning}
                    {$warning->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($errors)}
            <p class="message-error">
                {foreach $errors as $error}
                    {$error->message}<br>
                {/foreach}
            </p>
        {/if}
    </div>
{/if}
