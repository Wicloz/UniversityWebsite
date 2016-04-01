<?php
/* Smarty version 3.1.29, created on 2016-04-01 23:44:53
  from "C:\xampp\htdocs\v2\templates\pages\subjects.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56feebd5e71a84_11448442',
  'file_dependency' => 
  array (
    'cadbc47f107c5b7cb60814a8cc2f67d9a5adecc3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\subjects.tpl',
      1 => 1459547091,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_events.tpl' => 1,
    'file:table_planning.tpl' => 1,
  ),
),false)) {
function content_56feebd5e71a84_11448442 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_1339656feebd5e30337_70325791',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/subjects.tpl */
function block_1339656feebd5e30337_70325791($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2><?php echo $_smarty_tpl->tpl_vars['subject']->value->name;?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['subject']->value->content;?>
</p>
        <p>
            <a class="button subject-button" href="?page=edit-entry&table=subjects&id=<?php echo $_smarty_tpl->tpl_vars['subject']->value->id;?>
">
                Edit Item
            </a>
        </p>
    </div>
    <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value->link_home) || !empty($_smarty_tpl->tpl_vars['subject']->value->link_schedule) || !empty($_smarty_tpl->tpl_vars['subject']->value->link_powerpoints) || !empty($_smarty_tpl->tpl_vars['subject']->value->link_assignments) || !empty($_smarty_tpl->tpl_vars['subject']->value->link_marks)) {?>
        <div class="paragraph-left col-sm-12">
            <h2>Links:</h2>
            <ul>
                <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value->link_home)) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['subject']->value->link_home;?>
" target="_blank">
                            Main Page
                        </a>
                    </li>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value->link_schedule)) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['subject']->value->link_schedule;?>
" target="_blank">
                            Schedule
                        </a>
                    </li>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value->link_powerpoints)) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['subject']->value->link_powerpoints;?>
" target="_blank">
                            College Slides
                        </a>
                    </li>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value->link_assignments)) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['subject']->value->link_assignments;?>
" target="_blank">
                            Assignments
                        </a>
                    </li>
                <?php }?>
                <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value->link_marks)) {?>
                    <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['subject']->value->link_marks;?>
" target="_blank">
                            Marks
                        </a>
                    </li>
                <?php }?>
            </ul>
        </div>
    <?php }?>
    <div class="paragraph-center col-sm-12">
        <h2>Events:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_events.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['events']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
