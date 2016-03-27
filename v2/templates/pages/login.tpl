{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>Test</h2>
        <p>{$test|default: ""}</p>
    </div>
{/block}
