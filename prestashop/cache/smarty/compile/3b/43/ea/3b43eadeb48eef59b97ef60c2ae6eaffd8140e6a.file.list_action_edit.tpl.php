<?php /* Smarty version Smarty-3.1.19, created on 2015-12-30 18:34:48
         compiled from "/home/insucomp/public_html/prestashop/admin845bkdwel/themes/default/template/helpers/list/list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199040253556844df8534e60-62693167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b43eadeb48eef59b97ef60c2ae6eaffd8140e6a' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/admin845bkdwel/themes/default/template/helpers/list/list_action_edit.tpl',
      1 => 1451277811,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199040253556844df8534e60-62693167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56844df8553c18_52684252',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56844df8553c18_52684252')) {function content_56844df8553c18_52684252($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
