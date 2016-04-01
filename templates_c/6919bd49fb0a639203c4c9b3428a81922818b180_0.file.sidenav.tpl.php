<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:45:07
  from "C:\xampp\htdocs\templates\sidenav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef9f3cdc983_87191549',
  'file_dependency' => 
  array (
    '6919bd49fb0a639203c4c9b3428a81922818b180' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\sidenav.tpl',
      1 => 1459550577,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef9f3cdc983_87191549 ($_smarty_tpl) {
$_from = $_smarty_tpl->tpl_vars['sidenav']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_navbox_0_saved_item = isset($_smarty_tpl->tpl_vars['navbox']) ? $_smarty_tpl->tpl_vars['navbox'] : false;
$_smarty_tpl->tpl_vars['navbox'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['navbox']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['navbox']->value) {
$_smarty_tpl->tpl_vars['navbox']->_loop = true;
$__foreach_navbox_0_saved_local_item = $_smarty_tpl->tpl_vars['navbox'];
?>
    <div class="navbox">
        <h2><?php echo $_smarty_tpl->tpl_vars['navbox']->value['header'];?>
</h2>
        <ul>
            <?php
$_from = $_smarty_tpl->tpl_vars['navbox']->value['content'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_1_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_1_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
                <li <?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {?>class="active"<?php }?>>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['location'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                </li>
            <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_local_item;
}
if ($__foreach_item_1_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_1_saved_item;
}
?>
        </ul>
    </div>
<?php
$_smarty_tpl->tpl_vars['navbox'] = $__foreach_navbox_0_saved_local_item;
}
if ($__foreach_navbox_0_saved_item) {
$_smarty_tpl->tpl_vars['navbox'] = $__foreach_navbox_0_saved_item;
}
}
}
