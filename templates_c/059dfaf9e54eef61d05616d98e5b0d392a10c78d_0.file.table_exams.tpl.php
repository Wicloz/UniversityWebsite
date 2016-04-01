<?php
/* Smarty version 3.1.29, created on 2016-04-01 23:53:45
  from "C:\xampp\htdocs\v2\templates\table_exams.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56feede98176d9_94951955',
  'file_dependency' => 
  array (
    '059dfaf9e54eef61d05616d98e5b0d392a10c78d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\table_exams.tpl',
      1 => 1459540790,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56feede98176d9_94951955 ($_smarty_tpl) {
?>
<table class="table-fancy">
    <tr>
        <th>Date</th>
        <th>Weight</th>
        <th>Subject</th>
        <th>Mark</th>
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
            <td>
                <?php echo $_smarty_tpl->tpl_vars['s1']->value;?>

                    <a href="?page=exams_item&id=<?php echo $_smarty_tpl->tpl_vars['row']->value->id;?>
">
                        <?php echo $_smarty_tpl->tpl_vars['row']->value->weight;?>

                    </a>
                <?php echo $_smarty_tpl->tpl_vars['s2']->value;?>

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
                <?php echo $_smarty_tpl->tpl_vars['row']->value->mark;?>

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
                <input type="hidden" name="table" value="exams">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <td>
                    <input type="date" name="date" id="date" value="">
                </td>
                <td>
                    <input type="text" name="weight" id="weight" value="" list="weights" autocomplete="off" >
                    <datalist id="weights">
                        <option value="Tentamen">
                        <option value="Toets">
                    </datalist>
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
                    <input class="button submit-button table-button" type="submit" value="Add">
                </td>
            </form>
        </tr>
    <?php }?>
</table>
<?php if (Users::isEditor()) {?>
    <p>
        <a href="?page=edit-table&table=exams" class="button">
            Edit Table
        </a>
    </p>
<?php }
}
}
