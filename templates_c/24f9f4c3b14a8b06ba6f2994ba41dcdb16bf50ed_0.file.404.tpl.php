<?php
/* Smarty version 3.1.29, created on 2016-04-01 21:31:34
  from "C:\xampp\htdocs\v2\templates\errors\404.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fecc965f8156_53584630',
  'file_dependency' => 
  array (
    '24f9f4c3b14a8b06ba6f2994ba41dcdb16bf50ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\errors\\404.tpl',
      1 => 1459262905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
  ),
),false)) {
function content_56fecc965f8156_53584630 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_439256fecc965f2771_51551600',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/errors/404.tpl */
function block_439256fecc965f2771_51551600($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>Error 404: Not found</h2>
        <p>
            Sorry, it seems you were trying to access a page that doesn't exist. Please check the spelling of the URL you were trying to access and try again.<br>
            If you are of the opinion the server is at fault, please contact the developer.
        </p>
        <img src="media/404.png" width=100% alt="404">
    </div>
<?php
}
/* {/block 'content_center'} */
}
