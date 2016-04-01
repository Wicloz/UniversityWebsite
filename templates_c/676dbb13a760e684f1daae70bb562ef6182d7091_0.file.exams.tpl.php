<?php
/* Smarty version 3.1.29, created on 2016-03-31 18:24:11
  from "C:\xampp\htdocs\v2\templates\pages\exams.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd4f2b4bd5b8_75416826',
  'file_dependency' => 
  array (
    '676dbb13a760e684f1daae70bb562ef6182d7091' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\exams.tpl',
      1 => 1459440704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_exams.tpl' => 1,
    'file:table_planning.tpl' => 1,
  ),
),false)) {
function content_56fd4f2b4bd5b8_75416826 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_209856fd4f2b477122_58749083',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/exams.tpl */
function block_209856fd4f2b477122_58749083($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>Exams:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_exams.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['exams']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning Exams:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
    <div class="paragraph-center col-sm-12">
        <?php echo $_smarty_tpl->tpl_vars['schedule']->value;?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
