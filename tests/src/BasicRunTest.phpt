<?php

use h4kuna\Assets,
	Tester\Assert;

$container = require __DIR__ . '/../bootsrap.php';

$time = filemtime(__DIR__ . '/../config/php-unix.ini');

/* @var $file Assets\File */
$file = $container->getByType(Assets\File::class);

Assert::type(Assets\File::class, $file);

Assert::same('/config/php-unix.ini?' . $time, $file->createUrl('config/php-unix.ini'));

Assert::same('//www.example.com/config/test.neon', preg_replace('~\?.*~', '', $file->createUrl('//config/test.neon')));

Assert::same('/temp/jquery-3.2.1.min.js?1490036475', $file->createUrl('temp/jquery-3.2.1.min.js'));