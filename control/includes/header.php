<?php
	session_start();
	
	$user_id_reg = $_SESSION['user_id'];
	$sql_logs = "SELECT * FROM log_register WHERE usuario_id = ".$user_id_reg." ORDER BY log_id DESC LIMIT 1";
	//echo "<br>sql_logs : ".$sql_logs;
	$result_query_logs = mysql_query($sql_logs);
	$total_register = mysql_num_rows($result_query_logs);
	
	if( $total_register > 0 ) {		
		$row_logs	= mysql_fetch_assoc($result_query_logs);
		$user_id	= $row_logs[usuario_id];
		$log_date	= $row_logs[log_date];
		$time = strtotime($log_date);
		$my_format = date("d/m/y g:i A", $time);
		//echo"<br>log_date : ".$log_date;
	}

?>
		<div class="row">
			<img src="http://www.insucomp-valpo.cl/img/banner.jpg" width="100%">
		</div>
	<header class="container">
		<div class="row">
			<div class="span4">
				<p><b>Bienvenido : </b><?php echo $_SESSION['usuario_logueado'];?></p>
			</div>
			<div class="span6">
				<p>Ultima Visita : <?=$my_format;?></p>
			</div>
			<div class="span2">
				<a href="register.php" class="btn btn-danger">Log Out</a>
			</div>
		</div>
	</header>