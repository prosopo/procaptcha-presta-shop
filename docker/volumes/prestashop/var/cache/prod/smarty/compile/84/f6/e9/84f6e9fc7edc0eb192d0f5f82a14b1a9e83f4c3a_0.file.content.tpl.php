<?php
/* Smarty version 4.3.4, created on 2025-06-16 13:23:18
  from '/var/www/html/secure-dashboard/themes/new-theme/template/content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_684ffea6725366_56844787',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84f6e9fc7edc0eb192d0f5f82a14b1a9e83f4c3a' => 
    array (
      0 => '/var/www/html/secure-dashboard/themes/new-theme/template/content.tpl',
      1 => 1739192952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_684ffea6725366_56844787 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>
<div id="content-message-box"></div>


<?php if ((isset($_smarty_tpl->tpl_vars['content']->value))) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
