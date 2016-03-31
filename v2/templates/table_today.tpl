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
                    {$row->state}
                </td>
            </tr>
        {/foreach}
    </table>
{else}
    <p class="message-info">
        Nothing to do today.
    </p>
{/if}
