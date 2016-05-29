<?
// Параметры подключения к БД
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_databse = 'motor';

// Параметры парсера
$folder = "$_SERVER[DOCUMENT_ROOT]/to_parse";
$query_length_limit = 25000;

$mysqli = new mysqli($db_host, $db_user, $db_password, $db_databse);

if ($mysqli->connect_error) {
    die('Ошибка подключения (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$files = scandir($folder);

$queries = [
	'company' => '',
	'attribute' => '',
	'company' => '',
	'company' => '',
	'company' => '',
	'company' => '',
	'company' => '',
];

foreach ($files as $file) {
	$path = "$folder/$file";
	if (!is_dir($path)) {
		$data = json_decode(file_get_contents($path), true);
		$company_data = [
			'name' => $data['result']['items'][0]['name'],
			'lon' => $data['result']['items'][0]['point']['lon'],
			'lat' => $data['result']['items'][0]['point']['lat'],
			'address_name' => $data['result']['items'][0]['address_name'],
			'postcode' => $data['result']['items'][0]['address']['postcode'],
		];
		
		$q .= strlen($q) ? : ;

	}
}

function prepareInsertQuery($table, $data, $connection) {
	$query = "INSERT INTO `$table` (";
	$fields_part = '';
	$values_part = ' VALUES (';
	foreach ($data as $field => $value) {
		$fields_part .= "`$field`, ";
		$values_part .= "'".$connection->real_escape_string($value)."', ";
	}
	$fields_part = substr($fields_part, 0, -2).')';
	$values_part = substr($values_part, 0, -2).')';
	$query .= $fields_part.$values_part;
	return $query;
}

function executeQuery($mysqli, &$query) {
	$res = $mysqli->query($query);
	$query = "";
	return $res;
}