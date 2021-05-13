<?php /* Smarty version Smarty-3.1.19, created on 2016-01-12 23:07:54
         compiled from "/home/insucomp/public_html/prestashop/admin845bkdwel/themes/default/template/controllers/groups/helpers/tree/tree_node_item_radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19697495325695b17abfd372-77495603%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd95e6a71c20f800439e8aa8e8c147a35e6662759' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/admin845bkdwel/themes/default/template/controllers/groups/helpers/tree/tree_node_item_radio.tpl',
      1 => 1451277904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19697495325695b17abfd372-77495603',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5695b17ac4fdf6_45248731',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5695b17ac4fdf6_45248731')) {function content_5695b17ac4fdf6_45248731($_smarty_tpl) {?>
<li class="tree-item<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true) {?> tree-item-disable<?php }?>">
	<span class="tree-item-name">
		<input type="radio" name="id_category" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id_category'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true) {?> disabled="disabled"<?php }?> />
		<i class="tree-dot"></i>
		<label class="tree-toggler"><?php echo $_smarty_tpl->tpl_vars['node']->value['name'];?>
</label>
	</span>
</li><?php }} ?>
