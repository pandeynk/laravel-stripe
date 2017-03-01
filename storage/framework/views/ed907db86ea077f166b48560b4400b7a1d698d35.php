<!DOCTYPE html>
<html>
<head>
	<title>Lang</title>
</head>
<body>
	<h1><?php echo e(trans('language.message')); ?></h1>
	<h2><?php echo e(currency(12.00, 'USD', 'INR')); ?></h2>
</body>
</html>
