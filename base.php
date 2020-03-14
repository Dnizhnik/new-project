<?php
$pdo = new PDO ('mysql:dbname=mydb;host=localhost:3306', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

if ((!empty($_POST['doc'])) || (!empty($_FILES['docs'] ['name'])) || (!empty($_POST['doc'])) && (!empty($_FILES['docs'] ['name']))){
	function analyze () {
		global $result, $string;
		if(!empty($_POST['doc'])) {
		   $string = $_POST['doc'];
		}
		if(!empty($_FILES['docs'] ['name'])) {
			$string = fopen($_FILES['docs']['tmp_name'], 'r');
				$string = stream_get_contents($string);
		}
    $result = preg_split("/[\W-\d]/ui", $string);
    $result = array_filter($result);
    }
analyze ();
	$word = count($result);
		$allWords = array_count_values($result);
		$insertQuery = 'INSERT INTO	uploaded_text(content, words_count)	VALUES(:string, :word)';
$statement = $pdo->prepare($insertQuery);
$statement->execute([':string' => $string, ':word' => $word]);
	$insertQuery2 = 'INSERT INTO word(text_id, word, count) VALUES(:text_id, :key, :value)';
$statement2 = $pdo->prepare($insertQuery2);
$text_id = $pdo->lastInsertId();
foreach ($allWords as $key => $value) {
$statement2->execute([':text_id' => $text_id, ':key' => $key, ':value' => $value]);
}
}
else {
	echo "Ты ничего не ввел";
}
?>
<meta http-equiv="refresh" content="0;url=http://localhost/main.php">
