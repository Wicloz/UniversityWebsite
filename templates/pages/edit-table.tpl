{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <table class="table-fancy">
            <tr>
                {foreach $edit_headers as $header}
                    <th>{$header}</th>
                {/foreach}
                <th>EDIT</th>
            </tr>
            {foreach $edit_table as $row}
                <tr>
                    {foreach $edit_headers as $field}
                        <td>{$row.$field}</td>
                    {/foreach}
                    <td><a class="button table-button" href="?page=edit-entry&table={Input::get('table')}&id={$row.id}">Edit</a></td>
                </tr>
            {/foreach}
        </table>
        <p>
            <a class="button" href="?page=edit-entry&table={Input::get('table')}&id=create">Create New</a>
        </p>
    </div>
{/block}
