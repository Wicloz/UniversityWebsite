<table class="table-fancy">
    <tr>
        <th>Date</th>
        <th>Weight</th>
        <th>Subject</th>
        <th>Mark</th>
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
            <td {$strike}>
                <a href="?page=exams_item&id={$row->id}">
                    {$row->weight}
                </a>
            </td>
            <td {$strike}>
                <a href="?page=subjects&subject={$row->subject}">
                    {$row->subject_name}
                </a>
            </td>
            <td>
                {$row->mark}
            </td>
        </tr>
    {/foreach}
    {if Users::isUser()}
        <tr>
            <form action="" method="POST">
                <input type="hidden" name="action" value="item_insert">
                <input type="hidden" name="table" value="exams">
                <td>
                    <input type="date" name="date" placeholder="dd-mm-yyyy" value="" class="date">
                </td>
                <td>
                    <input type="text" name="weight" value="" list="weights" autocomplete="off">
                    <datalist id="weights">
                        <option value="Tentamen">
                        <option value="Toets">
                    </datalist>
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
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    {/if}
</table>
{if Users::isUser()}
    <p>
        <a href="?page=edit-table&table={$user_sid}_exams" class="button">
            Edit Table
        </a>
    </p>
{/if}
