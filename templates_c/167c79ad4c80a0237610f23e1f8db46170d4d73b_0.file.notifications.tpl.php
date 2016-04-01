<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:34:32
  from "C:\xampp\htdocs\templates\notifications.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef77848f983_04310832',
  'file_dependency' => 
  array (
    '167c79ad4c80a0237610f23e1f8db46170d4d73b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\notifications.tpl',
      1 => 1459279142,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef77848f983_04310832 ($_smarty_tpl) {
if (!empty($_smarty_tpl->tpl_vars['successes']->value) || !empty($_smarty_tpl->tpl_vars['infos']->value) || !empty($_smarty_tpl->tpl_vars['warnings']->value) || !empty($_smarty_tpl->tpl_vars['errors']->value)) {?>
    <div class="paragraph-center col-sm-12">
        <?php if (!empty($_smarty_tpl->tpl_vars['successes']->value)) {?>
            <p class="message-success">
                <?php
$_from = $_smarty_tpl->tpl_vars['successes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_success_0_saved_item = isset($_smarty_tpl->tpl_vars['success']) ? $_smarty_tpl->tpl_vars['success'] : false;
$_smarty_tpl->tpl_vars['success'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['success']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['success']->value) {
$_smarty_tpl->tpl_vars['success']->_loop = true;
$__foreach_success_0_saved_local_item = $_smarty_tpl->tpl_vars['success'];
?>
                    <?php echo $_smarty_tpl->tpl_vars['success']->value;?>
<br>
                <?php
$_smarty_tpl->tpl_vars['success'] = $__foreach_success_0_saved_local_item;
}
if ($__foreach_success_0_saved_item) {
$_smarty_tpl->tpl_vars['success'] = $__foreach_success_0_saved_item;
}
?>
            </p>
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['infos']->value)) {?>
            <p class="message-info">
                <?php
$_from = $_smarty_tpl->tpl_vars['infos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_info_1_saved_item = isset($_smarty_tpl->tpl_vars['info']) ? $_smarty_tpl->tpl_vars['info'] : false;
$_smarty_tpl->tpl_vars['info'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['info']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['info']->value) {
$_smarty_tpl->tpl_vars['info']->_loop = true;
$__foreach_info_1_saved_local_item = $_smarty_tpl->tpl_vars['info'];
?>
                    <?php echo $_smarty_tpl->tpl_vars['info']->value;?>
<br>
                <?php
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_local_item;
}
if ($__foreach_info_1_saved_item) {
$_smarty_tpl->tpl_vars['info'] = $__foreach_info_1_saved_item;
}
?>
            </p>
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['warnings']->value)) {?>
            <p class="message-warning">
                <?php
$_from = $_smarty_tpl->tpl_vars['warnings']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_warning_2_saved_item = isset($_smarty_tpl->tpl_vars['warning']) ? $_smarty_tpl->tpl_vars['warning'] : false;
$_smarty_tpl->tpl_vars['warning'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['warning']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['warning']->value) {
$_smarty_tpl->tpl_vars['warning']->_loop = true;
$__foreach_warning_2_saved_local_item = $_smarty_tpl->tpl_vars['warning'];
?>
                    <?php echo $_smarty_tpl->tpl_vars['warning']->value;?>
<br>
                <?php
$_smarty_tpl->tpl_vars['warning'] = $__foreach_warning_2_saved_local_item;
}
if ($__foreach_warning_2_saved_item) {
$_smarty_tpl->tpl_vars['warning'] = $__foreach_warning_2_saved_item;
}
?>
            </p>
        <?php }?>
        <?php if (!empty($_smarty_tpl->tpl_vars['errors']->value)) {?>
            <p class="message-error">
                <?php
$_from = $_smarty_tpl->tpl_vars['errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_error_3_saved_item = isset($_smarty_tpl->tpl_vars['error']) ? $_smarty_tpl->tpl_vars['error'] : false;
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$__foreach_error_3_saved_local_item = $_smarty_tpl->tpl_vars['error'];
?>
                    <?php echo $_smarty_tpl->tpl_vars['error']->value;?>
<br>
                <?php
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_3_saved_local_item;
}
if ($__foreach_error_3_saved_item) {
$_smarty_tpl->tpl_vars['error'] = $__foreach_error_3_saved_item;
}
?>
            </p>
        <?php }?>
    </div>
<?php }
}
}
