<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

$token = $_REQUEST["token"]; 
$from = $_REQUEST["from"];  // the sender's phone number;
$text = $_REQUEST["text"]; // the body of the message;
$created = date('Y-m-d H:i:s');

$query = "SELECT token FROM aa_set where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {

if($token == $row["token"]) {

mysql_query("INSERT INTO aa_rectext (date, text, numberin) VALUES (\"$created\", \"$text\", \"$from\")");

}
else { "disabled"; }
}
?>