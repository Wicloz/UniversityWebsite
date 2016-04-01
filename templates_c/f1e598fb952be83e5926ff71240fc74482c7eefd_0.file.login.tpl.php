<?php
/* Smarty version 3.1.29, created on 2016-04-01 21:55:20
  from "C:\xampp\htdocs\v2\templates\pages\login.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fed2286ed1d3_23077358',
  'file_dependency' => 
  array (
    'f1e598fb952be83e5926ff71240fc74482c7eefd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\login.tpl',
      1 => 1459527744,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
  ),
),false)) {
function content_56fed2286ed1d3_23077358 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_1228356fed2286a8205_06030816',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/login.tpl */
function block_1228356fed2286a8205_06030816($_smarty_tpl, $_blockParentStack) {
?>

    <div class="paragraph-center col-sm-12">
        <h2>Login</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="sid"><span style="color:red;">*</span>Student Number:</label>
                    <input type="text" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="password"><span style="color:red;">*</span>Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-row">
                    <input type="checkbox" name="remember" id="remember" value="1" <?php if ($_smarty_tpl->tpl_vars['remember']->value) {?>checked<?php }?>>
                    <label for="remember">Remember me</label>
                </div>
                <input type="hidden" name="action" value="login">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <input class="button submit-button" type="submit" value="Log in">
            </form>
        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Register</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="name"><span style="color:red;">*</span>Full Name:</label>
                    <input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="sid"><span style="color:red;">*</span>Student Number:</label>
                    <input type="text" name="sid" id="sid" value="<?php echo $_smarty_tpl->tpl_vars['sid']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="password"><span style="color:red;">*</span>Desired Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-row">
                    <label for="password_again"><span style="color:red;">*</span>Repeat Desired Password:</label>
                    <input type="password" name="password_again" id="password_again">
                </div>
                <div class="form-row">
                    <label for="email">Email Address:</label>
                    <input type="email" name="email" id="email" value="<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
                </div>
                <div class="form-row">
                    <label for="phone">Mobile/Phone Number:</label>
                    <input type="tel" name="phone" id="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
                </div>
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="token" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['token']->value)===null||$tmp==='' ? '' : $tmp);?>
">
                <input class="button submit-button" type="submit" value="Register">
            </form>
        </p>
    </div>
<?php
}
/* {/block 'content_center'} */
}
