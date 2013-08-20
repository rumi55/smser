<?
session_start();

$ca_code = $_SESSION["ca_code"];
$cb_code = $_REQUEST['cb_code'];
$button = $_REQUEST['button'];

if(isset($_SESSION['ca_code']) && $_SESSION['ca_code'] ==  $_REQUEST['cb_code']){
	require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	mysql_select_db(DB_NAME);

	$result = mysql_query("DELETE from aa_rectext where id = '$button'") or die(mysql_error());
} else { }

Header("Location: ../../../wp-admin/admin.php?page=smser_analytics");
?>