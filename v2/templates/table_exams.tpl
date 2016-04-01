{if !empty($table)}
    <table class="table-fancy">
        <tr>
            <th>Date</th>
            <th>Weight</th>
            <th>Subject</th>
            <th>Mark</th>
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
                <td>
                    {$s1}
                        <a href="?page=exams_item&id={$row->id}">
                            {$row->weight}
                        </a>
                    {$s2}
                </td>
                <td>
                    {$s1}
                        <a href="?page=subjects&subject={$row->subject}">
                            {$row->subject_name}
                        </a>
                    {$s2}
                </td>
                <td>
                    {$row->mark}
                </td>
            </tr>
        {/foreach}
    </table>
{else}
    <p class="message-info">
        No exams were found.
    </p>
{/if}
<p>
    <a href="?page=list-entries&table=exams" class="button">
        Edit Table
    </a>
</p>
