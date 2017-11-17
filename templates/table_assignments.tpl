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
        {$strike = ''}
        {if $row->completion}
            {$strike = 'class="complete"'}
        {/if}
        <tr>
            <td {$strike}>
                {$row->end_date}, {$row->end_time}
            </td>
            <td {$strike}>
                <a href="?page=subjects&subject={$row->subject}">
                    {$row->subject_name}
                </a>
            </td>
            <td {$strike}>
                <a href="?page=assignments_item&id={$row->id}">
                    {$row->desc_short}
                </a>
            </td>
            <td {$strike}>
                {$row->team}
            </td>
            <td {$strike}>
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
            </td>
            <td>
                {if Users::isUser() && empty($row->todayRow)}
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="assignments">
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
                <input type="hidden" name="table" value="assignments">
                <td>
                    <input type="text" name="date" placeholder="dd-mm-yyyy" value="" class="date">,
                    <input type="text" name="time" placeholder="hh:mm:ss" value="" class="time">
                </td>
                <td>
                    <select name="subject">
                        {foreach Queries::subjects() as $subject}
                            <option value="{$subject->abbreviation}" {if Input::get('subject') === $subject->abbreviation}selected{/if}>
                                {$subject->name}
                            </option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <input type="text" name="task" value="">
                </td>
                <td>
                    <input type="text" name="team" value="">
                </td>
                <td>
                    <input type="url" name="link" value="">
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
        <a href="?page=edit-table&table={$user_sid}_assignments" class="button">
            Edit Table
        </a>
    </p>
{/if}
