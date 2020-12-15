<?php
require 'class/class.php';

class Picture
{

	static public function getTable($DB)
	{
		if($DB instanceof DB){
			$picture = $DB->query("SELECT id_good, img_good FROM goods");
		}
		return $picture;
	}

	private  function __clone()
	{

	}

	private function __wakeup()
	{

	}
}
