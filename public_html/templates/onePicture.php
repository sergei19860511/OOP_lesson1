<?php
//include '../Picture.php';
$title = 'Одна картинка';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title><?= $title; ?></title>
</head>
<body>

	<div class="picture">
		<img src="../img/<?=$pictures['img_good'];?>">
	</div>

</body>
</html>