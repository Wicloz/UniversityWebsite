<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:34:32
  from "C:\xampp\htdocs\templates\table_today.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef778568179_33951307',
  'file_dependency' => 
  array (
    '7b834210b7252486c0292fce4d657bee06cde799' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\table_today.tpl',
      1 => 1459526682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef778568179_33951307 ($_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['table']->value)) {?>
    <table class="table-fancy">
        <tr>
            <th>Subject</th>
            <th>Type</th>
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
                    <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                        <a href="?page=subjects&subject=<?php echo $_smarty_tpl->tpl_vars['row']->value->subject;?>
">
                            <?php echo $_smarty_tpl->tpl_vars['row']->value->subject_name;?>

                        </a>
                    <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

                </td>
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
                    <?php if ($_smarty_tpl->tpl_vars['row']->value->type === 'assignment' || $_smarty_tpl->tpl_vars['row']->value->type === 'planning') {?>
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
    </table>
<?php } else { ?>
    <p class="message-info">
        Nothing to do today.
    </p>
<?php }
}
}
