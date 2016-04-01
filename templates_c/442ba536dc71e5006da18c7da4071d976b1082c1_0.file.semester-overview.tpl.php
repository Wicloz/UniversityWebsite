<?php
/* Smarty version 3.1.29, created on 2016-03-31 18:17:45
  from "C:\xampp\htdocs\v2\templates\pages\semester-overview.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fd4da93fce91_08017787',
  'file_dependency' => 
  array (
    '442ba536dc71e5006da18c7da4071d976b1082c1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\v2\\templates\\pages\\semester-overview.tpl',
      1 => 1459440951,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../main.tpl' => 1,
    'file:table_events.tpl' => 1,
  ),
),false)) {
function content_56fd4da93fce91_08017787 ($_smarty_tpl) {
$_smarty_tpl->ext->_inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->ext->_inheritance->processBlock($_smarty_tpl, 0, 'content_center', array (
  0 => 'block_1763256fd4da9334e19_28168238',
  1 => false,
  3 => 0,
  2 => 0,
));
?>

<?php $_smarty_tpl->ext->_inheritance->endChild($_smarty_tpl);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:../main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content_center'}  file:templates/pages/semester-overview.tpl */
function block_1763256fd4da9334e19_28168238($_smarty_tpl, $_blockParentStack) {
?>

    <?php
$_from = $_smarty_tpl->tpl_vars['subjects']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_subject_0_saved_item = isset($_smarty_tpl->tpl_vars['subject']) ? $_smarty_tpl->tpl_vars['subject'] : false;
$_smarty_tpl->tpl_vars['subject'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['subject']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['subject']->value) {
$_smarty_tpl->tpl_vars['subject']->_loop = true;
$__foreach_subject_0_saved_local_item = $_smarty_tpl->tpl_vars['subject'];
?>
        <div class="paragraph-center col-sm-12" id="subject_<?php echo $_smarty_tpl->tpl_vars['subject']->value['abbreviation'];?>
">
            <h2>
                <a href="?page=subjects&subject=<?php echo $_smarty_tpl->tpl_vars['subject']->value['abbreviation'];?>
"><?php echo $_smarty_tpl->tpl_vars['subject']->value['name'];?>
</a>
            </h2>
            <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value['assignments'])) {?>
                <h3 style="text-align:left;">Assignments</h3>
                <ul>
                    <?php if ($_smarty_tpl->tpl_vars['subject']->value['ass_line_index'] === -1) {?>
                        <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                    <?php }?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['subject']->value['assignments'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_assignment_1_saved_item = isset($_smarty_tpl->tpl_vars['assignment']) ? $_smarty_tpl->tpl_vars['assignment'] : false;
$_smarty_tpl->tpl_vars['assignment'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['assignment']->index=-1;
$_smarty_tpl->tpl_vars['assignment']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['assignment']->value) {
$_smarty_tpl->tpl_vars['assignment']->_loop = true;
$_smarty_tpl->tpl_vars['assignment']->index++;
$__foreach_assignment_1_saved_local_item = $_smarty_tpl->tpl_vars['assignment'];
?>
                        <li>
                            <?php echo $_smarty_tpl->tpl_vars['assignment']->value['date'];?>
 - <a href="?page=assignments_item&id=<?php echo $_smarty_tpl->tpl_vars['assignment']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['assignment']->value['description'];?>
</a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['subject']->value['ass_line_index'] === $_smarty_tpl->tpl_vars['assignment']->index) {?>
                            <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['assignment'] = $__foreach_assignment_1_saved_local_item;
}
if ($__foreach_assignment_1_saved_item) {
$_smarty_tpl->tpl_vars['assignment'] = $__foreach_assignment_1_saved_item;
}
?>
                </ul>
            <?php }?>
            <?php if (!empty($_smarty_tpl->tpl_vars['subject']->value['exams'])) {?>
                <h3 style="text-align:left;">Exams</h3>
                <ul>
                    <?php if ($_smarty_tpl->tpl_vars['subject']->value['ex_line_index'] === -1) {?>
                        <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                    <?php }?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['subject']->value['exams'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_exam_2_saved_item = isset($_smarty_tpl->tpl_vars['exam']) ? $_smarty_tpl->tpl_vars['exam'] : false;
$_smarty_tpl->tpl_vars['exam'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['exam']->index=-1;
$_smarty_tpl->tpl_vars['exam']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['exam']->value) {
$_smarty_tpl->tpl_vars['exam']->_loop = true;
$_smarty_tpl->tpl_vars['exam']->index++;
$__foreach_exam_2_saved_local_item = $_smarty_tpl->tpl_vars['exam'];
?>
                        <li>
                            <?php echo $_smarty_tpl->tpl_vars['exam']->value['date'];?>
 - <a href="?page=assignments_item&id=<?php echo $_smarty_tpl->tpl_vars['assignment']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['exam']->value['description'];?>
</a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['subject']->value['ex_line_index'] === $_smarty_tpl->tpl_vars['exam']->index) {?>
                            <hr style="margin:0px;border-color:#06123B;margin-right:40%;">
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['exam'] = $__foreach_exam_2_saved_local_item;
}
if ($__foreach_exam_2_saved_item) {
$_smarty_tpl->tpl_vars['exam'] = $__foreach_exam_2_saved_item;
}
?>
                </ul>
            <?php }?>
        </div>
    <?php
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_local_item;
}
if ($__foreach_subject_0_saved_item) {
$_smarty_tpl->tpl_vars['subject'] = $__foreach_subject_0_saved_item;
}
?>
    <div class="paragraph-center col-sm-12" id="subject_<?php echo $_smarty_tpl->tpl_vars['subject']->value['abbreviation'];?>
">
        <h2>Events:</h2>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:table_events.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('table'=>$_smarty_tpl->tpl_vars['events']->value), 0, false);
?>

    </div>
<?php
}
/* {/block 'content_center'} */
}
