{if !empty($table)}
    <table class="table-fancy">
        <tr>
            <th>Deadline</th>
            <th>Subject</th>
            <th>Task</th>
            <th>Team</th>
            <th>Links</th>
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
                    {$s1}{$row->end_date} {$row->end_time}{$s2}
                </td>
                <td>
                    {$s1}
                        <a href="?page=subjects&subject={$row->subject_abb}">
                            {$row->subject}
                        </a>
                    {$s2}
                </td>
                <td>
                    {$s1}
                        <a href="?page=assignments_item&id={$row->id}">
                            {$row->desc_short}
                        </a>
                    {$s2}
                </td>
                <td>
                    {$s1}{$row->team}{$s2}
                </td>
                <td>
                    {$s1}
                        {if !empty($row->link_assignment)}
                            <a target="_blank" href="{$row->link_assignment}">
                                Assignment
                            </a>
                            {if !empty($row->link_repository)}/{/if}
                        {/if}
                        {if !empty($row->link_repository)}
                            <a target="_blank" href="{$row->link_repository}">
                                Repository
                            </a>
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
        No assignments were found.
    </p>
{/if}
