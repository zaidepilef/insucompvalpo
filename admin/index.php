<?
	include"config/nucleo.php";
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
?>
<!doctype html>
<!--[if lt IE 7]>			<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>				<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>				<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->		<html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>--------------</title>
	<!-- Modernizr -->
	<script src="http://admin.insucompvalpo.cl/groundwork/js/libs/modernizr-2.6.2.min.js"></script>
	<!-- jQuery-->
	<script type="text/javascript" src="http://admin.insucompvalpo.cl/groundwork/js/libs/jquery-1.10.2.min.js"></script>
	<!-- framework css -->
	<!--[if gt IE 9]><!-->
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork.css">
	<!--<![endif]-->
	<!--[if lte IE 9]>
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-core.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-type.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-ui.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-anim.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-ie.css">
	<![endif]-->
</head>

<body>
	<div class="row">
		<img src="http://www.insucompvalpo.cl/img/banner.jpg" style="margin-top:-60px; margin-bottom:-40px;">
	</div>

	<header class="padded">
	
		<div class="row">
		
			<div class="four fifth">
				
			</div>
			
			<div class="one fifth">
				
				<div class="one half">
				</div>
				
				<div class="one half small half-pad-bottom">
					<a class="button orange pull-right small" href="http://admin.insucompvalpo.cl/logout">Salir</a>
				</div>
				
			</div>
		
			<nav role="navigation" class="nav gap-top blue">
				
				<ul>
					<li><a href="http://admin.insucompvalpo.cl/">HOME</a></li>
					<li><a href="http://admin.insucompvalpo.cl/productos/">PRODUCTOS</a></li>
					<li><a href="http://admin.insucompvalpo.cl/categorias/">CATEGORIAS</a></li>
					<li><a href="http://admin.insucompvalpo.cl/pedidos/">PEDIDOS</a></li>
					<li><a href="http://admin.insucompvalpo.cl/clientes/">CLIENTES</a></li>
				</ul>
				
			</nav>
			
		</div>
		
	</header>
	
	<div class="container small">
	
		<div class='row'>
			<?
			$notice = $_SESSION['notice'];
			$_SESSION['notice'] = '';
			if( $notice <> '' ) { ?>
				<div class="ten twelfths centered">
					<p class="alert dismissible message"><?=$notice;?></p>
				</div>
			<? } ?>
		</div>
		<div class="row">
			<?
				$vista = $_GET['vista'];
				//echo"<br>vista:".$vista;
				
				switch ($vista) {
					
					case '':
						include"home.php";
					break;
					
					case 'productos':
						include"productos.php";
					break;
					
					
					case 'categorias':
						include"categorias.php";
					break;

				}
				
			?>
		</div>
	</div>

</body>
</html>
<script>

	function getRutdv(rut) {
		var dvr = '0';
		suma = 0;
		mul  = 2;
		for(i=rut.length -1;i >= 0;i--) {
			suma = suma + rut.charAt(i) * mul;    
			if (mul == 7) {
				mul = 2;
			} else {
				mul++;
			}
		}
		
		res = suma % 11;  
		if (res==1) {
			return 'k';
		} else if(res==0) {   
			return '0';
		} else {
			return 11-res;
		}
	}
	
	//funcion solo numeros
	function isNumber( evt ) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}
	
	function format( input ) {
		var num = input.value.replace(/\./g,'');
		if(!isNaN(num)){
			num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
			num = num.split('').reverse().join('').replace(/^[\.]/,'');
			input.value = num;
		}else{ 
			//alert('Solo se permiten numeros');
			input.value = input.value.replace(/[^\d\.]*/g,'');
		}
	}
	
	function soloNumero(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = "1234567890";
		especiales = "8-37-39-46";
		tecla_especial = false
		for(var i in especiales){
			if(key == especiales[i]){
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}
	
	function soloLetras(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyz.";
		especiales = "8-37-39-46";
		tecla_especial = false
		for(var i in especiales){
			if(key == especiales[i]){
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}
	
	function soloAlfa(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890-°#().";
		especiales = "8-37-39-46";
		tecla_especial = false
		for(var i in especiales){
			if(key == especiales[i]){
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}
	
	function soloTelefono(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = " 1234567890-#()+";
		especiales = "8-37-39-46";
		tecla_especial = false
		for(var i in especiales){
			if(key == especiales[i]){
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}
	
	function soloFecha(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = "1234567890-/";
		especiales = "8-37-39-46";
		tecla_especial = false
		for(var i in especiales){
			if(key == especiales[i]){
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}
	
	function soloEmail(e){
		key = e.keyCode || e.which;
		tecla = String.fromCharCode(key).toLowerCase();
		letras = "abcdefghijklmnopqrstuvwxyz1234567890.@_-";
		especiales = "8-37-39-46";
		tecla_especial = false
		for(var i in especiales){
			if(key == especiales[i]){
				tecla_especial = true;
				break;
			}
		}

		if(letras.indexOf(tecla)==-1 && !tecla_especial){
			return false;
		}
	}
	
</script>



