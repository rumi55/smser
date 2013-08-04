<?php
	/*
	Plugin Name: SMSer SMS Widget
	Plugin URI: http://www.2-waysms.com
	Description: SMSer - SMS sending Widget. You or Your users can send SMS from your Wordpress Web-site. You can use SMSer for SMS advertising, Facebook page promotion etc.
	Version: 1.0
	Author: Tomas Tamm
	Author URI: http://www.2-waysms.com
	License: GPL2


	Copyright 2013  Tomas Tamm  (E-mail: tomas.tamm@yahoo.com)
 
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.
 
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
 
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
	*/

session_start();

$option = $_REQUEST['option'];
$set_table = "aa_set";
$txt_table = "aa_text";

$smser_location = ABSPATH . "/wp-content/plugins/smser";

$wdx = "select * from $set_table where id = '1'"; 
$wd_result = mysql_query($wdx);
while($wd = mysql_fetch_array( $wd_result )) {
	include("$smser_location/{$wd[lang_dict]}.php");
}

$languages = array("en" => "English", "es" => "Spanish", "de" => "German", "it" => "Italian", "fr" => "French", "pt" => "Portuguese", "ru" => "Russian", "fi" => "Finnish", "no" => "Norwegian", "se" => "Swedish", "he" => "Herbew", "tr" => "Turkish");

