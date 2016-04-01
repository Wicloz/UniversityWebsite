<?php
/* Smarty version 3.1.29, created on 2016-03-29 16:53:07
  from "C:\xampp\htdocs\v2\templates\errors\403.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fa96d3380da6_76990699',
  'file_dependency' => 
  array (
    '314a55fe4d75d1d3dbd422b0af2c6e2162cb2bd3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\errors\\403.tpl',
      1 => 1459263143,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
  ),
),false)) {
function content_56fa96d3380da6_76990699 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_1852356fa96d337c257_71173559',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/errors/403.tpl */
function block_1852356fa96d337c257_71173559($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>Error 403: Access prohibited</h2>
        <p>
            Sorry, it seems you don't have permission to access this page. Please <a href="index.php?page=login">log in</a> and try again.<br>
            If you are of the opinion the server is at fault, please contact the developer.
        </p>
    </div>
<?php
}
/* {/block 'content_center'} */
}
