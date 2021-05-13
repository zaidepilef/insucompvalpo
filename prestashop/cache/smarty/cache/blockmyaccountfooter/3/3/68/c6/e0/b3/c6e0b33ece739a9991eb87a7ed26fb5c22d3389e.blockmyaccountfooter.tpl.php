<?php /*%%SmartyHeaderCode:31499158956844e1189c898-73023087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6e0b33ece739a9991eb87a7ed26fb5c22d3389e' => 
    array (
      0 => '/home/insucomp/public_html/prestashop/themes/insucomp_1/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1451281939,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31499158956844e1189c898-73023087',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
    'is_logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56844e11a6cff6_82799443',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56844e11a6cff6_82799443')) {function content_56844e11a6cff6_82799443($_smarty_tpl) {?>
<!-- Block myaccount module -->
<section class="footer-block col-xs-12 col-sm-4">
	<h4><a href="http://prestashop.insucompvalpo.cl/mi-cuenta" title="Administrar mi cuenta de cliente" rel="nofollow">Mi cuenta</a></h4>
	<div class="block_content toggle-footer">
		<ul class="bullet">
			<li><a href="http://prestashop.insucompvalpo.cl/historial-compra" title="Mis compras" rel="nofollow">Mis compras</a></li>
						<li><a href="http://prestashop.insucompvalpo.cl/albaran" title="Mis vales descuento" rel="nofollow">Mis vales descuento</a></li>
			<li><a href="http://prestashop.insucompvalpo.cl/direcciones" title="Mis direcciones" rel="nofollow">Mis direcciones</a></li>
			<li><a href="http://prestashop.insucompvalpo.cl/datos-personales" title="Administrar mi información personal" rel="nofollow">Mis datos personales</a></li>
			<li><a href="http://prestashop.insucompvalpo.cl/descuento" title="Mis vales" rel="nofollow">Mis vales</a></li>			
            <li><a href="http://prestashop.insucompvalpo.cl/?mylogout" title="Cerrar sesión" rel="nofollow">Cerrar sesión</a></li>		</ul>
	</div>
</section>
<!-- /Block myaccount module -->
<?php }} ?>
