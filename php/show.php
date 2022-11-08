<?php 

$db = new PDO('mysql:host=localhost;dbname=site', 'root', 'root');
$query = $db->prepare("SELECT * FROM apps");
$query->execute();

$files = $query->fetchAll(PDO::FETCH_ASSOC);

echo '<table>';
foreach($files as $file){
	echo '<tr>';

	echo '<td>'. $file['dt'] . '</td>';
	echo '<td>'. $file['name'] . '</td>';
	echo '<td>'. $file['phone'] . '</td>';

	echo '</tr>';
}


echo '</table>';


?>

 <style>
 	table, td {
 		border: 1px solid black;
 		padding: 3px;
 		border-collapse: collapse;
 	}
 </style>