<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

$mid = $_REQUEST['mid']; // ID of the message in our network;
$umid = $_REQUEST['umid']; // ID of the message in your system, is available in case you’ve sent it with your HTTP POST request;
$status = $_REQUEST['status']; // current status of the message;


$query = "SELECT * FROM aa_text where mid_sms = '$mid'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {

$res = mysql_query("UPDATE aa_text SET sms_status='$status' where mid_sms = '$mid'") or die(mysql_error());

}

?>