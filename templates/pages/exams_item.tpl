{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>{$item->weight} {$item->subject_name}</h2>
        <p>{$item->substance}</p>
        <p><i>
            Subject:
            <a href="?page=subjects&subject={$item->subject}">
                {$item->subject_name}
            </a>
            <br>
            Exam Date: {DateFormat::dateItem($item->date)}
            <br>
            Mark: {$item->mark}
            {if !empty($item->link)}
                <br>
                Link: <a target="_blank" href="{$item->link}">{$item->link}</a>
            {/if}
        </i></p>
        {if Users::isEditor()}
            <a class="button edit-item-button" href="?page=edit-entry&table=exams&id={$item->id}">
                Edit Item
            </a>
        {/if}
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
