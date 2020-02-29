<?php
var_dump($_POST['description']);
if (!empty($_POST['description'])) {
	$string = htmlspecialchars($_POST['description']);
	$string = mb_strtolower($string);
$search = array(' – ', '.', ',',':','«', '»');
$replace = array(' ');
$without = str_replace($search, $replace, $string);
$result = explode(" ", $without);
	mkdir('text', 0777, false);
	touch('text/text.csv');
	$file = fopen('text/text.csv', 'w');
	$words = print_r(count($result));
	fwrite($file, "Всего слов - . $words \n");
	$allWords = print_r(array_count_values($result));
	fwrite($file, $allWords);
	fclose($file);
}
else {
	echo "пусто";
		}
?>