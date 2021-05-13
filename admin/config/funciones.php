<?
	
	function getMes( $mes_n ) {
		if( $mes_n ) {
			$meses = array('','Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
			return $meses[$mes_n];
		} else {
			return false;
		}
	}
	
	function get_real_ip() {
		if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			return $_SERVER["HTTP_CLIENT_IP"];
		} elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif (isset($_SERVER["HTTP_X_FORWARDED"])) {
			return $_SERVER["HTTP_X_FORWARDED"];
		} elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])) {
			return $_SERVER["HTTP_FORWARDED_FOR"];
		} elseif (isset($_SERVER["HTTP_FORWARDED"])) {
			return $_SERVER["HTTP_FORWARDED"];
		} else {
			return $_SERVER["REMOTE_ADDR"];
		}
	}
	
	
	function valida_rut( $r ) {
		$r=strtoupper(preg_replace('\.|,|-','',$r));
		$sub_rut=substr($r,0,strlen($r)-1);
		$sub_dv=substr($r,-1);
		$x=2;
		$s=0;
		for ( $i=strlen($sub_rut)-1;$i>=0;$i-- ) {
			if ( $x >7 ) {
				$x=2;
			}
			$s += $sub_rut[$i]*$x;
			$x++;
		}
		$dv=11-($s%11);
		if ( $dv==10 ) {
			$dv='K';
		}
		if ( $dv==11 ) {
			$dv='0';
		}
		if ( $dv==$sub_dv ) {
			return true;
		} else {
			return false;
		}
	}
	
	function registrologin($user) {
		$real_ip = get_real_ip();
		$SQL_INSERT_REG ="INSERT INTO log_register (usuario_id, log_ip) VALUES ($user,'$real_ip')";
		mysqli_query($SQL_INSERT_REG);
	}
	
	function link_mysql() {
		$server = "localhost";
		$user = "insucomp_root";
		$password = "jessicainsucomp2013";
		$basedatos = "insucomp_insucomp";
		//actual
		$link = mysqli_connect($server, $user,$password, $basedatos);
		return $link;
	}
	
	
	
	
?>
