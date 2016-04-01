<?php
/* Smarty version 3.1.29, created on 2016-03-29 16:24:44
  from "C:\xampp\htdocs\v2\templates\pages\profile.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fa902c4023b9_37102381',
  'file_dependency' => 
  array (
    '7c7473244e65f9cc7ff6f228e8081e77f4e61037' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\profile.tpl',
      1 => 1459261283,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
  ),
),false)) {
function content_56fa902c4023b9_37102381 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_502456fa902c3ceff6_07502387',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/profile.tpl */
function block_502456fa902c3ceff6_07502387($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>User Information:</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="sid">Student Number:</label>
                    <input type="text" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="email">Email Address:</label>
                    <input type="text" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="phone">Mobile/Phone Number:</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
                </div>
                <input type="hidden" name="action" value="update_info">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <input class="button submit-button" type="submit" value="Update">
            </form>
        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Change Password:</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="password">Current Password:</label>
                    <input type="password" name="password_current" id="password">
                </div>
                <div class="form-row">
                    <label for="password">Desired Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-row">
                    <label for="password_again">Repeat Desired Password:</label>
                    <input type="password" name="password_again" id="password_again">
                </div>
                <input type="hidden" name="action" value="update_pass">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <input class="button submit-button" type="submit" value="Update">
            </form>
        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Logout</h2>
        <p>
            <form action="" method="POST">
                <input type="hidden" name="action" value="logout">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <input class="button submit-button" type="submit" value="Log out">
            </form>
        </p>
    </div>
<?php
}
/* {/block 'content_center'} */
}
