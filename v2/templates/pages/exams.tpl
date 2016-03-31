{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>Exams:</h2>
        {include file="table_exams.tpl" table=$exams}
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning Exams:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
    <div class="paragraph-center col-sm-12">
        {$schedule}
    </div>
{/block}
