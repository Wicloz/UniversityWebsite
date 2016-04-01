<?php
/* Smarty version 3.1.29, created on 2016-03-31 18:31:25
  from "C:\xampp\htdocs\v2\templates\pages\planning.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd50dd1cee94_74617784',
  'file_dependency' => 
  array (
    'be46fb5d286995e43d6b4eb33240c7657765b0ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\planning.tpl',
      1 => 1459440699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_planning.tpl' => 1,
  ),
),false)) {
function content_56fd50dd1cee94_74617784 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_2214056fd50dd1c1ae1_71721799',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/planning.tpl */
function block_2214056fd50dd1c1ae1_71721799($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>Planning:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
