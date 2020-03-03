<?php
function createText () {
	$string = htmlspecialchars($_POST['doc']);
   $string = mb_strtolower($string);
    $result = preg_split("/[\W-\d]/ui", $string);
    $result = array_filter($result);
if (file_exists(__DIR__.DIRECTORY_SEPARATOR.'text')){
    	 	chdir('text');
    $file = fopen(uniqid() . '.csv', 'w');
	$word = count($result);
	fwrite($file, "Всего слов - $word \n");
	$allWords = array_count_values($result);
		foreach ($allWords as $key => $value) {
    fwrite($file, $key.";".$value."\r\n");
}
	fclose($file);
}
else{
	mkdir('text', 0777, false);
	chdir('text');
    $file = fopen(uniqid() . '.csv', 'w');
	$word = count($result);
	fwrite($file, "Всего слов - $word \n");
	$allWords = array_count_values($result);
		foreach ($allWords as $key => $value) {
    fwrite($file, $key.";".$value."\r\n");
}
	fclose($file);
	}
}

function createDoc () {
	$string = fopen($_FILES['docs']['tmp_name'], 'r');
				$string = stream_get_contents($string);
		 	$string = mb_strtolower($string);
$result = preg_split("/[\W-\d]/ui", $string);
    $result = array_filter($result);
if (file_exists(__DIR__.DIRECTORY_SEPARATOR.'doc')){
    	 	chdir('doc');
    $file = fopen(uniqid() . '.csv', 'w');
	$word = count($result);
	fwrite($file, "Всего слов - $word \n");
	$allWords = array_count_values($result);
		foreach ($allWords as $key => $value) {
    fwrite($file, $key.";".$value."\r\n");
}
	fclose($file);
    }
else{
	mkdir('doc', 0777, false);
	chdir('doc');
    $file = fopen(uniqid() . '.csv', 'w');
	$word = count($result);
	fwrite($file, "Всего слов - $word \n");
	$allWords = array_count_values($result);
		foreach ($allWords as $key => $value) {
    fwrite($file, $key.";".$value."\r\n");
}
	fclose($file);
	}
}

if (!empty($_POST['doc']) && (empty($_FILES['docs'] ['name']))) {
	createText ();
}
  if (!empty($_FILES['docs'] ['name']) && (empty($_POST['doc']))) {
	    createDoc ();
}
if (!empty($_POST['doc']) && (!empty($_FILES['docs'] ['name']))) {
	createDoc ();
	chdir(__DIR__);
	createText ();
}
    ?>