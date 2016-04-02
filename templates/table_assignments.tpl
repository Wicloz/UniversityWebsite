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
                {$s1}{$row->end_date}, {$row->end_time}{$s2}
            </td>
            <td>
                {$s1}
                    <a href="?page=subjects&subject={$row->subject}">
                        {$row->subject_name}
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
                {if empty($row->todayRow)}
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="assignments">
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
                <input type="hidden" name="table" value="assignments">
                <input type="hidden" name="token" value="{$token|default:""}">
                <td>
                    <input type="date" name="date" id="date" placeholder="yyyy-mm-dd" value="" class="date">,
                    <input type="time" name="time" id="time" placeholder="hh:mm:ss" value="" class="time">
                </td>
                <td>
                    <select name="subject" id="subject">
                        {foreach Queries::subjects() as $subject}
                        <option value="{$subject->abbreviation}" {if Input::get('subject') === $subject->abbreviation}selected{/if}>
                            {$subject->name}
                        </option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <input type="text" name="task" id="task" value="">
                </td>
                <td>
                    <input type="text" name="team" id="team" value="">
                </td>
                <td>
                    <input type="url" name="link" id="link" value="">
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
        <a href="?page=edit-table&table=assignments" class="button">
            Edit Table
        </a>
    </p>
{/if}