$countries = array("93" => "Afghanistan", "355" => "Albania", "213" => "Algeria", "1684" => "American Samoa", "376" => "Andorra", "244" => "Angola", "1264" => "Anguilla", "1268" => "Antigua and Barbuda", "54" => "Argentine Republic", "374" => "Armenia", "297" => "Aruba", "61" => "Australia", "43" => "Austria", "994" => "Azerbaijani Republic", "1242" => "Bahamas", "973" => "Bahrain", "880" => "Bangladesh", "1246" => "Barbados", "375" => "Belarus", "32" => "Belgium", "501" => "Belize", "229" => "Benin", "1441" => "Bermuda", "975" => "Bhutan", "591" => "Bolivia", "387" => "Bosnia and Herzegovina", "267" => "Botswana", "55" => "Brazil", "1284" => "British Virgin Islands", "673" => "Brunei Darussalam", "359" => "Bulgaria", "226" => "Burkina Faso", "257" => "Burundi", "855" => "Cambodia", "237" => "Cameroon", "1" => "Canada", "238" => "Cape Verde", "1345" => "Cayman Islands", "236" => "Central African Republic", "235" => "Chad", "56" => "Chile", "86" => "China", "57" => "Colombia", "269" => "Comoros", "242" => "Congo", "682" => "Cook Islands", "506" => "Costa Rica", "225" => "Cote d'Ivoire", "385" => "Croatia", "53" => "Cuba", "357" => "Cyprus", "420" => "Czech Republic", "850" => "Democratic People's Republic of Korea", "243" => "Democratic Republic of the Congo", "45" => "Denmark", "253" => "Djibouti", "1767" => "Dominica", "1809" => "Dominican Republic", "593" => "Ecuador", "20" => "Egypt", "503" => "El Salvador", "240" => "Equatorial Guinea", "291" => "Eritrea", "372" => "Estonia", "251" => "Ethiopia", "500" => "Falkland Islands", "298" => "Faroe Islands", "679" => "Fiji", "358" => "Finland", "33" => "France", "262" => "French Departments and Territories in the Indian Ocean", "594" => "French Guiana", "689" => "French Polynesia", "241" => "Gabonese Republic", "220" => "Gambia", "995" => "Georgia", "49" => "Germany", "233" => "Ghana", "350" => "Gibraltar", "30" => "Greece", "299" => "Greenland (Denmark)", "1473" => "Grenada", "590" => "Guadeloupe", "502" => "Guatemala", "224" => "Guinea", "245" => "Guinea-Bissau", "592" => "Guyana", "509" => "Haiti", "504" => "Honduras", "852" => "Hong Kong, China", "36" => "Hungary", "354" => "Iceland", "91" => "India", "62" => "Indonesia", "98" => "Iran", "964" => "Iraq", "353" => "Ireland", "972" => "Israel", "39" => "Italy", "1876" => "Jamaica", "81" => "Japan", "962" => "Jordan", "77" => "Kazakhstan", "254" => "Kenya", "686" => "Kiribati", "82" => "Korea", "965" => "Kuwait", "996" => "Kyrgyz Republic", "856" => "Lao People's Democratic Republic", "371" => "Latvia", "961" => "Lebanon", "266" => "Lesotho", "231" => "Liberia", "218" => "Libya", "423" => "Liechtenstein", "370" => "Lithuania", "352" => "Luxembourg", "853" => "Macao, China", "389" => "Macedonia", "261" => "Madagascar", "265" => "Malawi", "60" => "Malaysia", "960" => "Maldives", "223" => "Mali", "356" => "Malta", "692" => "Marshall Islands", "596" => "Martinique", "222" => "Mauritania", "230" => "Mauritius", "52" => "Mexico", "691" => "Micronesia", "373" => "Moldova", "377" => "Monaco", "976" => "Mongolia", "382" => "Montenegro", "1664" => "Montserrat", "212" => "Morocco", "258" => "Mozambique", "95" => "Myanmar", "264" => "Namibia", "674" => "Nauru", "977" => "Nepal", "31" => "Netherlands", "599" => "Netherlands Antilles", "687" => "New Caledonia", "64" => "New Zealand", "505" => "Nicaragua", "227" => "Niger", "234" => "Nigeria", "47" => "Norway", "968" => "Oman", "92" => "Pakistan", "680" => "Palau", "507" => "Panama", "675" => "Papua New Guinea", "595" => "Paraguay", "51" => "Peru", "63" => "Philippines", "48" => "Poland", "351" => "Portugal", "1787" => "Puerto Rico", "974" => "Qatar", "40" => "Romania", "7" => "Russian Federation", "250" => "Rwanda", "1869" => "Saint Kitts and Nevis", "1758" => "Saint Lucia", "508" => "Saint Pierre and Miquelon", "1784" => "Saint Vincent and the Grenadines", "685" => "Samoa", "378" => "San Marino", "239" => "Sao Tome and Principe", "966" => "Saudi Arabia", "221" => "Senegal", "381" => "Serbia", "248" => "Seychelles", "232" => "Sierra Leone", "65" => "Singapore", "421" => "Slovak Republic", "386" => "Slovenia", "677" => "Solomon Islands", "252" => "Somali Democratic Republic", "27" => "South Africa", "34" => "Spain", "94" => "Sri Lanka", "249" => "Sudan", "597" => "Suriname", "268" => "Swaziland", "46" => "Sweden", "41" => "Switzerland", "963" => "Syrian Arab Republic", "886" => "Taiwan, China", "992" => "Tajikistan", "255" => "Tanzania", "66" => "Thailand", "670" => "Timor-Leste", "228" => "Togolese Republic", "676" => "Tonga", "1868" => "Trinidad and Tobago", "216" => "Tunisia", "90" => "Turkey", "993" => "Turkmenistan", "1649" => "Turks and Caicos Islands", "256" => "Uganda", "380" => "Ukraine", "971" => "United Arab Emirates", "44" => "United Kingdom", "1" => "United States of America", "1340" => "United States Virgin Islands", "598" => "Uruguay", "998" => "Uzbekistan", "678" => "Vanuatu", "58" => "Venezuela", "84" => "Viet Nam", "681" => "Wallis and Futuna", "967" => "Yemen", "260" => "Zambia", "263" => "Zimbabwe");

add_action('admin_menu', 'settsmser');

function settsmser() {
add_menu_page('SMSer', 'SMSer', '', 'smser_messenger', 'Outbox', "/wp-content/plugins/smser/picsmser.png", '99');
add_submenu_page('smser_messenger', 'Settings', 'Settings', '1', 'smser_settings','settsmsersettings');
add_submenu_page('smser_messenger', 'Outbox', 'Outbox', '1', 'smser_outbox','settsmseroutbox');
}    

