{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        {$form = sprintf('assignments_item_%s', $item->id)}
        {$pooff = ''}
        {if Users::isUser()}
            {$pooff = 'pooff-text'}
            <form action="" method="POST" id="{$form}">
                <input type="hidden" name="action" value="item_update">
                <input type="hidden" name="table" value="assignments">
                <input type="hidden" name="id" value="{$item->id}">
        {/if}
        <h2>
            <span id="{$form}-desc" class="{$pooff}">{$item->desc_short}</span>
            {if Users::isUser()}
                <input id="{$form}-desc-input" type="text" name="desc_short" value="{$item->desc_short}" style="width:80%;" class="pooff-hidden">
            {/if}
        </h2>
        {$item->desc_full}
        <p><i>
            Subject:
            <a href="?page=subjects&subject={$item->subject}">
                {$item->subject_name}
            </a>
            <br>
            <span id="{$form}-start-label">Date Assigned:</span>
            <span id="{$form}-start" class="{$pooff}">{DateFormat::dateItem($item->start_date)}</span>
            {if Users::isUser()}
                </i>
                <input id="{$form}-start-input" type="date" name="start_date" placeholder="dd-mm-yyyy" value="{DateFormat::dateDefault($item->start_date)}" class="pooff-hidden date">
                <i>
            {/if}
            <br>
            <span id="{$form}-end-label">Deadline:</span>
            <span id="{$form}-end" class="{$pooff}">{DateFormat::dateItem($item->end_date)}, {DateFormat::timeDefault($item->end_time)}</span>
            {if Users::isUser()}
                </i>
                <input id="{$form}-end-input" type="datetime" name="end" placeholder="dd-mm-yyyy, hh:mm" value="{DateFormat::dateTimeTable(sprintf('%s %s', $item->end_date, $item->end_time))}" class="pooff-hidden datetime">
                <i>
            {/if}
            {if !empty($item->team)}
                <br>
                <span id="{$form}-team-label">Team:</span>
                <span id="{$form}-team" class="{$pooff}">{$item->team}</span>
                {if Users::isUser()}
                    </i>
                    <input id="{$form}-team-input" type="text" name="team" value="{$item->team}" class="pooff-hidden">
                    <i>
                {/if}
            {/if}
            <br>
            Status: {$item->state}
        </i></p>
        {if !empty($item->link_assignment) || !empty($item->link_repository) || !empty($item->link_report)}
            <p>
                <b>Links:</b>
                {if !empty($item->link_assignment)}
                    <br>
                    {if Users::isUser()}
                        <span id="{$form}-link_assignment" class="{$pooff}" style="display:none;"></span>
                        <span id="{$form}-link_assignment-label">Edit -</span>
                    {/if}
                    <a target="_blank" href="{$item->link_assignment}">
                        Assignment
                    </a>
                    {if Users::isUser()}
                        <input id="{$form}-link_assignment-input" type="url" name="link_assignment" value="{$item->link_assignment}" style="width:70%;" class="pooff-hidden">
                    {/if}
                {/if}
                {if !empty($item->link_repository)}
                    <br>
                    {if Users::isUser()}
                        <span id="{$form}-link_repository" class="{$pooff}" style="display:none;"></span>
                        <span id="{$form}-link_repository-label">Edit -</span>
                    {/if}
                    <a target="_blank" href="{$item->link_repository}">
                        Repository
                    </a>
                    {if Users::isUser()}
                        <input id="{$form}-link_repository-input" type="url" name="link_repository" value="{$item->link_repository}" style="width:70%;" class="pooff-hidden">
                    {/if}
                {/if}
                {if !empty($item->link_report)}
                    <br>
                    {if Users::isUser()}
                        <span id="{$form}-link_report" class="{$pooff}" style="display:none;"></span>
                        <span id="{$form}-link_report-label">Edit -</span>
                    {/if}
                    <a target="_blank" href="{$item->link_report}">
                        Report
                    </a>
                    {if Users::isUser()}
                        <input id="{$form}-link_report-input" type="url" name="link_report" value="{$item->link_report}" style="width:70%;" class="pooff-hidden">
                    {/if}
                {/if}
            </p>
        {/if}
        {if Users::isUser()}
            </form>
        {/if}
        {if Users::isUser()}
            <a class="button edit-item-button" href="?page=edit-entry&table={$user_sid}_assignments&id={$item->id}">
                Edit Item
            </a>
        {/if}
    </div>
    {if !empty($item->link_report)}
        <div class="paragraph-center col-sm-12">
            <h2>Report:</h2>
            {if strpos($item->link_report, '.pdf') !== 0}
                <embed name="report" src="{$item->link_report}" scale="tofit" alt="report" type="application/pdf" controller="true" width="100%" height="600"></embed>
            {else}
                <iframe name="report" src="{$item->link_report}" width="100%" height="600"></iframe>
            {/if}
        </div>
    {/if}
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
