<?php
	
	$server = "db.inf.utfsm.cl";
    $user = "insucomp_root";
    $password = "jessicainsucomp2013";
    $basedatos = "insucomp_valpo";

    $conexion = mysql_connect($server,$user,$password)or die("Revise la configuracion de conexion a base de datos [insucomp_valpo]". mysql_error());
    mysql_select_db($basedatos,$conexion)or die("revisa los datos conexion a DB Insucomp valpo". mysql_error());
	mysql_query("SET NAMES 'utf8'");
	
	

	//obtener ip real
	function get_real_ip()
    {
 
        if (isset($_SERVER["HTTP_CLIENT_IP"]))
        {
            return $_SERVER["HTTP_CLIENT_IP"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
        {
            return $_SERVER["HTTP_X_FORWARDED"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
        {
            return $_SERVER["HTTP_FORWARDED_FOR"];
        }
        elseif (isset($_SERVER["HTTP_FORWARDED"]))
        {
            return $_SERVER["HTTP_FORWARDED"];
        }
        else
        {
            return $_SERVER["REMOTE_ADDR"];
        }
 
    }
    //echo get_real_ip();
?>