function settsmsersettings() {
global $option, $set_table, $txt_table, $countries, $languages, $lang;
$set_table_exists = mysql_query("DESCRIBE $set_table");
if (!$set_table_exists) { 
	mysql_query("CREATE TABLE IF NOT EXISTS `$set_table` (`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,`token` VARCHAR( 100 ) NOT NULL ,`smscount` INT( 11 ) NOT NULL ,`mynum` VARCHAR( 100 ) NULL ,`country` VARCHAR( 100 ) NULL ,`fbacc` VARCHAR( 100 ) ,`lang_dict` VARCHAR( 10 ) ,`mymess` VARCHAR( 100 ) NULL ,PRIMARY KEY (  `id` ) ,UNIQUE KEY  `id` (  `id` )) ENGINE = MYISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT =1;");

mysql_query("INSERT INTO $set_table (id, smscount, mymess, fbacc, lang_dict) VALUES (\"1\", \"160\", \"I like 2-waysms.com\", \"2waysmsgateway\", \"en\")");

} else { }

$txt_table_exists = mysql_query("DESCRIBE $txt_table");
if (!$txt_table_exists) { 
	mysql_query("CREATE TABLE IF NOT EXISTS `$txt_table` (`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,`country` VARCHAR( 55 ) NOT NULL ,`sent_date` DATETIME NOT NULL ,`text`TEXT NULL ,`senderid` VARCHAR( 55 ) NULL ,`receiver` VARCHAR( 55 ) ,PRIMARY KEY (  `id` ) ,UNIQUE KEY  `id` (  `id` )) ENGINE = MYISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT =1;");
} else { }



if ($option == "save"){
	$b1_code = $_REQUEST['b1_code'];
	$a1_code = $_SESSION["a1_code"];

	if ($a1_code == "$b1_code") { 
		
		$fbupd = $_REQUEST["bfbacc"];
		$country = $_REQUEST["country"];
		$token = $_REQUEST["token"];
		$mynum = $_REQUEST["from"];
		$smscou = $_REQUEST["smscou"];
		$lang_dict = $_REQUEST["lang_dict"];
		$mymes = $_REQUEST["mes"];

		$result = mysql_query("UPDATE $set_table SET lang_dict='$lang_dict', fbacc='$fbupd', mymess='$mymes', mynum='$mynum', smscount='$smscou', token='$token', country='$country' where id = '1'") or die(mysql_error());
		$_SESSION["a1_code"] = "zero";

		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:#CCFFCC;\">$lang[1]</div>";			
		
	} else { }		

}

$x1_code=rand(1000,9999);
$_SESSION["a1_code"] = "$x1_code";

$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {

echo "<h1><br>$lang[2]</h1><br>"
."<form method=post action=\"";
echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); 
echo "\">"

."<input type=\"hidden\" name=\"option\" value=\"save\">"
."<input type=\"hidden\" name=\"b1_code\" value=\"$x1_code\">"
."<h3>$lang[3]</h3><br>"

."<br>$lang[4] "
."<input type=\"text\" name=\"from\" id=\"from\" value=\"$row[mynum]\">"
."<blockquote><small>"
."$lang[5] <a href=\"http://www.2-waysms.com\" target=\"_blank\">2-WaySMS.com</a>."
."</small></blockquote></p>"
."<br>$lang[6] "
."<input type=\"text\" name=\"token\" id=\"token\" value=\"$row[token]\">"
."<blockquote><small>"
."$lang[7] <a href=\"http://www.2-waysms.com/my\" target=\"_blank\">2-WaySMS.com</a> $lang[8]</a>"
."</small></blockquote></p>"
."<br>$lang[9]<br>"
."<select class=\"select\" name=\"country\"><option value=\"\">$lang[10]</option>";
foreach ($countries as $countriesk => $countriesv){
echo "<option value=\"$countriesk\"";
if ($row[country] == "$countriesk"){ echo " selected "; } else { }
echo ">$countriesv (+$countriesk)</option>";
}
echo "</select><br>"
."<br><h3>$lang[11]</h3><br>"
."$lang[12] </input>"
."<input type=\"text\" name=\"bfbacc\" id=\"bfbacc\" value=\"$row[fbacc]\"><br>"
."<blockquote><small>"
."$lang[13]</a>"
."</small></blockquote></p>"	
."<br><h3>$lang[14]</h3><br>"
."$lang[15] "
."<input type=\"text\" name=\"smscou\" size=4 id=\"smscou\" value=\"$row[smscount]\"><br>"
."<blockquote><small>"
."$lang[16]</a>"
."</small></blockquote></p>"

."<p>$lang[17]<br>"
."<select class=\"select\" name=\"lang_dict\">";
foreach ($languages as $languagesk => $languagesv){
echo "<option value=\"$languagesk\"";
if ($row[lang_dict] == "$languagesk"){ echo " selected "; } else { }
echo ">$languagesv</ortion>";
}
echo "</select></p>"


."$lang[18] "
."<input type=\"text\" name=\"mes\" id=\"mes\" value=\"$row[mymess]\"><br>"
."<blockquote><small>"
."$lang[19]</a>"
."</small></blockquote></p>"    
."<br><input type=\"submit\" class=\"button blue\" name=\"submit\" value=\"$lang[20]\">"
."</form></center>";
}

}

