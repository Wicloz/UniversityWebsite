{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12 view">
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
        {if Users::isUser()}
            <span class="button edit-item-button" onclick="
                var views = document.getElementsByClassName('view');
                var edits = document.getElementsByClassName('edit');
                for (var i = 0; i < views.length; i++) {
                    views[i].classList.add('hide');
                }
                for (var i = 0; i < edits.length; i++) {
                    edits[i].classList.remove('hide');
                }
            ">
                Edit Item
            </span>
            <form action="" method="POST">
                <input type="hidden" name="action" value="item_update">
                <input type="hidden" name="table" value="assignments">
                <input type="hidden" name="id" value="{$item->id}">
                {if $item->completion}
                    <input type="hidden" name="completion" value="0">
                    <input class="button complete-item-button" type="submit" value="Uncomplete Item">
                {else}
                    <input type="hidden" name="completion" value="1">
                    <input class="button complete-item-button" type="submit" value="Complete Item">
                {/if}
            </form>
        {/if}
    </div>
    {if !empty($item->link_report)}
        <div class="paragraph-center col-sm-12 view">
            <h2>Report:</h2>
            {if strpos($item->link_report, '.pdf') !== 0}
                <embed name="report" src="{$item->link_report}" scale="tofit" alt="report" type="application/pdf" controller="true" width="100%" height="600"></embed>
            {else}
                <iframe name="report" src="{$item->link_report}" width="100%" height="600"></iframe>
            {/if}
        </div>
    {/if}

    {if Users::isUser()}
    <div class="paragraph-center col-sm-12 edit hide">
        <form action="" method="POST">
            <div class="form-row">
                <label for="desc_short">Short Description:</label>
                <input type="text" name="desc_short" id="desc_short" value="{$item->desc_short}">
            </div>
            <div class="form-row">
                <label for="substance">Full Description:</label>
                <textarea rows="10" name="desc_full" id="desc_full">
                    {$item->desc_full}
                </textarea>
            </div>
            <div class="form-row">
                <label for="start_date">Start Date:</label>
                <input type="date" class="date" name="start_date" id="start_date" value="{DateFormat::dateDefault($item->start_date)}">
            </div>
            <div class="form-row">
                <label for="end_date">End Date:</label>
                <input type="date" class="date" name="end_date" id="end_date" value="{DateFormat::dateDefault($item->end_date)}">
            </div>
            <div class="form-row">
                <label for="end_time">End Time:</label>
                <input type="time" class="time" name="end_time" id="end_time" value="{DateFormat::timeDefault($item->end_time)}">
            </div>
            <div class="form-row">
                <label for="team">Team:</label>
                <input type="text" name="team" id="team" value="{$item->team}">
            </div>
            <div class="form-row">
                <label for="link_assignment">Assignment Link:</label>
                <input type="url" name="link_assignment" id="link_assignment" value="{$item->link_assignment}">
            </div>
            <div class="form-row">
                <label for="link_repository">Repository Link:</label>
                <input type="url" name="link_repository" id="link_repository" value="{$item->link_repository}">
            </div>
            <div class="form-row">
                <label for="link_report">Report Link:</label>
                <input type="url" name="link_report" id="link_report" value="{$item->link_report}">
            </div>
            <input type="hidden" name="action" value="item_update">
            <input type="hidden" name="table" value="assignments">
            <input type="hidden" name="id" value="{$item->id}">
            <input class="button edit-item-button" type="submit" value="Save Item">
        </form>
    </div>
    {/if}

    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
