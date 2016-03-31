{if !empty($table)}
    <table class="table-fancy">
        <tr>
            <th>Date</th>
            <th>Subject</th>
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
                <td>
                    {$s1}
                        <a href="?page=subjects&subject={$row->subject}">
                            {$row->subject_name}
                        </a>
                    {$s2}
                </td>
                <td>
                    {$s1}{$row->duration}{$s2}
                </td>
                <td>
                    {$s1}{$row->goal}{$s2}
                </td>
                <td>
                    {$s1}{$row->state}{$s2}
                </td>
            </tr>
        {/foreach}
    </table>
{else}
    <p class="message-info">
        No planning was found.
    </p>
{/if}
