{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12" id="subject_{$subject.abbreviation}">
        <h2>Assignments:</h2>
        {include file="table_assignments.tpl" table = $assignments|default:array()}
    </div>
{/block}
