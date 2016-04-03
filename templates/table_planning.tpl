<table class="table-fancy">
    <tr>
        <th>Date</th>
        {if empty($subject) && empty($item)}
            <th>Subject</th>
        {/if}
        <th>Estimated Duration</th>
        <th>Goal</th>
        <th>Status</th>
    </tr>
    {foreach $table as $row}
        {$s1 = ''}
        {$s2 = ''}
        {if $row->done}
            {$s1 = '<s>'}
            {$s2 = '</s>'}
        {/if}
        <tr>
            <td>
                {$s1}{$row->date_start} - {$row->date_end}{$s2}
            </td>
            {if empty($subject) && empty($item)}
                <td>
                    {$s1}
                        <a href="?page=subjects&subject={$row->subject}">
                            {$row->subject_name}
                        </a>
                    {$s2}
                </td>
            {/if}
            <td>
                {$s1}{$row->duration}{$s2}
            </td>
            <td>
                {$s1}{$row->goal}{$s2}
            </td>
            <td>
                {if Users::isEditor() && empty($row->todayRow)}
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="planning">
                        <input type="hidden" name="id" value="{$row->id}">
                        <input type="hidden" name="done" value="{!$row->done}">
                        <input type="hidden" name="token" value="{$token|default:""}">
                        <input class="button submit-button table-button" type="submit" value="{$row->state}">
                    </form>
                {else}
                    {$row->state}
                {/if}
            </td>
        </tr>
    {/foreach}
    {if Users::isEditor()}
        <tr>
            <form action="" method="POST">
                <input type="hidden" name="action" value="item_insert">
                <input type="hidden" name="table" value="planning">
                <input type="hidden" name="parent_table" value="{$table_parentT|default:"subjects"}">
                <input type="hidden" name="token" value="{$token|default:""}">
                <td>
                    <input type="date" name="date_start" placeholder="yyyy-mm-dd" value="" class="date">
                    -
                    <input type="date" name="date_end" placeholder="yyyy-mm-dd" value="" class="date">
                </td>
                {if empty($subject) && empty($item)}
                    <td>
                        <select name="parent_id">
                            {foreach Queries::subjects() as $subject}
                                <option value="{$subject->id}" {if Input::get('subject') === $subject->abbreviation}selected{/if}>
                                    {$subject->name}
                                </option>
                            {/foreach}
                        </select>
                    </td>
                {else}
                    <input type="hidden" name="parent_id" value="{$table_parentI|default:""}">
                {/if}
                <td>
                    <input type="text" name="duration" value="" class="duration">
                </td>
                <td>
                    <input type="text" name="goal" value="">
                </td>
                <td>
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    {/if}
</table>
{if Users::isEditor()}
    <p>
        <a href="?page=edit-table&table=planning" class="button">
            Edit Table
        </a>
    </p>
{/if}
