<?php
if (!empty($_FILES['docs']) {
	$docs = $_FILES['docs'];
	foreach ($docs['tmp_name'] as $index => $tmpPath) {
		if (!array_key_exists($index, $docs['name'])) {
			continue;
		}
		move_uploaded_file($tmpPath, __DIR__.DIRECTORY_SEPARATOR.$docs['name'][$index]);
		$string = file_get_contents($docs['name']);
	}
}
$string = mb_strtolower($string);
$search = array(' – ', '.', ',',':','«', '»');
$replace = array(' ');
$without = str_replace($search, $replace, $string);
$result = explode(" ", $without);
mkdir("doc", 0777, false);
touch('doc/doc.csv');
$file = fopen('doc/doc.csv', 'w');
	$words = print_r(count($result));
	fwrite($file, "$words \n");
	$allWords = print_r(array_count_values($result));
	fwrite($file, $allWords);
	fclose($file);
	?>


