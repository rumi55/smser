<?
session_start();

$b5_code = $_REQUEST['code'];
$a5_code = $_SESSION["a5_code"];

if ($a5_code == "$b5_code") { 
	$_SESSION["a5_code"] = "zero";
	
	require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	mysql_select_db(DB_NAME);

	header("Content-type: text/csv");
	header("Content-Disposition: attachment; filename=smser_numbers.csv");
	header("Pragma: no-cache");
	header("Expires: 0");

	$query = "SELECT * FROM aa_text order by id desc";
	$result = mysql_query($query);
	while($row = mysql_fetch_array( $result )) {	
		echo "$row[receiver]\n";
	}
} else { }
?>