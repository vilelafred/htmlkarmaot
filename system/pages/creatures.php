<?php
$title = 'Creatures';

$race = isset($_GET['race']) ? $_GET['race'] : null;

if(empty($race)) {
	echo $twig->render('creatures/creatures.html.twig');
}
else {
	if(!ctype_alnum($race)) {
		echo 'Race contains illegal letters (a-z, A-Z and 0-9 only!).';
		return;
	}
	
	$file = 'creatures/' . $race . '.html.twig';
	if(file_exists(SYSTEM . 'templates/' . $file))
		echo $twig->render($file);
}