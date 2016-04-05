{if !empty($not_success) || !empty($not_info) || !empty($not_warning) || !empty($not_error)}
    <div class="paragraph-center col-sm-12">
        {if !empty($not_success)}
            <p class="message-success">
                {foreach $not_success as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($not_info)}
            <p class="message-info">
                {foreach $not_info as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($not_warning)}
            <p class="message-warning">
                {foreach $not_warning as $item}
                    {$item->message}<br>
                {/foreach}
            </p>
        {/if}
        {if !empty($not_error)}
            <p class="message-error">
                {foreach $not_error as $item}
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
