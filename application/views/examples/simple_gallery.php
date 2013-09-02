<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	
	<title>Simple Gallery</title>
	
</head>

<body>

	<div class="gallery">

	<?php if (count($images) > 0): ?>

		<?php foreach ($images as $image): ?>

		<img class="image" src="<?= $image['full'] ?>" alt="" />

		<?php endforeach; ?>

	<?php endif; ?>

	</div>

</body>
</html>