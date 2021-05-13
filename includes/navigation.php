<?php
	
	include "control/config/ini_config.php";
	
	$SQL_LISTLINES = "SELECT * FROM line_category WHERE active = 1 ORDER BY position ASC";
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
				width: 70px;
				height: 50px;
				background: url('http://www.sneaker-mission.com/uploads/3/1/2/7/31279819/5617441.png') no-repeat center center;
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
					<!--
					<a class="navbar-brand" href="#"></a>
					-->
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li class="dropdown mega-dropdown active">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">INSUCOMP-VALPO<span class="caret"></span></a>				
							<div class="dropdown-menu mega-dropdown-menu">
								
								<div class="container-fluid">
									<!-- Tab panes -->
									<div class="tab-content">
										
										<?php
											if($count_row_listlines > 0) {
												while($row_line_active = mysql_fetch_assoc($result_listlines)){
													$line_id_active			= $row_line_active[line_id];
													$line_name_active		= $row_line_active[line_name];
													$line_position_active	= $row_line_active[position];?>
													<div class="tab-pane" id="l_<?php echo $line_id_active;?>">
														<ul class="nav-list list-inline"> <?php
															$SQL_LISTCATEGORIES ="SELECT category_id, category_name FROM category_product WHERE line_id = ".$line_id_active." AND active = 1 ORDER BY position ASC";
															//echo"<br>SQL_LIST_CATEGORY_ACTIVE : ".$SQL_LIST_CATEGORY_ACTIVE;
															$result_category = mysql_query($SQL_LISTCATEGORIES);
															$count_row_category = mysql_num_rows($result_category);
															if($count_row_category > 0) {
																while($row_category = mysql_fetch_assoc($result_category)){
																	
																	$category_id_active			= $row_category[category_id];
																	$line_name_active			= $row_category[line_name];
																	$category_name_active		= $row_category[category_name];
																	$category_position_active	= $row_category[position];
																	?>
										
																	<li>
																		<a href="category.php?id=<?php echo $category_id_active?>">
																			<img src="http://content.nike.com/content/dam/one-nike/globalAssets/menu_header_images/OneNike_Global_Nav_Icons_Running.png">
																			<span><?php echo $category_name_active;?></span>
																		</a>
																	</li>
																	
																<?php }
															} else {?>
																<li><a>No hay Categorias</a></li>
															<?php } ?>
														
														</ul>
													</div>
													
												<?php	
												}
											}
										
										?>
										
										
									</div>
								</div>
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<?php
									
									$SQL_LISTLINES_D = "SELECT * FROM line_category WHERE active = 1 ORDER BY position ASC";
									$result_listlines_d = mysql_query($SQL_LISTLINES_D);
									//echo"<br> SQL_LISTLINES_D : ".$SQL_LISTLINES_D;
									$count_row_listlines_d = mysql_num_rows($result_listlines_d);
									
									if($count_row_listlines_d > 0) {
										while($row_line_active_d = mysql_fetch_assoc($result_listlines_d)){
											$line_id_active_d			= $row_line_active_d[line_id];
											$line_name_active_d			= $row_line_active_d[line_name];
											$line_position_active_d		= $row_line_active_d[position];
											?>
											<li><a href="#l_<?=$line_id_active_d?>" role="tab" data-toggle="tab"><?=$line_name_active_d?></a></li>
											<?php
											
										}
									}
								
									?>
									
								</ul>                    
							</div>				
						</li>
					</ul>
					<form class="navbar-form navbar-left" role="search" action="search.php">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">Link</a></li>
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
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>