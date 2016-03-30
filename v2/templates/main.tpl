<!DOCTYPE html>
<html lang="en">
    {include file="head.tpl"}
    <body>
        {include file="header.tpl"}
        {include file="topnav.tpl"}
        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-sm-2" id="content-right">
                    {include file="sidenav.tpl"}
                    {block name=content_right}{/block}
                </div>
                <div class="col-sm-8" id="content-main">
                    {include file="notifications.tpl"}
                    {block name=content_center}{/block}
                </div>
                <div class="col-sm-2" id="content-left">
                    {block name=content_left}{/block}
                </div>
            </div>
        </div>
        {include file="footer.tpl"}
    </body>
</html>
