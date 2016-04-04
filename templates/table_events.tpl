<table class="table-fancy">
    <tr>
        <th>Date</th>
        {if !empty($show_type)}
            <th>Type</th>
        {/if}
        {if empty($subject)}
            <th>Subject</th>
        {/if}
        <th>Task</th>
        <th>Status</th>
    </tr>
    {foreach $table as $row}
        {$strike = ''}
        {if $row->completion}
            {$strike = 'class="complete"'}
        {/if}
        <tr>
            <td {$strike}>
                {$row->date}
            </td>
            {if !empty($show_type)}
                <td {$strike}>
                    {if $row->type === 'assignment'}
                        Assignment Deadline
                    {elseif $row->type === 'exam'}
                        Exam
                    {elseif $row->type === 'planning'}
                        Planning
                    {/if}
                </td>
            {/if}
            {if empty($subject) && empty($item)}
                <td {$strike}>
                    <a href="?page=subjects&subject={$row->subject}">
                        {$row->subject_name}
                    </a>
                </td>
            {/if}
            <td {$strike}>
                {if $row->type === 'assignment'}
                    <a href="?page=assignments_item&id={$row->id}">
                        {$row->task}
                    </a>
                {elseif $row->type === 'exam'}
                    <a href="?page=exams_item&id={$row->id}">
                        {$row->task}
                    </a>
                {else}
                    {$row->task}
                {/if}
            </td>
            <td>
                {if Users::isEditor() && ($row->type === 'assignment' || $row->type === 'planning') && empty($row->todayRow)}
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="{if $row->type === 'assignment'}assignments{else}{$row->type}{/if}">
                        <input type="hidden" name="id" value="{$row->id}">
                        <input type="hidden" name="done" value="{!$row->completion}">
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
                <input type="hidden" name="table" value="events">
                <input type="hidden" name="token" value="{$token|default:""}">
                <td>
                    <input type="datetime" name="date" placeholder="yyyy-mm-dd, hh:mm" value="" class="datetime">
                </td>
                {if empty($subject)}
                    <td>
                        <select name="subject">
                            {foreach Queries::subjects() as $subject}
                                <option value="{$subject->abbreviation}" {if Input::get('subject') === $subject->abbreviation}selected{/if}>
                                    {$subject->name}
                                </option>
                            {/foreach}
                        </select>
                    </td>
                {else}
                    <input type="hidden" name="subject" value="{$subject->abbreviation}">
                {/if}
                <td>
                    <input type="text" name="task" value="">
                </td>
                <td>
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    {/if}
</table>
