<?php
/* Smarty version 3.1.29, created on 2016-04-01 23:17:36
  from "C:\xampp\htdocs\v2\templates\pages\exams_item.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fee57018d859_02140958',
  'file_dependency' => 
  array (
    '9c9ab8ba727d31d5fd510f6361633fe1eadf4247' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\exams_item.tpl',
      1 => 1459545452,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_planning.tpl' => 1,
  ),
),false)) {
function content_56fee57018d859_02140958 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_1070856fee57015ea25_85743802',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/exams_item.tpl */
function block_1070856fee57015ea25_85743802($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2><?php echo $_smarty_tpl->tpl_vars['item']->value->weight;?>
 <?php echo $_smarty_tpl->tpl_vars['item']->value->subject_name;?>
</h2>
        <p><?php echo $_smarty_tpl->tpl_vars['item']->value->substance;?>
</p>
        <p><i>
            Subject:
            <a href="index.php?page=subjects&subject=<?php echo $_smarty_tpl->tpl_vars['item']->value->subject;?>
">
                <?php echo $_smarty_tpl->tpl_vars['item']->value->subject_name;?>

            </a>
            <br>
            Exam Date: <?php echo DateFormat::dateItem($_smarty_tpl->tpl_vars['item']->value->date);?>

            <br>
            Mark: <?php echo $_smarty_tpl->tpl_vars['item']->value->mark;?>

            <?php if (!empty($_smarty_tpl->tpl_vars['item']->value->link)) {?>
                <br>
                Link: <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['item']->value->link;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->link;?>
</a>
            <?php }?>
        </i></p>
        <a class="button edit-item-button" href="index.php?page=edit-entry&table=tentamens&id=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
">
            Edit Item
        </a>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Planning:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_planning.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['planning']->value), 0, false);
?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
