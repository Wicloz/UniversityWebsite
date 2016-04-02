{extends file="../main.tpl"}
{block name=content_center}
    <p>
        <form action="" method="POST">
            {foreach $columns as $column}
                <div class="form-row">
                    <label for="{$column->COLUMN_NAME}">{$column->COLUMN_NAME}:</label>
                    <br>
                    <{if $column->type === 'textarea'}textarea rows="5"{else}input type="{$column->type}" value="{$column->value}"{/if}
                        name="{$column->COLUMN_NAME}"
                        id="{$column->COLUMN_NAME}"
                        class="{$column->type}"
                        {if !empty($column->CHARACTER_MAXIMUM_LENGTH)}
                            maxlength="{$column->CHARACTER_MAXIMUM_LENGTH}"
                            size="{$column->CHARACTER_MAXIMUM_LENGTH}"
                        {/if}
                        {if !empty($column->checked)}checked{/if}
                        {if $column->COLUMN_NAME === 'id'}readonly{/if}
                        {$column->attributes}
                    >{if $column->type == 'textarea'}{$column->value}</textarea>{/if}
                </div>
            {/foreach}
            <br>
            <input type="hidden" name="action" value="admin_item_{if Input::get('id') === 'create'}insert{else}update{/if}">
            <input type="hidden" name="table" value="{Input::get('table')}">
            <input type="hidden" name="id" value="{Input::get('id')}">
            <input type="hidden" name="token" value="{$token|default:""}">
            <input class="button submit-button" type="submit" value="{if Input::get('id') === 'create'}Insert{else}Update{/if}">
        </form>
        {if Input::get('id') !== 'create'}
            <form action="" method="POST">
                <input type="hidden" name="action" value="admin_item_delete">
                <input type="hidden" name="table" value="{Input::get('table')}">
                <input type="hidden" name="id" value="{Input::get('id')}">
                <input type="hidden" name="token" value="{$token|default:""}">
                <input class="button submit-button" type="submit" value="Delete">
            </form>
        {/if}
    </p>
{/block}
