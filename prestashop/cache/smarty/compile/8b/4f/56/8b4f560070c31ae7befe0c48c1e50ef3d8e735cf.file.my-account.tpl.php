<?php /* Smarty version Smarty-3.1.19, created on 2016-01-12 21:14:21
         compiled from "/home/insucomp/public_html/prestashop/themes/insucomp_1/modules/blockwishlist/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1460896365569596dd999107-91029663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b4f560070c31ae7befe0c48c1e50ef3d8e735cf' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/themes/insucomp_1/modules/blockwishlist/my-account.tpl',
      1 => 1451281939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1460896365569596dd999107-91029663',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_569596dd9e52c3_47434754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_569596dd9e52c3_47434754')) {function content_569596dd9e52c3_47434754($_smarty_tpl) {?>

<!-- MODULE WishList -->
<li class="lnk_wishlist">
	<a 	href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<i class="icon-heart"></i>
		<span><?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
</span>
	</a>
</li>
<!-- END : MODULE WishList --><?php }} ?>
