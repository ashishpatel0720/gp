<?php
if (! function_exists('load_categories'))
{
	function load_categories()
	{
		$categories = [];
		$ci =& get_instance();
		$books = $ci->bookmodel->fetchCategories();
		foreach ($books as $key => $value) {
				$categories[$value['main_category_title']][$value['sub_category_title']][] = $value['subject_title'];
		}
		return $categories;

	}
}
?>
