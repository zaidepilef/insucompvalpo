<?php /* Smarty version Smarty-3.1.19, created on 2016-01-12 23:07:54
         compiled from "/home/insucomp/public_html/prestashop/admin845bkdwel/themes/default/template/controllers/groups/helpers/tree/tree_node_folder_radio.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7606615025695b17ac54645-00754462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '136425ff3f07a082c8129716d198a5c3fd692b81' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/admin845bkdwel/themes/default/template/controllers/groups/helpers/tree/tree_node_folder_radio.tpl',
      1 => 1451277904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7606615025695b17ac54645-00754462',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'node' => 0,
    'children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5695b17ac7cf43_68430062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5695b17ac7cf43_68430062')) {function content_5695b17ac7cf43_68430062($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/home/insucomp/public_html/prestashop/tools/smarty/plugins/modifier.escape.php';
?>
<li class="tree-folder">
	<span class="tree-folder-name<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true) {?> tree-folder-name-disable<?php }?>">
		<input type="radio" name="id_category" value="<?php echo $_smarty_tpl->tpl_vars['node']->value['id_category'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['node']->value['disabled'])&&$_smarty_tpl->tpl_vars['node']->value['disabled']==true) {?> disabled="disabled"<?php }?> />
		<i class="icon-folder-close"></i>
		<label class="tree-toggler"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['node']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</label>
	</span>
	<ul class="tree">
		<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['children']->value, 'UTF-8');?>

	</ul>
</li><?php }} ?>
