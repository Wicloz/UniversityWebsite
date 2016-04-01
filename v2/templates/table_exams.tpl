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
    <tr>
        <form action="" method="POST">
            <input type="hidden" name="action" value="item_insert">
            <input type="hidden" name="table" value="exams">
            <input type="hidden" name="token" value="{$token|default:""}">
            <td>
                <input type="date" name="date" id="date" value="">
            </td>
            <td>
                <input type="text" name="weight" id="weight" value="" list="weights" autocomplete="off" >
                <datalist id="weights">
                    <option value="Tentamen">
                    <option value="Toets">
                </datalist>
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
                <input class="button submit-button table-button" type="submit" value="Add">
            </td>
        </form>
    </tr>
</table>
<p>
    <a href="?page=list-entries&table=exams" class="button">
        Edit Table
    </a>
</p>
