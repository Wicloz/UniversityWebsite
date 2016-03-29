{extends file="../main.tpl"}
{block name=content_center}
    {foreach $subjects as $subject}
        <div class="paragraph-center col-sm-12" id="subject_{$subject.abbreviation}">
            <h2>
                <a href="?page=subjects&subject={$subject.abbreviation}">{$subject.name}</a>
            </h2>
            {if !empty($subject.assignments)}
                <h3 style="text-align:left;">Assignments</h3>
                <ul>
                    {if $subject.ass_line_index === -1}
                        <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                    {/if}
                    {foreach $subject.assignments as $assignment}
                        <li>
                            {$assignment.date} - <a href="?page=assignments_item&id={$assignment.id}">{$assignment.description}</a>
                        </li>
                        {if $subject.ass_line_index === $assignment@key}
                            <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                        {/if}
                    {/foreach}
                </ul>
            {/if}
            {if !empty($subject.exams)}
                <h3 style="text-align:left;">Exams</h3>
                <ul>
                    {if $subject.ex_line_index === -1}
                        <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                    {/if}
                    {foreach $subject.exams as $exam}
                        <li>
                            {$exam.date} - <a href="?page=assignments_item&id={$assignment.id}">{$exam.description}</a>
                        </li>
                        {if $subject.ex_line_index === $exam@key}
                            <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                        {/if}
                    {/foreach}
                </ul>
            {/if}
        </div>
    {/foreach}
{/block}
