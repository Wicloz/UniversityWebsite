<?php
/* Smarty version 3.1.29, created on 2016-03-31 18:24:14
  from "C:\xampp\htdocs\v2\templates\pages\home.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd4f2ea9f482_91796250',
  'file_dependency' => 
  array (
    '7d2ee5e738f9006cf4ae328e2af30d60f1aa4409' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\home.tpl',
      1 => 1459441335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_today.tpl' => 1,
    'file:table_planning.tpl' => 1,
    'file:table_events.tpl' => 1,
  ),
),false)) {
function content_56fd4f2ea9f482_91796250 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_179256fd4f2ea4a895_57166754',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/home.tpl */
function block_179256fd4f2ea4a895_57166754($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <?php echo $_smarty_tpl->tpl_vars['introduction']->value;?>

    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Today:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_today.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['today']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Upcoming Planning:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Upcoming Events:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_events.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['events']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <?php echo $_smarty_tpl->tpl_vars['schedule']->value;?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
