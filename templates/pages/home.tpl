{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        {$introduction}
    </div>
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Today:</h2>
        {include file="table_today.tpl" table=$today}
    </div>
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Upcoming Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Upcoming Events:</h2>
        {include file="table_events.tpl" table=$events}
    </div>
    <div class="paragraph-center col-sm-12">
        {$schedule}
    </div>
{/block}
