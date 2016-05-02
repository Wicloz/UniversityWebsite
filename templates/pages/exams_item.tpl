{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12 view">
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
        {/if}
    </div>

    {if Users::isUser()}
        <div class="paragraph-center col-sm-12 edit hide">
            <form action="" method="POST">
                <div class="form-row">
                    <label for="weight">Weight:</label>
                    <input type="text" name="weight" id="weight" value="{$item->weight}" list="weights" autocomplete="off">
                    <datalist id="weights">
                        <option value="Tentamen">
                        <option value="Toets">
                    </datalist>
                </div>
                <div class="form-row">
                    <label for="substance">Substance:</label>
                    <textarea rows="10" name="substance" id="substance">
                        {$item->substance}
                    </textarea>
                </div>
                <div class="form-row">
                    <label for="date">Date:</label>
                    <input type="date" class="date" name="date" id="date" value="{DateFormat::dateDefault($item->date)}">
                </div>
                <div class="form-row">
                    <label for="link">Link:</label>
                    <input type="url" name="link" id="link" value="{$item->link}">
                </div>
                <div class="form-row">
                    <label for="mark">Mark:</label>
                    <input type="number" step="0.01" name="mark" id="mark" value="{$item->mark}">
                </div>
                <input type="hidden" name="action" value="item_update">
                <input type="hidden" name="table" value="exams">
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
