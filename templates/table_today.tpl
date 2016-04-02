{if !empty($table)}
    <table class="table-fancy">
        <tr>
            <th>Subject</th>
            <th>Type</th>
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
                    {$s1}
                        <a href="?page=subjects&subject={$row->subject}">
                            {$row->subject_name}
                        </a>
                    {$s2}
                </td>
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
                    {if $row->type === 'assignment' || $row->type === 'planning'}
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
    </table>
{else}
    <p class="message-info">
        Nothing to do today.
    </p>
{/if}