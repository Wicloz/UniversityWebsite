<table class="table-fancy">
    <tr>
        <th>Date</th>
        {if !empty($show_type)}
            <th>Type</th>
        {/if}
        {if empty($subject) && empty($item)}
            <th>Subject</th>
        {/if}
        <th>Task</th>
        <th>Status</th>
    </tr>
    {foreach $table as $row}
        {$s1 = ''}
        {$s2 = ''}
        {if $row->completion}
            {$s1 = '<s>'}
            {$s2 = '</s>'}
        {/if}
        <tr>
            <td>
                {$s1}{$row->date}{$s2}
            </td>
            {if !empty($show_type)}
                <td>
                    {$s1}
                        {if $row->type === 'assignment'}
                            Assignment Deadline
                        {elseif $row->type === 'exam'}
                            Exam
                        {elseif $row->type === 'planning'}
                            Planning
                        {/if}
                    {$s2}
                </td>
            {/if}
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
                {$s1}
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
                {$s2}
            </td>
            <td>
                {if ($row->type === 'assignment' || $row->type === 'planning') && empty($row->todayRow)}
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
                    <input type="datetime" name="date" id="date" placeholder="yyyy-mm-dd, hh:mm" value="" class="datetime">
                </td>
                {if empty($subject) && empty($item)}
                    <td>
                        <select name="subject" id="subject">
                            {foreach Queries::subjects() as $subject}
                            <option value="{$subject->abbreviation}" {if Input::get('subject') === $subject->abbreviation}selected{/if}>
                                {$subject->name}
                            </option>
                            {/foreach}
                        </select>
                    </td>
                {/if}
                <td>
                    <input type="text" name="task" id="task" value="">
                </td>
                <td>
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    {/if}
</table>
