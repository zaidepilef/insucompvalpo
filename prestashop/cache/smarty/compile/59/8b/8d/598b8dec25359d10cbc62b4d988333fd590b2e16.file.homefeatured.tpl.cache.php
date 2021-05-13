<?php /* Smarty version Smarty-3.1.19, created on 2015-12-30 18:35:12
         compiled from "/home/insucomp/public_html/prestashop/themes/insucomp_1/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:42857982356844e10a104d4-99663955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '598b8dec25359d10cbc62b4d988333fd590b2e16' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/themes/insucomp_1/modules/homefeatured/homefeatured.tpl',
      1 => 1451281939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42857982356844e10a104d4-99663955',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56844e10a23f61_92097526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56844e10a23f61_92097526')) {function content_56844e10a23f61_92097526($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('class'=>'homefeatured tab-pane','id'=>'homefeatured'), 0);?>

<?php } else { ?>
<ul id="homefeatured" class="homefeatured tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No featured products at this time.','mod'=>'homefeatured'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>
