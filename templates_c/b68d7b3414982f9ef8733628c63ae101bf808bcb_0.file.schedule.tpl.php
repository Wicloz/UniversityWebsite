<?php
/* Smarty version 3.1.29, created on 2016-03-29 19:03:11
  from "C:\xampp\htdocs\v2\templates\pages\schedule.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fab54fb30367_58468451',
  'file_dependency' => 
  array (
    'b68d7b3414982f9ef8733628c63ae101bf808bcb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\schedule.tpl',
      1 => 1459270669,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
  ),
),false)) {
function content_56fab54fb30367_58468451 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_1698056fab54fb07a09_37633822',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/schedule.tpl */
function block_1698056fab54fb07a09_37633822($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <p>
            <?php echo $_smarty_tpl->tpl_vars['shedule_google']->value;?>

        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <p>
            <?php echo $_smarty_tpl->tpl_vars['shedule_begin']->value;?>

        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <p>
            <?php echo $_smarty_tpl->tpl_vars['shedule_end']->value;?>

        </p>
    </div>
<?php
}
/* {/block 'content_center'} */
}
