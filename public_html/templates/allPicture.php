<?php
$title = 'Все картинки';
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
	<?php foreach (Picture::getTable($DB) as $pictures) : ?>

	<div class="picture">
		<a href="?page=onePicture&id_good=<?=$pictures['id_good'];?>"><img src="../img/<?=$pictures['img_good'];?>"></a>
	</div>
<? endforeach;?>
</body>
</html>

