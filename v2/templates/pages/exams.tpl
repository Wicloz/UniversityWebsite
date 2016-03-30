{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12" id="subject_{$subject.abbreviation}">
        <h2>Exams:</h2>
        {include file="table_exams.tpl" table = $exams|default:array()}
    </div>
{/block}
