<?php
/* Smarty version 3.1.29, created on 2016-04-01 23:33:57
  from "C:\xampp\htdocs\v2\templates\pages\assignments_item.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fee945178207_57409145',
  'file_dependency' => 
  array (
    '3ccc16d803755b1d78f7dece4131344138968289' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\assignments_item.tpl',
      1 => 1459546435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_planning.tpl' => 1,
  ),
),false)) {
function content_56fee945178207_57409145 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_97556fee9450facd4_41071368',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/assignments_item.tpl */
function block_97556fee9450facd4_41071368($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2><?php echo $_smarty_tpl->tpl_vars['item']->value->desc_short;?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['item']->value->desc_full;?>
</p>
        <p><i>
            Subject:
            <a href="index.php?page=subjects&subject=<?php echo $_smarty_tpl->tpl_vars['item']->value->subject;?>
">
                <?php echo $_smarty_tpl->tpl_vars['item']->value->subject_name;?>

            </a>
            <br>
            Date Assigned: <?php echo DateFormat::dateItem($_smarty_tpl->tpl_vars['item']->value->start_date);?>

            <br>
            Deadline: <?php echo DateFormat::dateItem($_smarty_tpl->tpl_vars['item']->value->end_date);?>
, <?php echo DateFormat::timeDefault($_smarty_tpl->tpl_vars['item']->value->end_time);?>

            <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->team)) {?>
                <br>
                Team: <?php echo $_smarty_tpl->tpl_vars['item']->value->team;?>

            <?php }?>
            <br>
            Status: <?php echo $_smarty_tpl->tpl_vars['item']->value->state;?>

        </i></p>
        <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->link_assignment) || !empty($_smarty_tpl->tpl_vars['item']->value->link_repository) || !empty($_smarty_tpl->tpl_vars['item']->value->link_report)) {?>
            <p>
                <b>Links:</b>
                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->link_assignment)) {?>
                    <br>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['item']->value->link_assignment;?>
">
                        Assignment
                    </a>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->link_repository)) {?>
                    <br>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['item']->value->link_repository;?>
">
                        Repository
                    </a>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->link_report)) {?>
                    <br>
                    <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['item']->value->link_report;?>
">
                        Report
                    </a>
                <?php }?>
            </p>
        <?php }?>
        <a class="button edit-item-button" href="index.php?page=edit-entry&table=assignments&id=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            Edit Item
        </a>
    </div>
    <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->link_report)) {?>
        <div class="paragraph-center col-sm-12">
            <h2>Report:</h2>
            <iframe name="report" src="<?php echo $_smarty_tpl->tpl_vars['row']->value->link_report;?>
" width="100%" height="600"></iframe>
        </div>
    <?php }?>
    <div class="paragraph-center col-sm-12">
        <h2>Planning:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
