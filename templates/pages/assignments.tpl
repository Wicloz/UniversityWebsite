{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>Assignments:</h2>
        {include file="table_assignments.tpl" table=$assignments}
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning Assignments:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
