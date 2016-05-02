{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        {$form = sprintf('exam_item_%s', $item->id)}
        {$pooff = ''}
        {if Users::isUser()}
            {$pooff = 'pooff-text'}
            <form action="" method="POST" id="{$form}">
                <input type="hidden" name="action" value="item_update">
                <input type="hidden" name="table" value="exams">
                <input type="hidden" name="id" value="{$item->id}">
        {/if}
        <h2>
            <span id="{$form}-weight" class="{$pooff}">{$item->weight}</span>
            {if Users::isUser()}
                <input id="{$form}-weight-input" type="text" name="weight" value="{$item->weight}" list="weights" autocomplete="off" class="pooff-hidden">
                <datalist id="weights">
                    <option value="Tentamen">
                    <option value="Toets">
                </datalist>
            {/if}
            {$item->subject_name}
        </h2>
        {$item->substance}
        <p><i>
            Subject:
            <a href="?page=subjects&subject={$item->subject}">
                {$item->subject_name}
            </a>
            <br>
            <span id="{$form}-date-label">Exam Date:</span>
            <span id="{$form}-date" class="{$pooff}">{DateFormat::dateItem($item->date)}</span>
            {if Users::isUser()}
                </i>
                <input id="{$form}-date-input" type="date" name="date" placeholder="dd-mm-yyyy" value="{DateFormat::dateDefault($item->date)}" class="pooff-hidden date">
                <i>
            {/if}
            <br>
            <span id="{$form}-mark-label">Mark:</span>
            <span id="{$form}-mark" class="{$pooff}">{$item->mark}</span>
            {if Users::isUser()}
                </i>
                <input id="{$form}-mark-input" type="number" name="mark" step="0.01" value="{$item->mark}" class="pooff-hidden">
                <i>
            {/if}
            {if !empty($item->link)}
                <br>
                <span id="{$form}-link-label">Link:</span>
                <a target="_blank" href="{$item->link}"><span id="{$form}-link" class="{$pooff}">{$item->link}</span></a>
                {if Users::isUser()}
                    </i>
                    <input id="{$form}-link-input" type="url" name="link" value="{$item->link}" style="width:70%;" class="pooff-hidden">
                    <i>
                {/if}
            {/if}
        </i></p>
        {if Users::isUser()}
            </form>
        {/if}
        {if Users::isUser()}
            <a class="button edit-item-button" href="?page=edit-entry&table={$user_sid}_exams&id={$item->id}">
                Edit Item
            </a>
        {/if}
    </div>
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
