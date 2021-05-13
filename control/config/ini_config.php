<?php

	$server = "localhost";
	$user = "insucomp_root";
	//$user = "insucomp_root";
	$password = "jessicainsucomp2013";
	$basedatos = "insucomp_insucomp";
	
	$link = mysql_connect($server,$user,$password);
	
    if($link) {
		mysql_select_db($basedatos,$link);
	} else {
        echo"error data base";
    }

	mysql_query("SET NAMES 'utf8'");
	
	//obtener ip real
	function get_real_ip() {
 
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