{extends file="../main.tpl"}
{block name=content_center}
    {foreach $subjects as $entry}
        <div class="paragraph-center col-sm-12" id="subject_{$entry->abbreviation}">
            <h2>
                <a href="?page=subjects&subject={$entry->abbreviation}">{$entry->name}</a>
            </h2>
            {if !empty($entry->assignments)}
                <h3 style="text-align:left;">Assignments</h3>
                <ul>
                    {if $entry->ass_line_index === -1}
                        <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                    {/if}
                    {foreach $entry->assignments as $assignment}
                        <li>
                            {DateFormat::dateList($assignment->end_date)} - <a href="?page=assignments_item&id={$assignment->id}">{$assignment->desc_short}</a>
                        </li>
                        {if $entry->ass_line_index === $assignment@index}
                            <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                        {/if}
                    {/foreach}
                </ul>
            {/if}
            {if !empty($entry->exams)}
                <h3 style="text-align:left;">Exams</h3>
                <ul>
                    {if $entry->ex_line_index === -1}
                        <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                    {/if}
                    {foreach $entry->exams as $exam}
                        <li>
                            {DateFormat::dateList($exam->date)} - <a href="?page=exams_item&id={$exam->id}">{$exam->weight} {$exam->subject_name}</a>
                        </li>
                        {if $entry->ex_line_index === $exam@index}
                            <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                        {/if}
                    {/foreach}
                </ul>
            {/if}
        </div>
    {/foreach}
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Events:</h2>
        {include file="table_events.tpl" table=$events}
    </div>
{/block}
