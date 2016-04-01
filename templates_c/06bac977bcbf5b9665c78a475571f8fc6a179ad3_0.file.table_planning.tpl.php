<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:34:32
  from "C:\xampp\htdocs\templates\table_planning.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef7785e5b36_69836144',
  'file_dependency' => 
  array (
    '06bac977bcbf5b9665c78a475571f8fc6a179ad3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\table_planning.tpl',
      1 => 1459546731,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef7785e5b36_69836144 ($_smarty_tpl) {
?>
<table class="table-fancy">
    <tr>
        <th>Date</th>
        <?php if (empty($_smarty_tpl->tpl_vars['subject']->value) && empty($_smarty_tpl->tpl_vars['item']->value)) {?>
            <th>Subject</th>
        <?php }?>
        <th>Estimated Duration</th>
        <th>Goal</th>
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
        <?php if ($_smarty_tpl->tpl_vars['row']->value->done) {?>
            <?php $_smarty_tpl->tpl_vars['s1'] = new Smarty_Variable('<s>', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 's1', 0);?>
            <?php $_smarty_tpl->tpl_vars['s2'] = new Smarty_Variable('</s>', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 's2', 0);?>
        <?php }?>
        <tr>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;
echo $_smarty_tpl->tpl_vars['row']->value->date_start;?>
 - <?php echo $_smarty_tpl->tpl_vars['row']->value->date_end;
echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
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
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;
echo $_smarty_tpl->tpl_vars['row']->value->duration;
echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;
echo $_smarty_tpl->tpl_vars['row']->value->goal;
echo $_smarty_tpl->tpl_vars['s2']->value;?>

            </td>
            <td>
                <?php if (empty($_smarty_tpl->tpl_vars['row']->value->todayRow)) {?>
                    <form action="" method="POST">
                        <input type="hidden" name="action" value="switch_completion">
                        <input type="hidden" name="table" value="planning">
                        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
">
                        <input type="hidden" name="done" value="<?php echo !$_smarty_tpl->tpl_vars['row']->value->done;?>
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
    <?php if (Users::isEditor() && !empty($_smarty_tpl->tpl_vars['table_parentT']->value) && !empty($_smarty_tpl->tpl_vars['table_parentI']->value)) {?>
        <tr>
            <form action="" method="POST">
                <input type="hidden" name="action" value="item_insert">
                <input type="hidden" name="table" value="planning">
                <input type="hidden" name="parent_table" value="<?php echo $_smarty_tpl->tpl_vars['table_parentT']->value;?>
">
                <input type="hidden" name="parent_id" value="<?php echo $_smarty_tpl->tpl_vars['table_parentI']->value;?>
">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <td>
                    <input type="date" name="date_start" id="date_start" value="">
                    -
                    <input type="date" name="date_end" id="date_end" value="">
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
                    <input type="text" name="duration" id="duration" value="">
                </td>
                <td>
                    <input type="text" name="goal" id="goal" value="">
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
        <a href="?page=edit-table&table=planning" class="button">
            Edit Table
        </a>
    </p>
<?php }
}
}
