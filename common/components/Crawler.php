<?php 
include("/simple_html_dom.php");

class Crawler{
	
	public function getUrlCategory()
	{
		$settings 	= new CrawSettingCategory();
		$html 		= \file_get_html("https://apkpure.com/vn/game");
		foreach($html->find(".index-category ul li a") as $element) // DIV LON NHAT
		{
			echo $element->href;
		}
	}
}
?>