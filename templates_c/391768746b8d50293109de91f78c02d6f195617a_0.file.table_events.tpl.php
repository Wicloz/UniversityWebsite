<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:45:07
  from "C:\xampp\htdocs\templates\table_events.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef9f3f3ccf5_14862775',
  'file_dependency' => 
  array (
    '391768746b8d50293109de91f78c02d6f195617a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\table_events.tpl',
      1 => 1459550577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef9f3f3ccf5_14862775 ($_smarty_tpl) {
?>
<table class="table-fancy">
    <tr>
        <th>Date</th>
        <?php if (!empty($_smarty_tpl->tpl_vars['show_type']->value)) {?>
            <th>Type</th>
        <?php }?>
        <?php if (empty($_smarty_tpl->tpl_vars['subject']->value) && empty($_smarty_tpl->tpl_vars['item']->value)) {?>
            <th>Subject</th>
        <?php }?>
        <th>Task</th>
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
echo $_smarty_tpl->tpl_vars['row']->value->date;
echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <?php if (!empty($_smarty_tpl->tpl_vars['show_type']->value)) {?>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                        <?php if ($_smarty_tpl->tpl_vars['row']->value->type === 'assignment') {?>
                            Assignment Deadline
                        <?php } elseif ($_smarty_tpl->tpl_vars['row']->value->type === 'exam') {?>
                            Exam
                        <?php } elseif ($_smarty_tpl->tpl_vars['row']->value->type === 'planning') {?>
                            Planning
                        <?php }?>
                    <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

                </td>
            <?php }?>
            <?php if (empty($_smarty_tpl->tpl_vars['subject']->value) && empty($_smarty_tpl->tpl_vars['item']->value)) {?>
                <td>
                    <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                        <a href="?page=subjects&subject=<?php echo $_smarty_tpl->tpl_vars['row']->value->subject;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['row']->value->subject_name;?>

                        </a>
                    <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

                </td>
            <?php }?>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                    <?php if ($_smarty_tpl->tpl_vars['row']->value->type === 'assignment') {?>
                        <a href="?page=assignments_item&id=<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['row']->value->task;?>

                        </a>
                    <?php } elseif ($_smarty_tpl->tpl_vars['row']->value->type === 'exam') {?>
                        <a href="?page=exams_item&id=<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['row']->value->task;?>

                        </a>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['row']->value->task;?>

                    <?php }?>
                <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php if (($_smarty_tpl->tpl_vars['row']->value->type === 'assignment' || $_smarty_tpl->tpl_vars['row']->value->type === 'planning') && empty($_smarty_tpl->tpl_vars['row']->value->todayRow)) {?>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="<?php if ($_smarty_tpl->tpl_vars['row']->value->type === 'assignment') {?>assignments<?php } else {
echo $_smarty_tpl->tpl_vars['row']->value->type;
}?>">
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
                <input type="hidden" name="table" value="events">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <td>
                    <input type="datetime" name="date" id="date" value="">
                </td>
                <?php if (empty($_smarty_tpl->tpl_vars['subject']->value) && empty($_smarty_tpl->tpl_vars['item']->value)) {?>
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
                <?php }?>
                <td>
                    <input type="text" name="task" id="task" value="">
                </td>
                <td>
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    <?php }?>
</table>
<?php }
}