function settsmseroutbox() {
global $option, $set_table, $txt_table, $lang, $smser_location;


if ($option == "delete_text"){
	$b2_code = $_REQUEST['b2_code'];
	$a2_code = $_SESSION["a2_code"];

	if ($a2_code == "$b2_code") { 

		$button_del = $_REQUEST["button"];

		if ($button_del == "del_all"){
		$del_set = "LIKE '%'";
		} else {
		$del_set = "= '$button_del'";
		}

		$result = mysql_query("DELETE from $txt_table where id $del_set") or die(mysql_error());
		$_SESSION["a2_code"] = "zero";

		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:#CCFFCC;\">$lang[42]</div>";			
		
	} else { }	

}

$x2_code=rand(1000,9999);
$_SESSION["a2_code"] = "$x2_code";
		
$result = mysql_query("SELECT * FROM $txt_table ORDER BY id DESC LIMIT 20");

$nrofmessages = mysql_num_rows($result);  
if ($nrofmessages > 0){

echo "<h1>$lang[21]</h1>";

echo "<table border=\"0\" cellpadding=\"10\" cellspacing=\"0\" style=\"border: 1px solid #666666;\">";
echo "<form method=post action=\"";
echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); 
echo "\">"

."<input type=\"hidden\" name=\"option\" value=\"delete_text\">"
."<input type=\"hidden\" name=\"b2_code\" value=\"$x2_code\">"
."<input type=\"hidden\" name=\"lim_it\" value=\"$lim_it\">"

."<tr style=\"font-weight: bold; background-color: #cccccc;\"><td>ID</td><td>$lang[22]</th><td>$lang[23]</td><td>$lang[24]</td><td>$lang[25]</td><td>$lang[26]</td></tr>";


while($row = mysql_fetch_array( $result )) {

						$ntm++;
						$ntmz = $ntm / 2;
					if ( ! ereg("[^0-9]",$ntmz)) {
						 $lcx = "#efefef";
					 } else {
						 $lcx = "#FFFFFF";
					 }

echo "<tr bgcolor=\"$lcx\">"
."<td>$row[id]</td>"
."<td>$row[sent_date]</td>"
."<td>$row[senderid]</td>"
."<td>$row[receiver]</td>"
."<td>$row[text]</td>"
."<td><button type=\"submit\" name=\"button\" class=\"button\" value=\"$row[id]\">$lang[27]</button></td>"
."</tr>"; 
}

echo "</table><br>";
echo "<button type=\"submit\" class=\"button\" name=\"button\" value=\"del_all\">$lang[28]</button>"; 

$x5_code=rand(1000,9999);
$_SESSION["a5_code"] = "$x5_code";
echo " <button type=\"button\" class=\"button\" onclick=\"window.open('../wp-content/plugins/smser/csv.php?code=$x5_code')\">$lang[45]</button>";

echo "</form>";


} else {
echo "<h1>$lang[29]</h1>";
}
}

