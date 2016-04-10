{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>{$item->desc_short}</h2>
        <p>{$item->desc_full}</p>
        <p><i>
            Subject:
            <a href="?page=subjects&subject={$item->subject}">
                {$item->subject_name}
            </a>
            <br>
            Date Assigned: {DateFormat::dateItem($item->start_date)}
            <br>
            Deadline: {DateFormat::dateItem($item->end_date)}, {DateFormat::timeDefault($item->end_time)}
            {if !empty($item->team)}
                <br>
                Team: {$item->team}
            {/if}
            <br>
            Status: {$item->state}
        </i></p>
        {if !empty($item->link_assignment) || !empty($item->link_repository) || !empty($item->link_report)}
            <p>
                <b>Links:</b>
                {if !empty($item->link_assignment)}
                    <br>
                    <a target="_blank" href="{$item->link_assignment}">
                        Assignment
                    </a>
                {/if}
                {if !empty($item->link_repository)}
                    <br>
                    <a target="_blank" href="{$item->link_repository}">
                        Repository
                    </a>
                {/if}
                {if !empty($item->link_report)}
                    <br>
                    <a target="_blank" href="{$item->link_report}">
                        Report
                    </a>
                {/if}
            </p>
        {/if}
        {if Users::isEditor()}
            <a class="button edit-item-button" href="?page=edit-entry&table={$user_sid}_assignments&id={$item->id}">
                Edit Item
            </a>
        {/if}
    </div>
    {if !empty($item->link_report)}
        <div class="paragraph-center col-sm-12">
            <h2>Report:</h2>
            <iframe name="report" src="{$item->link_report}" width="100%" height="600"></iframe>
        </div>
    {/if}
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
