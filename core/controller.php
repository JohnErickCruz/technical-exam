<?php
namespace Core;

class Controller
{
	protected static function render($directory, $view, $data=[])
	{
		$viewData = $data;
		require_once("./views/layouts/header.php");
		require_once("./views/$directory/$view.php");
		require_once("./views/layouts/footer.php");
	} 
}