// WIGET
class RandomPostWidget extends WP_Widget
{
function RandomPostWidget()
{
$widget_ops = array('classname' => 'SMSer', 'description' => 'Displays a SMSer Widget' );
$this->WP_Widget('SMSer', 'SMSer - SMS senging', $widget_ops);
}

function form($instance)
{
$instance = wp_parse_args( (array) $instance, array( 'title' => 'SMSer' ) );
$title = $instance['title'];
?>
Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" />
<?php
}

function update($new_instance, $old_instance)
{
$instance = $old_instance;
$instance['title'] = $new_instance['title'];
return $instance;
}

function widget($args, $instance)
{
global $countries, $set_table, $txt_table, $option, $lang;

extract($args, EXTR_SKIP);

echo $before_widget;
$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);

if (!empty($title))
echo $before_title . $title . $after_title;;

// WIDGET CODE GOES HERE

echo "<div id=\"fb-root\"></div>\n"
."<script>(function(d, s, id) {\n"
."var js, fjs = d.getElementsByTagName(s)[0];\n"
."if (d.getElementById(id)) return;\n"
."js = d.createElement(s); js.id = id;\n"
."js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=\";\n"
."fjs.parentNode.insertBefore(js, fjs);\n"
."}(document, 'script', 'facebook-jssdk'));</script>\n";

$query = "SELECT * FROM $set_table where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {
echo "<script type=\"text/javascript\">\n"	
."var count = \"$row[smscount]\";\n"  
."function limiter(){\n"
."var tex = document.myform.text.value;\n"
."var len = tex.length;\n"
."if(len > count){\n"
." tex = tex.substring(0,count);\n"
."document.myform.text.value =tex;\n"
."return false;\n"
."}\n"
."document.myform.limit.value = count-len;\n"
."}\n"
."var r={'special':/[\W]/g}\n"
."function valid(o,w)\n"
."{\n"
."o.value = o.value.replace(r[w],'');\n"
."}\n"
."function isNumeric()\n"
."{"
."var elem=document.myform.to.value;\n"
."var nalt=document.getElementById('phno1');\n"
."if(elem!=\"\")"
."{"
."var numericExpression = /^[0-9]+$/;\n"
."if(elem.match(numericExpression))\n"
."{"
."nalt.innerHTML=\"\";\n"
."return true;\n"
."}\n"
."else{\n"	
."nalt.innerHTML=\"<font size=1 > $lang[43]</font>\";\n"
."document.myform.to.focus();\n"
."document.myform.to.value=\"\";\n"
."return false;\n"
."}\n"
."}\n"
."else if(elem.length==0)  {\n"
."nalt.innerHTML=\"<font size=1 > $lang[44]</font>\";\n"
."document.myform.to.focus();;\n"
."return false;\n"
."}\n"
."}\n"

."function formValidator(){\n"
."var senderid = document.getElementById(\"senderid\");\n"
."var to = document.getElementById(\"to\");\n"
."var text = document.getElementById(\"text\");\n"

."if(notEmpty(senderid, \"$lang[32]\")){\n"
."if(notEmpty(to, \"$lang[33]\")){\n"
."if(notEmpty(text, \"$lang[34]\")){\n"

."}\n"
."}\n"
."}\n"

."return false;\n"	
."}\n"

."function notEmpty(elem, helperMsg){\n"
."if(elem.value.length == 0){\n"
."alert(helperMsg);\n"
."elem.focus();\n" 
."return false;\n"
."}\n"
."return true;\n"
."}\n"
."</script>\n";
}


$query = "SELECT * FROM $set_table where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {
echo "<div id=\"fb-root\"></div>\n"
."<script>(function(d, s, id) {\n"
."var js, fjs = d.getElementsByTagName(s)[0];\n"
."if (d.getElementById(id)) return;\n"
."js = d.createElement(s); js.id = id;\n"
."js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=576381155747707\";\n"
."fjs.parentNode.insertBefore(js, fjs);\n"
."}(document, 'script', 'facebook-jssdk'));</script>\n"

