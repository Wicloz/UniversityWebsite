{if !empty($notifications_success) || !empty($notifications_info) || !empty($notifications_warning) || !empty($notifications_error)}
    <div class="paragraph-center col-sm-12">
        {if !empty($notifications_success)}
            <p class="message-success">
                {foreach $notifications_success as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($notifications_info)}
            <p class="message-info">
                {foreach $notifications_info as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($notifications_warning)}
            <p class="message-warning">
                {foreach $notifications_warning as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($notifications_error)}
            <p class="message-error">
                {foreach $notifications_error as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
    </div>
{/if}

<script>
    {if !empty($alerts_success)}
        {foreach $alerts_success as $item}
            $('#alerts').jGrowl('{escape($item->message)}', {
                sticky: {if $item->permanent}true{else}false{/if},
                group: 'alert-success'
            });
        {/foreach}
    {/if}
    {if !empty($alerts_info)}
        {foreach $alerts_info as $item}
            $('#alerts').jGrowl('{escape($item->message)}', {
                sticky: {if $item->permanent}true{else}false{/if},
                group: 'alert-info'
            });
        {/foreach}
    {/if}
    {if !empty($alerts_warning)}
        {foreach $alerts_warning as $item}
            $('#alerts').jGrowl('{escape($item->message)}', {
                sticky: {if $item->permanent}true{else}false{/if},
                group: 'alert-warning'
            });
        {/foreach}
    {/if}
    {if !empty($alerts_error)}
        {foreach $alerts_error as $item}
            $('#alerts').jGrowl('{escape($item->message)}', {
                sticky: {if $item->permanent}true{else}false{/if},
                group: 'alert-error'
            });
        {/foreach}
    {/if}
</script>
