<!DOCTYPE html>
<html>
<head>
	<title>Главная</title>
</head>
<body>
<a href = "index.php">Загрузить</a>
<?php
$pdo = new PDO ('mysql:dbname=mydb;host=localhost:3306', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
echo '<table>';
echo '<tr>';
echo '<td> id </td>';
echo '<td> content </td>';
echo '<td> Детальный анализ </td>';
echo '</tr>';
	$allRows = $pdo->query('SELECT `id`, left(`content`, 50) AS `text`, `words_count` FROM `uploaded_text`');
		while($row = $allRows->fetch(PDO::FETCH_ASSOC)) {
			echo '<tr>';
			echo '<td><b>'.$row['id'].'</b></td>';
			echo '<td><b>'.$row['text'].'</b></td>';
			$id = $row['id'];
			echo '<td><a href = "detailed.php?id='.$id.'">'.$id.'</a></td>';
			echo '</tr>';
		}
echo '</table>';
?>
</body>
</html>