."<div class=fb-like-box data-href=https://www.facebook.com/$row[fbacc] data-width=292 data-show-faces=false data-stream=false data-show-border=false data-header=false></div>"
."$lang[30]";

if ($option == "sendsms"){

		$senderid = $_REQUEST['senderid'];
		$to = $_REQUEST['to'];
		$text = $_REQUEST['text'];
		$b_code = $_REQUEST['b_code'];
		$a_code = $_SESSION["a_code"];

		if ($a_code == "$b_code") { $err .= ""; } else { $err .= "<li>$lang[31]</li>"; }
		if ($senderid == "") { $err .= "<li>$lang[32]</li>"; } else { $err .= ""; }
		if ($to == "") { $err .= "<li>$lang[33]</li>"; } else { $err .= ""; }
		if ($text == "") { $err .= "<li>$lang[34]</li>"; } else { $err .= ""; }	

		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:";

		if ($err == "") {
		
			$query = "SELECT * FROM $set_table where id = '1'";
			$result = mysql_query($query);
			while($row = mysql_fetch_array( $result )) {		
		
				$newto = "$row[country]$to";
				$newtext = "$text /$row[mymess]";
				$created = date('Y-m-d H:i:s');

				mysql_query("INSERT INTO $txt_table (senderid, text, sent_date, receiver) VALUES (\"$senderid\", \"$newtext\", \"$created\", \"$newto\")");

				$url = "http://www.2-waysms.com/my/api/sms.php";

				$postfields = array ("from" => "$row[mynum]",
				"token" => "$row[token]",
				"text" => "$newtext",
				"to" => "$newto",
				"senderid" => "$senderid");

				if (!$curld = curl_init()) {
				echo "Could not initialize cURL session.";
				exit;
				}
				curl_setopt($curld, CURLOPT_POST, true);
				curl_setopt($curld, CURLOPT_POSTFIELDS, $postfields);
				curl_setopt($curld, CURLOPT_URL, $url);
				curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($curld);
				curl_close ($curld);

				$out = explode('|',$output);
			
			}

			echo "#CCFFCC;\"><b>$lang[46]</b><br>$lang[35] $to";
		} else {
			echo "#FFCCCC;\"><b>$lang[36]</b><ul>$err</ul>";
		}

		echo "</div>";	
		$_SESSION["a_code"] = "zero";
}

$x_code=rand(1000,9999);
$_SESSION["a_code"] = "$x_code";

echo "<form name=\"myform\" onsubmit=\"return formValidator()\" method=post action=\"$PHP_SELF\">"
."<input type=\"hidden\" name=\"option\" value=\"sendsms\">"
."<input type=\"hidden\" name=\"b_code\" value=\"$x_code\">"
."<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\">"
."<tr><td>$lang[37]</td><td><input type=\"text\" name=\"senderid\" id=\"senderid\" onkeyup=\"valid(this,'special')\" onblur=\"valid(this,'special')\"></td></tr>"
."<tr><td style=\"white-space: nowrap;\">$lang[38]&nbsp;<font size=1 >+$row[country]</font></td><td><span id=phno1></span><input type=\"text\" name=\"to\" id=\"to\" onKeyup=\"isNumeric()\"></td></tr>"
."<tr><td>$lang[39]</td><td><textarea name=text wrap=physical id=\"message\" rows=3 cols=15 onkeyup=limiter()></textarea></td></tr>"
."<tr><td>&nbsp;</td><td><font size=1 >$lang[40]\n<script type=\"text/javascript\">\ndocument.write(\"<input type=text name=limit size=4 readonly value=\"+count+\">\");\n</script>\n</font><td></tr>"
."<tr><td>&nbsp;</td><td><input id=\"increment\" type=submit name=submit value=\"$lang[41]\"><div class=\"spacer\"></div></td></tr>";
}
echo "</table>"
."</form>";


// END WIDGET CODE GOES HERE NO MORE!
echo $after_widget;
}

}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostWidget");') );


?>