<?php
/* Smarty version 3.1.29, created on 2016-03-29 15:53:05
  from "C:\xampp\htdocs\v2\templates\sidenav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fa88c19b3ad7_46391691',
  'file_dependency' => 
  array (
    '6049036964cd63c05c08b2c6ea38425f8d3f0fa1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\sidenav.tpl',
      1 => 1459259422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fa88c19b3ad7_46391691 ($_smarty_tpl) {
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
