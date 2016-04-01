<?php
/* Smarty version 3.1.29, created on 2016-04-01 22:14:11
  from "C:\xampp\htdocs\v2\templates\table_assignments.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fed6936ff382_94121972',
  'file_dependency' => 
  array (
    '15fd5d46fa8da581551764c7dc945087b970a0d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\table_assignments.tpl',
      1 => 1459540815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fed6936ff382_94121972 ($_smarty_tpl) {
?>
<table class="table-fancy">
    <tr>
        <th>Deadline</th>
        <th>Subject</th>
        <th>Task</th>
        <th>Team</th>
        <th>Links</th>
        <th>Status</th>
    </tr>
    <?php
$_from = $_smarty_tpl->tpl_vars['table']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
        <?php $_smarty_tpl->tpl_vars['s1'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 's1', 0);?>
        <?php $_smarty_tpl->tpl_vars['s2'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 's2', 0);?>
        <?php if ($_smarty_tpl->tpl_vars['row']->value->completion) {?>
            <?php $_smarty_tpl->tpl_vars['s1'] = new Smarty_Variable('<s>', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 's1', 0);?>
            <?php $_smarty_tpl->tpl_vars['s2'] = new Smarty_Variable('</s>', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 's2', 0);?>
        <?php }?>
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;
echo $_smarty_tpl->tpl_vars['row']->value->end_date;?>
, <?php echo $_smarty_tpl->tpl_vars['row']->value->end_time;
echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                    <a href="?page=subjects&subject=<?php echo $_smarty_tpl->tpl_vars['row']->value->subject;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['row']->value->subject_name;?>

                    </a>
                <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                    <a href="?page=assignments_item&id=<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['row']->value->desc_short;?>

                    </a>
                <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;
echo $_smarty_tpl->tpl_vars['row']->value->team;
echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                    <?php if (!empty($_smarty_tpl->tpl_vars['row']->value->link_assignment)) {?>
                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value->link_assignment;?>
">
                            Assignment
                        </a>
                        <?php if (!empty($_smarty_tpl->tpl_vars['row']->value->link_repository)) {?>/<?php }?>
                    <?php }?>
                    <?php if (!empty($_smarty_tpl->tpl_vars['row']->value->link_repository)) {?>
                        <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['row']->value->link_repository;?>
">
                            Repository
                        </a>
                    <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php if (empty($_smarty_tpl->tpl_vars['row']->value->todayRow)) {?>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="assignments">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
">
                        <input type="hidden" name="done" value="<?php echo !$_smarty_tpl->tpl_vars['row']->value->completion;?>
">
                        <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                        <input class="button submit-button table-button" type="submit" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->state;?>
">
                    </form>
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['row']->value->state;?>

                <?php }?>
            </td>
        </tr>
    <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
    <?php if (Users::isEditor()) {?>
        <tr>
            <form action="" method="POST">
                <input type="hidden" name="action" value="item_insert">
                <input type="hidden" name="table" value="assignments">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <td>
                    <input type="date" name="date" id="date" value="">,
                    <input type="time" name="time" id="time" value="">
                </td>
                <td>
                    <select name="subject" id="subject">
                        <?php
$_from = Queries::subjects();
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_1_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_1_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['subject']->value->abbreviation;?>
" <?php if (Input::get('subject') === $_smarty_tpl->tpl_vars['subject']->value->abbreviation) {?>selected<?php }?>>
                            <?php echo $_smarty_tpl->tpl_vars['subject']->value->name;?>

                        </option>
                        <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_local_item;
}
if ($__foreach_subject_1_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_1_saved_item;
}
?>
                    </select>
                </td>
                <td>
                    <input type="text" name="task" id="task" value="">
                </td>
                <td>
                    <input type="text" name="team" id="team" value="">
                </td>
                <td>
                    <input type="url" name="link" id="link" value="">
                </td>
                <td>
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    <?php }?>
</table>
<?php if (Users::isEditor()) {?>
    <p>
        <a href="?page=edit-table&table=assignments" class="button">
            Edit Table
        </a>
    </p>
<?php }
}
}
