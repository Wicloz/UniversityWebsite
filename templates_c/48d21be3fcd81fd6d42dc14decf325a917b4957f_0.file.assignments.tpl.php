<?php
/* Smarty version 3.1.29, created on 2016-03-31 18:24:07
  from "C:\xampp\htdocs\v2\templates\pages\assignments.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd4f270be667_26551879',
  'file_dependency' => 
  array (
    '48d21be3fcd81fd6d42dc14decf325a917b4957f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\assignments.tpl',
      1 => 1459440692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_assignments.tpl' => 1,
    'file:table_planning.tpl' => 1,
  ),
),false)) {
function content_56fd4f270be667_26551879 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_2199156fd4f270a7319_32140126',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/assignments.tpl */
function block_2199156fd4f270a7319_32140126($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>Assignments:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_assignments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['assignments']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning Assignments:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
