<?
	include"mysql.php";
	
	function categoryParentChildTree($parent = 0, $spacing = '', $category_tree_array = '') {
		global $link;
		$parent 		= $link->real_escape_string($parent);
		if (!is_array($category_tree_array)) {
			$category_tree_array = array();
		}
		$sqlCategory = "SELECT id,name,parent_id FROM ins_categories WHERE parent_id = $parent ORDER BY id ASC";
		$resCategory =$link->query($sqlCategory);
	
		if ($resCategory->num_rows > 0) {
			while($rowCategories = $resCategory->fetch_assoc()) {
				$category_tree_array[] = array("id" => $rowCategories['id'], "name" => $spacing . $rowCategories['name'], "parent_id" => $rowCategories['parent_id'] );
				$category_tree_array = categoryParentChildTree($rowCategories['id'], '&nbsp;&nbsp;&nbsp;'.$spacing . '-&nbsp;', $category_tree_array);
			}
		}
		return $category_tree_array;
		
	}
	
	
	function category_sub( $category ){
		global $link;
		$sqlCategory = "SELECT * FROM ins_categories WHERE parent_id = $category ORDER BY id ASC";
		$result_categories = mysqli_query($link, $sqlCategory);
		$count_rows_products = mysqli_num_rows($result_categories);
		$html="";
		
		if ($count_rows_products > 0) {
			$html.="<ul class='collapsible collapsible-accordion' data-collapsible='accordion'>";
			while( $rowCategories = mysqli_fetch_assoc( $result_categories ) ) {
				$category_id = $rowCategories['id'];
				$category_name = $rowCategories['name'];
				$category_parent = $rowCategories['parent_id'];
				$html.="
					<li>
						<div class='collapsible-header'>
							<i class='material-icons'>keyboard_arrow_right</i>".utf8_encode($category_name)."</div>
						<div class='collapsible-body' style='display: none; margin-left:20px;'>
							".category_sub($category_id)."
						</div>
					</li>
				";
				
			}
			$html.="</ul>";
			
		} else {
			$html.="";
		}
		
		return $html;
	}


?>