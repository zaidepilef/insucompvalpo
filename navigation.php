<?php
	
	
	
	$SQL_LISTLINES = "SELECT * FROM categorias WHERE activo = 1 ORDER BY categoria_posicion ASC";
	$result_listlines = mysql_query($SQL_LISTLINES);
	//echo"<br> SQL_LISTLINES : ".$SQL_LISTLINES;
	$count_row_listlines = mysql_num_rows($result_listlines);
	
	
	
?>

		<style>
			/*
				Credits:
				Code snippet by @maridlcrmn (Follow me on Twitter)
				Images by Nike.com (http://www.nike.com/us/en_us/)
				Logo by Sneaker-mission.com (http://www.sneaker-mission.com/)
			*/

			.navbar-brand { 
				width: 200px;
				height: 50px;
				/*
				background: url('http://www.sneaker-mission.com/uploads/3/1/2/7/31279819/5617441.png') no-repeat center center;
				*/
				background-size: 50px;  
			}

			.nav-tabs {
				display: inline-block;
				border-bottom: none;
				padding-top: 15px;
				font-weight: bold;
			}
			.nav-tabs > li > a, 
			.nav-tabs > li > a:hover, 
			.nav-tabs > li > a:focus, 
			.nav-tabs > li.active > a, 
			.nav-tabs > li.active > a:hover,
			.nav-tabs > li.active > a:focus {
				border: none;
				border-radius: 0;
			}

			.nav-list { border-bottom: 1px solid #eee; }
			.nav-list > li { 
				padding: 20px 15px 15px;
				border-left: 1px solid #eee; 
			}
			.nav-list > li:last-child { border-right: 1px solid #eee; }
			.nav-list > li > a:hover { text-decoration: none; }
			.nav-list > li > a > span {
				display: block;
				font-weight: bold;
				text-transform: uppercase;
			}

			.mega-dropdown { position: static !important; }
			.mega-dropdown-menu {
				padding: 20px 15px 15px;
				text-align: center;
				width: 100%;
			}
		
		</style>
		<script>
			$(document).ready(function(){
				$(".dropdown").hover(            
					function() {
						$('.dropdown-menu', this).stop( true, true ).slideDown("fast");
						$(this).toggleClass('open');        
					},
					function() {
						$('.dropdown-menu', this).stop( true, true ).slideUp("fast");
						$(this).toggleClass('open');       
					}
				);
			});
		</script>
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid navbar-inverse">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<a class="navbar-brand" href="index.php"><b>INSUCOMP</b></a>
					
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						
					</ul>
					<form class="navbar-form navbar-right" role="search" action="search.php" method="post">
						<div class="form-group">
							<input type="text" id="buscar" name="buscar" class="form-control" placeholder="Buscar...">
						</div>
						<button type="submit" class="btn btn-default">Buscar</button>
					</form>
					
					<ul class="nav navbar-nav navbar-right">
						<li><a href="quienes.php">Quienes Somos</a></li>
						<li><a href="contacto.php">Contacto</a></li>
						<!--
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</li>
						-->
					</ul>
					
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>