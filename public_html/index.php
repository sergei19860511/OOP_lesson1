
 <?php
require 'Picture.php';
?>
	<?php

	if (!isset($_GET['page'])) {
		include 'templates/allPicture.php';
	}elseif ($_GET['page'] == 'onePicture') {
		$picture = [];
		foreach (Picture::getTable($DB) as $pictures) {
			if($pictures['id_good'] == $_GET['id_good']){
				$picture = $pictures;
				break;
			}
		}
		include 'templates/onePicture.php';
	}
