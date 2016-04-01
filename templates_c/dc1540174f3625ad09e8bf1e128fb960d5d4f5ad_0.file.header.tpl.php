<?php
/* Smarty version 3.1.29, created on 2016-04-02 00:34:32
  from "C:\xampp\htdocs\templates\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fef7783763c1_00693385',
  'file_dependency' => 
  array (
    'dc1540174f3625ad09e8bf1e128fb960d5d4f5ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\templates\\header.tpl',
      1 => 1459200152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fef7783763c1_00693385 ($_smarty_tpl) {
?>
<div class="container-fluid" id="header">
    <a href="http://liacs.leidenuniv.nl/" target="_blank">
        <img src="media/leidenuniv.png" alt="Logo Universiteit Leiden">
    </a>
    <div class="container-fluid" id="headertext">
        <h1>
            <a href="<?php if ($_smarty_tpl->tpl_vars['loggedIn']->value) {?>?page=profile<?php } else { ?>?page=login<?php }?>">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['user_name']->value)===null||$tmp==='' ? "Not Logged In" : $tmp);?>

            </a>
        </h1>
    </div>
</div>
<?php }
}
