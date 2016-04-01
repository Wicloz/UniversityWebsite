{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>{$subject_name}</h2>
        <p>{$subject_content}</p>
        <p>
            <a class="button subject-button" href="?page=edit-entry&table=subjects&id={$subject_id}">
                Edit Item
            </a>
        </p>
    </div>
    {if !empty($link_home) || !empty($link_schedule) || !empty($link_powerpoints) || !empty($link_assignments) || !empty($link_marks)}
        <div class="paragraph-center col-sm-12">
            <h2>Links:</h2>
            <ul>
                {if !empty($link_home)}
                    <li>
                        <a href="{$link_home}" target="_blank">
                            Main Page
                        </a>
                    </li>
                {/if}
                {if !empty($link_schedule)}
                    <li>
                        <a href="{$link_schedule}" target="_blank">
                            Schedule
                        </a>
                    </li>
                {/if}
                {if !empty($link_powerpoints)}
                    <li>
                        <a href="{$link_powerpoints}" target="_blank">
                            College Slides
                        </a>
                    </li>
                {/if}
                {if !empty($link_assignments)}
                    <li>
                        <a href="{$link_assignments}" target="_blank">
                            Assignments
                        </a>
                    </li>
                {/if}
                {if !empty($link_marks)}
                    <li>
                        <a href="{$link_marks}" target="_blank">
                            Marks
                        </a>
                    </li>
                {/if}
            </ul>
        </div>
    {/if}
    <div class="paragraph-center col-sm-12">
        <h2>Events:</h2>
        {include file="table_events.tpl" table=$events}
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning:</h2>
        {include file="table_planning.tpl" table=$planning}
    </div>
{/block}
