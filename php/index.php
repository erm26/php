<?php 

	// date_default_timezone_set('Asia/Bishkek');

	// if(count($_POST) > 0) {
	// 	$name = trim($_POST['name']);
	// 	$phone = trim($_POST['phone']);
	// 	if(strlen($name) < 2) {
	// 		$msg = 'Имя не верное';
	// 	} elseif (strlen($phone) < 8){
	// 		$msg = 'Телефон короткий';
	// 	} elseif(!is_numeric($phone)) {
	// 		$msg = 'Телефон не должен содержать буквы';
	// 	} else {
	// 		$msg = 'Ваше сообщение отправлено';

	// 		$pdo = new PDO('mysql:host=localhost;dbname=site', 'root', 'root');
	// 		$query = $pdo->prepare('INSERT INTO apps (name, phone) VALUES (?, ?)');
	// 		$values = [$name, $phone];
	// 		$query->execute($values);

	// 		header('Location: /php');
	// 	}
	// } else {
	// 		$name = '';
	// 		$phone = '';
	// 		$msg = 'Введите ваше имя и телефон';
	// 	}



	date_default_timezone_set('Asia/Bishkek');



	if(count($_POST) > 0){

		$name = trim($_POST['name']);
		$phone = trim($_POST['phone']);

		if(strlen($name) < 2){
			$msg = 'Введите правильное имя';
		} elseif (strlen($phone) < 10) {
			$msg = 'Номер должен быть длиннее';
		} elseif (!is_numeric($phone)){
			$msg = 'Номер не должен содержать буквы';
		} else {
			$db = new PDO('mysql:host=localhost;dbname=site', 'root', 'root');
			$query = $db->prepare('INSERT INTO apps (name, phone) VALUES (?,?)');
			$values = [$name, $phone];
			$query->execute($values);

			$msg = 'Ваша заявка принята, ожидайте звонка';

			header('Location: /php');
		}
	} else {
		$msg = 'Введите ваше имя и телефон';
		$name = '';
		$phone = '';
	}

	file_put_contents('files', date('Y-m-d H:y') . $name . ' ' . $phone . "\n", FILE_APPEND);

 
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<title>Document</title>
 </head>
 <body>
 	<h3><?=$msg?></h3>
 	<form action="" method="post">
 		<input type="text" name="name" value="<?=$name?>">
 		<input type="text" name="phone" value="<?=$phone?>">
 		<input type="submit" value="Отправить">
 	</form>
 </body>
 </html>