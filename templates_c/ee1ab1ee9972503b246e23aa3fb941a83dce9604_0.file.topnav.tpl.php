<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:34:32
  from "C:\xampp\htdocs\templates\topnav.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef7783e0815_01537155',
  'file_dependency' => 
  array (
    'ee1ab1ee9972503b246e23aa3fb941a83dce9604' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\topnav.tpl',
      1 => 1459260607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef7783e0815_01537155 ($_smarty_tpl) {
?>
<nav class="navbar navbar-blue">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="?page=home">s1704362</a>
        </div>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="nav navbar-nav">
                <?php
$_from = $_smarty_tpl->tpl_vars['topnav']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
                    <?php if ($_smarty_tpl->tpl_vars['item']->value['location'] != '') {?>
                        <li <?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {?>class="active"<?php }?>>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['location'];?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['target'] != '') {?>target=<?php echo $_smarty_tpl->tpl_vars['item']->value['target'];
}?>><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
</a>
                        </li>
                    <?php } else { ?>
                        <li class="dropdown<?php if ($_smarty_tpl->tpl_vars['item']->value['active']) {?> active<?php }?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="">
                                <?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>

                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['subItems'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subitem_1_saved_item = isset($_smarty_tpl->tpl_vars['subitem']) ? $_smarty_tpl->tpl_vars['subitem'] : false;
$_smarty_tpl->tpl_vars['subitem'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subitem']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subitem']->value) {
$_smarty_tpl->tpl_vars['subitem']->_loop = true;
$__foreach_subitem_1_saved_local_item = $_smarty_tpl->tpl_vars['subitem'];
?>
                                    <li <?php if ($_smarty_tpl->tpl_vars['subitem']->value['active']) {?>class="active"<?php }?>>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['subitem']->value['location'];?>
"><?php echo $_smarty_tpl->tpl_vars['subitem']->value['title'];?>
</a>
                                    </li>
                                <?php
$_smarty_tpl->tpl_vars['subitem'] = $__foreach_subitem_1_saved_local_item;
}
if ($__foreach_subitem_1_saved_item) {
$_smarty_tpl->tpl_vars['subitem'] = $__foreach_subitem_1_saved_item;
}
?>
                            </ul>
                        </li>
                    <?php }?>
                <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>
                        <a href="?page=profile&action=logout&token=<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
">
                            <span class="glyphicon glyphicon-log-in"></span> Logout
                        </a>
                    <?php } else { ?>
                        <a href="?page=login">
                            <span class="glyphicon glyphicon-log-in"></span> Login
                        </a>
                    <?php }?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php }
}
