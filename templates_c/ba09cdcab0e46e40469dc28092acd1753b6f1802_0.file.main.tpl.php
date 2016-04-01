<?php
/* Smarty version 3.1.29, created on 2016-03-30 21:41:20
  from "C:\xampp\htdocs\v2\templates\main.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fc2be0372ef2_07507647',
  'file_dependency' => 
  array (
    'ba09cdcab0e46e40469dc28092acd1753b6f1802' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\main.tpl',
      1 => 1459366874,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
    'file:header.tpl' => 1,
    'file:topnav.tpl' => 1,
    'file:sidenav.tpl' => 1,
    'file:notifications.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_56fc2be0372ef2_07507647 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <body>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:topnav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div class="container-fluid" id="content">
            <div class="row">
                <div class="col-sm-2" id="content-right">
                    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:sidenav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_right', array (
  0 => 'block_2268356fc2be0365513_75486182',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

                </div>
                <div class="col-sm-8" id="content-main">
                    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:notifications.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_927256fc2be036b8d1_11943446',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

                </div>
                <div class="col-sm-2" id="content-left">
                    <?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_left', array (
  0 => 'block_1128156fc2be036e428_40448951',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

                </div>
            </div>
        </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </body>
</html>
<?php }
/* {block 'content_right'}  file:../main.tpl */
function block_2268356fc2be0365513_75486182($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content_right'} */
/* {block 'content_center'}  file:../main.tpl */
function block_927256fc2be036b8d1_11943446($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content_center'} */
/* {block 'content_left'}  file:../main.tpl */
function block_1128156fc2be036e428_40448951($_smarty_tpl, $_blockParentStack) {
}
/* {/block 'content_left'} */
}
