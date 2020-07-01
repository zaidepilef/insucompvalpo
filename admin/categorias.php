<?
	
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
	
	
	
	
	$categoryList = categoryParentChildTree(); 
	foreach($categoryList as $key => $value){
		echo $value['name'].'<br>';
	}
	
	