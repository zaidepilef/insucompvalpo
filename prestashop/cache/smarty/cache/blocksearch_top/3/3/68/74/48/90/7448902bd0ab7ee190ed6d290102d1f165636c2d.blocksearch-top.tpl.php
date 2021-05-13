<?php /*%%SmartyHeaderCode:189521443456844e0fb772f7-14195605%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7448902bd0ab7ee190ed6d290102d1f165636c2d' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/themes/insucomp_1/modules/blocksearch/blocksearch-top.tpl',
      1 => 1451281939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189521443456844e0fb772f7-14195605',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56844e4f30c2e3_89437413',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56844e4f30c2e3_89437413')) {function content_56844e4f30c2e3_89437413($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//prestashop.insucompvalpo.cl/buscar" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Buscar" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Buscar</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
