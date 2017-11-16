<table class="table-fancy">
    <tr>
        <th>Date</th>
        {if empty($subject) && empty($item)}
            <th>For</th>
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
            {$form = sprintf('planning_%s', $row->id)}
            {$pooff = ''}
            {if Users::isUser() && empty($row->todayRow)}
                {$pooff = 'pooff-text'}
                <form action="" method="POST" id="{$form}">
                    <input type="hidden" name="action" value="item_update">
                    <input type="hidden" name="table" value="planning">
                    <input type="hidden" name="id" value="{$row->id}">
            {/if}
            <td {$strike}>
                <span id="{$form}-start" class="{$pooff}">{$row->date_start}</span>
                {if Users::isUser() && empty($row->todayRow)}
                    <input id="{$form}-start-input" type="date" name="date_start" value="{$row->date_start}" class="pooff-hidden date">
                {/if}
                -
                <span id="{$form}-end" class="{$pooff}">{$row->date_end}</span>
                {if Users::isUser() && empty($row->todayRow)}
                    <input id="{$form}-end-input" type="date" name="date_end" value="{$row->date_end}" class="pooff-hidden date">
                {/if}
            </td>
            {if empty($subject) && empty($item)}
                <td {$strike}>
                    <a href="?{$row->parent_page}">
                        {$row->parent_name}
                    </a>
                </td>
            {/if}
            <td {$strike}>
                <span id="{$form}-duration" class="{$pooff}">{$row->duration}</span>
                {if Users::isUser() && empty($row->todayRow)}
                <input id="{$form}-duration-input" type="text" name="duration" value="{$row->duration}" class="pooff-hidden duration">
                {/if}
            </td>
            <td {$strike}>
                <span id="{$form}-goal" class="{$pooff}">{$row->goal}</span>
                {if Users::isUser() && empty($row->todayRow)}
                    <input id="{$form}-goal-input" type="text" name="goal" value="{$row->goal}" class="pooff-hidden">
                {/if}
            </td>
            {if Users::isUser() && empty($row->todayRow)}
                </form>
            {/if}
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
                    <input type="date" name="date_start" placeholder="dd-mm-yyyy" value="" class="date">
                    -
                    <input type="date" name="date_end" placeholder="dd-mm-yyyy" value="" class="date">
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
                    <input type="time" name="duration" value="" class="duration">
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
{if Users::isUser()}
    <p>
        <a href="?page=edit-table&table={$user_sid}_planning" class="button">
            Edit Table
        </a>
    </p>
{/if}
