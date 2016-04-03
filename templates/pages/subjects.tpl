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
    {if !empty($subject->link_home) || !empty($subject->link_schedule) || !empty($subject->link_powerpoints) || !empty($subject->link_assignments) || !empty($subject->link_marks) || !empty($subject->link_book)}
        <div class="paragraph-left col-sm-12">
            <h2>Links:</h2>
            <ul>
                {if !empty($subject->link_home)}
                    <li>
                        <a href="{$subject->link_home}" target="_blank">
                            Main Page
                        </a>
                    </li>
                {/if}
                {if !empty($subject->link_schedule)}
                    <li>
                        <a href="{$subject->link_schedule}" target="_blank">
                            Schedule
                        </a>
                    </li>
                {/if}
                {if !empty($subject->link_powerpoints)}
                    <li>
                        <a href="{$subject->link_powerpoints}" target="_blank">
                            College Slides
                        </a>
                    </li>
                {/if}
                {if !empty($subject->link_assignments)}
                    <li>
                        <a href="{$subject->link_assignments}" target="_blank">
                            Assignments
                        </a>
                    </li>
                {/if}
                {if !empty($subject->link_marks)}
                    <li>
                        <a href="{$subject->link_marks}" target="_blank">
                            Marks
                        </a>
                    </li>
                {/if}
                {if !empty($subject->link_book)}
                    <li>
                        <a href="{$subject->link_book}" target="_blank">
                            Book
                        </a>
                    </li>
                {/if}
            </ul>
        </div>
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
