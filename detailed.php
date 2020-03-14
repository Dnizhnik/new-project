<!DOCTYPE html>
<html>
<head>
	<title>Детальный анализ</title>
</head>
<body>
<?php
$pdo = new PDO ('mysql:dbname=mydb;host=localhost:3306', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	$id = intval($_GET['id']);
	echo '<table>';
echo '<tr>';
echo '<td> id </td>';
echo '<td> слово </td>';
echo '<td> встречаемость </td>';
echo '<td> id текста </td>';
echo '<td> текст </td>';
echo '<td> всего слов </td>';
echo '<td> дата добавления </td>';
echo '</tr>';
$allRows1 = $pdo->query("SELECT id AS word_id, text_id, word, count FROM `word` WHERE word.text_id = '$id'");
$allRows2 = $pdo->query("SELECT id, date, words_count, content FROM `uploaded_text` WHERE uploaded_text.id = '$id'");
$cell2 = $allRows2->fetch(PDO::FETCH_OBJ);
while($cell1 = $allRows1->fetch(PDO::FETCH_OBJ)) {
			echo '<tr>';
			echo '<td><b>'.$cell1->word_id.'</b></td>';
			echo '<td><b>'.$cell1->word.'</b></td>';
			echo '<td><b>'.$cell1->count.'</b></td>';
				if (!isset($num1) && !isset($num2) && !isset($num3) && !isset($num4)) {
			echo '<td><b>'.$num1 = $cell1->text_id.'</b></td>';
			echo '<td><b>'.$num2 = $cell2->content.'</b></td>';
			echo '<td><b>'.$num3 = $cell2->words_count.'</b></td>';
			echo '<td><b>'.$num4 = $cell2->date.'</b></td>';
			}
			else {
				continue;
					}
		echo '</tr>';
	}
echo '</table>';
?>
</body>
</html>