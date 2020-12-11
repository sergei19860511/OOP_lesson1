
 <?php
require 'Picture.php';
?>
	<?php

	if (!isset($_GET['page'])) {
		include 'templates/allPicture.php';
	}elseif ($_GET['page'] == 'onePicture') {
		include 'templates/onePicture.php';
	}
