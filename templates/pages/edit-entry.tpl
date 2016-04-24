{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <form action="" method="POST">
            {foreach $columns as $column}
                <div class="form-row">
                    <label for="{$column->COLUMN_NAME}">{$column->COLUMN_NAME}:</label>
                    <br>
                    {if $column->type === 'json'}
                        <div id="{$column->COLUMN_NAME}_json" style="height:300px;"></div>
                        <input type="hidden" name="{$column->COLUMN_NAME}" id="{$column->COLUMN_NAME}">
                    {else}
                        <{if $column->type === 'textarea'}textarea rows="10"{else}input type="{$column->type}" value="{$column->value}"{/if}
                            name="{$column->COLUMN_NAME}"
                            id="{$column->COLUMN_NAME}"
                            class="{$column->classes}"
                            {if !empty($column->CHARACTER_MAXIMUM_LENGTH)}
                                maxlength="{$column->CHARACTER_MAXIMUM_LENGTH}"
                                size="{$column->CHARACTER_MAXIMUM_LENGTH}"
                            {/if}
                            {if !empty($column->checked)}checked{/if}
                            {if $column->COLUMN_NAME === 'id'}readonly{/if}
                            {$column->attributes}
                        >{if $column->type == 'textarea'}{$column->value}</textarea>{/if}
                    {/if}
                </div>
            {/foreach}
            <br>
            <input type="hidden" name="action" value="admin_item_{if Input::get('id') === 'create'}insert{else}update{/if}">
            <input type="hidden" name="table" value="{Input::get('table')}">
            <input type="hidden" name="id" value="{Input::get('id')}">
            <input class="button submit-button" id="submit-entry" type="submit" value="{if Input::get('id') === 'create'}Insert{else}Update{/if}">
            {foreach $columns as $column}
                {if $column->type === 'json'}
                    <script>
                        // create the editor
                        var container = document.getElementById("{$column->COLUMN_NAME}_json");
                        var options = {
                        };
                        var editor = new JSONEditor(container, options);
                        // set json
                        editor.set({$column->value});
                        // send data
                        document.getElementById("submit-entry").onclick = function () {
                            document.getElementById("{$column->COLUMN_NAME}").value = editor.getText().replace(/\"/g, "&quot;");
                        };
                    </script>
                {/if}
            {/foreach}
        </form>
        {if Input::get('id') !== 'create'}
            <form action="" method="POST">
                <input type="hidden" name="action" value="admin_item_delete">
                <input type="hidden" name="table" value="{Input::get('table')}">
                <input type="hidden" name="id" value="{Input::get('id')}">
                <input class="button submit-button" type="submit" value="Delete">
            </form>
        {/if}
    </div>
{/block}
