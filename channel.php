<?php
session_start();

$ca_code = $_SESSION["ca_code"];
$cb_code = $_REQUEST['cb_code'];

if(isset($_SESSION['ca_code']) && $_SESSION['ca_code'] ==  $_REQUEST['cb_code']){
require_once($_SERVER['DOCUMENT_ROOT'] . "/wp-config.php");
mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
mysql_select_db(DB_NAME);

echo "<table border=\"0\" cellpadding=\"10\" cellspacing=\"0\" style=\"border: 1px solid #666666;\">";
echo "<tr style=\"font-weight: bold; background-color: #cccccc;\"><td>ID</td><td>Date</th><td>Number</td><td>Text</td><td>Options</td></tr>";

$query = "SELECT * FROM aa_rectext ORDER BY id DESC LIMIT 20";
$result = mysql_query($query);

echo "<form method=post action=\"../wp-content/plugins/smser/del.php\">"
."<input type=\"hidden\" name=\"cb_code\" value=\"$cb_code\">";

while($row = mysql_fetch_array( $result )) {

$ntm++;
$ntmz = $ntm / 2;
if (!ereg("[^0-9]",$ntmz)) {
	$lcx = "#efefef";
} else {
	$lcx = "#FFFFFF";
}

echo "<tr bgcolor=\"$lcx\">"
."<td>$row[id]</td>"
."<td>$row[date]</td>"
."<td>$row[numberin]</td>"
."<td>$row[text]</td>"
."<td><button type=\"submit\" name=\"button\" class=\"button\" value=\"$row[id]\">Delete</button></td>"
."</tr>"; 
}

echo "</table>";
echo "<p><button type=\"submit\" class=\"button\" name=\"button\" value=\"del_all\">Delete ALL Messages</button></p>"
."</form>";

} else { }
?>