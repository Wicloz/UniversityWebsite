{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>{$subject->name}</h2>
        <p>{$subject->content}</p>
        <p>
            {if Users::isAdmin()}
                <a class="button subject-button" href="?page=edit-entry&table=subjects&id={$subject->id}">
                    Edit Item
                </a>
            {/if}
        </p>
    </div>
    {if !empty($links) && count($links) > 0}
        <div class="paragraph-left col-sm-12">
            <h2>Links:</h2>
            <ul>
                {foreach $links as $name => $url}
                    <li>
                        <a href="{$url}" target="_blank">
                            {$name}
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    {/if}
    {if !empty($subject->link_book)}
        <h2>
            <a href="{$subject->link_book}" target="_blank">
                Link to Book
            </a>
        </h2>
    {/if}
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Events:</h2>
        {include file="table_events.tpl" table=$events}
    </div>
    <div class="paragraph-center paragraph-scroll col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
