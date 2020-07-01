<?
	include"config/mysql.php";
	include"config/funciones.php";
	$logo_banner ="http://www.insucompvalpo.cl/img/banner.jpg";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://www.insucompvalpo.cl/materialize/css/materialize.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<script src="http://www.insucompvalpo.cl/materialize/js/jquery.min.js"></script>
	<script src="http://www.insucompvalpo.cl/materialize/js/materialize.min.js"></script>
</head>
<body>
	<!--
	<div class="navbar-fixed">
		
			<div class="nav-wrapper">
				<img src="<?=$logo_banner?>" style="width:100%;">
			</div>
		
	</div>
	-->
	<div class="navbar-fixed">
		<nav>
			<div class="nav-wrapper green darken-1">
				<a href="http://test.insucompvalpo.cl/" class="brand-logo">Insucomp Valpo</a>
				<div class="right">
					<form>
						<div class="input-field">
							<input type="search" id="search-field" class="field" placeholder="Buscar" required maxlength="45">
							<label for="search-field">
								<i class="small material-icons">search</i>
							</label>
							<i class="small material-icons">close</i>
						</div>
					</form>
				</div>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li><a href="#">Contacto</a></li>
					<li><a href="#">Quienes Somos</a></li>
				</ul>
			</div>
		</nav>
	</div>
	
	<div class="row">
		<div class="col s4">
			<script>
				$(document).ready(function(){
					$('.collapsible').collapsible({
						accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
					});
				});
				
			</script>
			<!--
			<ul class="collapsible collapsible-accordion" data-collapsible="accordion">
				<li class="">
					<div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
					<div class="collapsible-body" style="display: none;"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
				</li>
				<li class="">
					<div class="collapsible-header"><i class="material-icons">place</i>Second</div>
					<div class="collapsible-body" style="display: none;"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
				</li>
				<li>
					<div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
					<div class="collapsible-body" style=""><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
				</li>
			</ul>
			-->

			<ul class="collapsible collapsible-accordion" data-collapsible="accordion">
				<?
				$sqlCategory = "SELECT * FROM ins_categories WHERE parent_id = 0 ORDER BY id ASC";
				//echo"<br>".$sqlCategory;
				$result_categories = mysqli_query($link, $sqlCategory);
				$count_rows_products = mysqli_num_rows($result_categories);
				
				if ($count_rows_products > 0) {
					while($rowCategories = mysqli_fetch_assoc( $result_categories ) ) {
						$category_id = $rowCategories['id'];
						$category_name = $rowCategories['name'];
						$category_parent = $rowCategories['parent_id'];
						?>
						<li>
							<div class="collapsible-header">
								<i class="material-icons">keyboard_arrow_right</i><?=utf8_encode($category_name)?>
							</div>
							<div class="collapsible-body" style="display: none; margin-left:20px;">
								<?
								$html = category_sub($category_id);
								echo $html;
								?>
								
							</div>
						</li>
						
						<?
						
					}
				}
				?>
			</ul>
		
		</div>
		<div class="col s8">
		</div>
	</div>

</body>


</html>