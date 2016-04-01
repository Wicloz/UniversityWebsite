<?php
/* Smarty version 3.1.29, created on 2016-03-28 23:22:33
  from "C:\xampp\htdocs\v2\templates\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f9a099418558_05352449',
  'file_dependency' => 
  array (
    'f90f632d761520f318e58a2b194db000dc4ca415' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\header.tpl',
      1 => 1459200152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f9a099418558_05352449 ($_smarty_tpl) {
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
