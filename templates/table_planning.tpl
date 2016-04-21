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
        {$strike = ''}
        {if $row->completion}
            {$strike = 'class="complete"'}
        {/if}
        <tr>
            {if Users::isUser() && empty($row->todayRow)}
                {$form = sprintf('update_planning_%s', $row->id)}
                <form action="" method="POST" id="{$form}">
                    <input type="hidden" name="action" value="item_update">
                    <input type="hidden" name="table" value="planning">
                    <input type="hidden" name="id" value="{$row->id}">
                </form>
            {/if}
            <td {$strike}>
                <span id="{$form}_date_start" ondblclick="makeInput('{$form}', 'date_start', 'date')">{$row->date_start}</span>
                -
                <span id="{$form}_date_end" ondblclick="makeInput('{$form}', 'date_end', 'date')">{$row->date_end}</span>
            </td>
            {if empty($subject) && empty($item)}
                <td {$strike}>
                    <a href="?page=subjects&subject={$row->subject}">
                        {$row->subject_name}
                    </a>
                </td>
            {/if}
            <td {$strike}>
                <span id="{$form}_duration" ondblclick="makeInput('{$form}', 'duration', 'time')">{$row->duration}</span>
            </td>
            <td {$strike}>
                <span id="{$form}_goal" ondblclick="makeInput('{$form}', 'goal', 'text')">{$row->goal}</span>
            </td>
            <td>
                {if Users::isUser() && empty($row->todayRow)}
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="planning">
                        <input type="hidden" name="id" value="{$row->id}">
                        <input type="hidden" name="done" value="{!$row->completion}">
                        <input class="button submit-button table-button" type="submit" value="{$row->state}">
                    </form>
                {else}
                    {$row->state}
                {/if}
            </td>
        </tr>
    {/foreach}
    {if Users::isUser()}
        <tr>
            <form action="" method="POST">
                <input type="hidden" name="action" value="item_insert">
                <input type="hidden" name="table" value="planning">
                <input type="hidden" name="parent_table" value="{$table_parentT|default:"subjects"}">
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
        <a href="?page=edit-table&table={$user_sid}_planning" class="button">
            Edit Table
        </a>
    </p>
{/if}
