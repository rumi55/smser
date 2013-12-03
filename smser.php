<?php
	/*
	Plugin Name: SMSer SMS Widget
	Plugin URI: http://www.2-waysms.com
	Description: SMSer - SMS sending Widget. You or Your users can send SMS from your Wordpress Web-site. You can use SMSer for SMS advertising, Facebook page promotion etc.
	Version: 2.6
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
$txt_table = "aa_text"; $rectxt_table = "aa_rectext";

$smser_location = ABSPATH . "/wp-content/plugins/smser";

$languages = array("en" => "English", "es" => "Spanish", "de" => "German", "it" => "Italian", "fr" => "French", "pt" => "Portuguese", "ru" => "Russian", "du" => "Dutch", "fi" => "Finnish", "ar" => "Arabic", "no" => "Norwegian", "se" => "Swedish", "dk" => "Danish", "he" => "Herbew", "tr" => "Turkish", "jp" => "Japanese");

$countries = array("93" => "Afghanistan", "355" => "Albania", "213" => "Algeria", "1684" => "American Samoa", "376" => "Andorra", "244" => "Angola", "1264" => "Anguilla", "1268" => "Antigua and Barbuda", "54" => "Argentine Republic", "374" => "Armenia", "297" => "Aruba", "61" => "Australia", "43" => "Austria", "994" => "Azerbaijani Republic", "1242" => "Bahamas", "973" => "Bahrain", "880" => "Bangladesh", "1246" => "Barbados", "375" => "Belarus", "32" => "Belgium", "501" => "Belize", "229" => "Benin", "1441" => "Bermuda", "975" => "Bhutan", "591" => "Bolivia", "387" => "Bosnia and Herzegovina", "267" => "Botswana", "55" => "Brazil", "1284" => "British Virgin Islands", "673" => "Brunei Darussalam", "359" => "Bulgaria", "226" => "Burkina Faso", "257" => "Burundi", "855" => "Cambodia", "237" => "Cameroon", "1" => "Canada", "238" => "Cape Verde", "1345" => "Cayman Islands", "236" => "Central African Republic", "235" => "Chad", "56" => "Chile", "86" => "China", "57" => "Colombia", "269" => "Comoros", "242" => "Congo", "682" => "Cook Islands", "506" => "Costa Rica", "225" => "Cote d'Ivoire", "385" => "Croatia", "53" => "Cuba", "357" => "Cyprus", "420" => "Czech Republic", "850" => "Democratic People's Republic of Korea", "243" => "Democratic Republic of the Congo", "45" => "Denmark", "253" => "Djibouti", "1767" => "Dominica", "1809" => "Dominican Republic", "593" => "Ecuador", "20" => "Egypt", "503" => "El Salvador", "240" => "Equatorial Guinea", "291" => "Eritrea", "372" => "Estonia", "251" => "Ethiopia", "500" => "Falkland Islands", "298" => "Faroe Islands", "679" => "Fiji", "358" => "Finland", "33" => "France", "262" => "French Departments and Territories in the Indian Ocean", "594" => "French Guiana", "689" => "French Polynesia", "241" => "Gabonese Republic", "220" => "Gambia", "995" => "Georgia", "49" => "Germany", "233" => "Ghana", "350" => "Gibraltar", "30" => "Greece", "299" => "Greenland (Denmark)", "1473" => "Grenada", "590" => "Guadeloupe", "502" => "Guatemala", "224" => "Guinea", "245" => "Guinea-Bissau", "592" => "Guyana", "509" => "Haiti", "504" => "Honduras", "852" => "Hong Kong, China", "36" => "Hungary", "354" => "Iceland", "91" => "India", "62" => "Indonesia", "98" => "Iran", "964" => "Iraq", "353" => "Ireland", "972" => "Israel", "39" => "Italy", "1876" => "Jamaica", "81" => "Japan", "962" => "Jordan", "77" => "Kazakhstan", "254" => "Kenya", "686" => "Kiribati", "82" => "Korea", "965" => "Kuwait", "996" => "Kyrgyz Republic", "856" => "Lao People's Democratic Republic", "371" => "Latvia", "961" => "Lebanon", "266" => "Lesotho", "231" => "Liberia", "218" => "Libya", "423" => "Liechtenstein", "370" => "Lithuania", "352" => "Luxembourg", "853" => "Macao, China", "389" => "Macedonia", "261" => "Madagascar", "265" => "Malawi", "60" => "Malaysia", "960" => "Maldives", "223" => "Mali", "356" => "Malta", "692" => "Marshall Islands", "596" => "Martinique", "222" => "Mauritania", "230" => "Mauritius", "52" => "Mexico", "691" => "Micronesia", "373" => "Moldova", "377" => "Monaco", "976" => "Mongolia", "382" => "Montenegro", "1664" => "Montserrat", "212" => "Morocco", "258" => "Mozambique", "95" => "Myanmar", "264" => "Namibia", "674" => "Nauru", "977" => "Nepal", "31" => "Netherlands", "599" => "Netherlands Antilles", "687" => "New Caledonia", "64" => "New Zealand", "505" => "Nicaragua", "227" => "Niger", "234" => "Nigeria", "47" => "Norway", "968" => "Oman", "92" => "Pakistan", "680" => "Palau", "507" => "Panama", "675" => "Papua New Guinea", "595" => "Paraguay", "51" => "Peru", "63" => "Philippines", "48" => "Poland", "351" => "Portugal", "1787" => "Puerto Rico", "974" => "Qatar", "40" => "Romania", "7" => "Russian Federation", "250" => "Rwanda", "1869" => "Saint Kitts and Nevis", "1758" => "Saint Lucia", "508" => "Saint Pierre and Miquelon", "1784" => "Saint Vincent and the Grenadines", "685" => "Samoa", "378" => "San Marino", "239" => "Sao Tome and Principe", "966" => "Saudi Arabia", "221" => "Senegal", "381" => "Serbia", "248" => "Seychelles", "232" => "Sierra Leone", "65" => "Singapore", "421" => "Slovak Republic", "386" => "Slovenia", "677" => "Solomon Islands", "252" => "Somali Democratic Republic", "27" => "South Africa", "34" => "Spain", "94" => "Sri Lanka", "249" => "Sudan", "597" => "Suriname", "268" => "Swaziland", "46" => "Sweden", "41" => "Switzerland", "963" => "Syrian Arab Republic", "886" => "Taiwan, China", "992" => "Tajikistan", "255" => "Tanzania", "66" => "Thailand", "670" => "Timor-Leste", "228" => "Togolese Republic", "676" => "Tonga", "1868" => "Trinidad and Tobago", "216" => "Tunisia", "90" => "Turkey", "993" => "Turkmenistan", "1649" => "Turks and Caicos Islands", "256" => "Uganda", "380" => "Ukraine", "971" => "United Arab Emirates", "44" => "United Kingdom", "1" => "United States of America", "1340" => "United States Virgin Islands", "598" => "Uruguay", "998" => "Uzbekistan", "678" => "Vanuatu", "58" => "Venezuela", "84" => "Viet Nam", "681" => "Wallis and Futuna", "967" => "Yemen", "260" => "Zambia", "263" => "Zimbabwe");
$advert = array("dis" => "Disable", "ba" => "Banner", "goad" => "Google Adsense");
$lims = array("diiss" => "Disable", "enab" => "Enable");$buls = array("sing" => "Single", "bu" => "Bulk");
$unsmser = array("diss" => "Disable", "pay" => "Paypal Donation", "bit" => "BitCoin Donation", "fa" => "Facebook", "insta" => "Instagram", "tw" => "Twitter", "yo" => "Youtube", "vk" => "VK.com");
add_action('admin_menu', 'settsmser');
$set_table_exists = mysql_query("DESCRIBE $set_table");if (!$set_table_exists) { 
mysql_query("CREATE TABLE IF NOT EXISTS `$set_table` (`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,`token` VARCHAR( 100 ) NOT NULL ,`goad` VARCHAR( 100 ) NULL ,`insta` VARCHAR( 100 ) NULL ,`mone` INT( 11 ) NOT NULL , `smsdlimt` INT( 11 ) NOT NULL ,`unsmser` VARCHAR( 100 ) NULL ,`lim_sets` VARCHAR( 100 ) NOT NULL ,`bul_sets` VARCHAR( 100 ) NOT NULL ,`yoacc` VARCHAR( 100 ) NULL ,`twacc` VARCHAR( 100 ) NULL ,`ppem` VARCHAR( 100 ) NULL ,`smscount` INT( 11 ) NOT NULL ,`mynum` VARCHAR( 100 ) NULL, `adv_sets` VARCHAR( 10 ) ,`country` VARCHAR( 100 ) NULL ,`fbacc` VARCHAR( 100 ) ,`bit_c` VARCHAR( 100 ) ,`bannpic` VARCHAR( 200 ) ,`bannlink` VARCHAR( 200 ) ,`lang_dict` VARCHAR( 10 ) ,`mymess` VARCHAR( 100 ) NULL ,PRIMARY KEY (  `id` ) ,UNIQUE KEY  `id` (  `id` )) ENGINE = MYISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT =1;");mysql_query("INSERT INTO $set_table (id, smscount, mymess, fbacc, lang_dict, adv_sets, unsmser, lim_sets, smsdlimt, bul_sets) VALUES (\"1\", \"160\", \"I like 2-waysms.com\", \"2waysmsgateway\", \"en\", \"dis\", \"diss\", \"diiss\", \"1\", \"sing\")");} else { $clmns = array("adv_sets" => "varchar( 10 ) NULL", "bannpic" => "varchar( 200 ) NULL", "bannlink" => "varchar( 200 ) NULL", "goad" => "varchar( 100 ) NULL", "insta" => "varchar( 100 ) NULL", "unsmser" => "varchar( 100 ) NULL", "mone" => "INT( 11 ) NOT NULL", "smsdlimt" => "INT( 11 ) NOT NULL", "yoacc" => "VARCHAR( 100 ) NULL", "twacc" => "VARCHAR( 100 ) NULL", "lim_sets" => "VARCHAR( 100 ) NOT NULL", "bul_sets" => "VARCHAR( 100 ) NOT NULL", "bit_c" => "VARCHAR( 100 ) NOT NULL", "ppem" => "VARCHAR( 100 ) NULL");	foreach ($clmns as $clmnsk => $clmnsv){		mysql_query("select $clmnsk from $set_table") or mysql_query("ALTER TABLE $set_table ADD $clmnsk $clmnsv ;");	}}$wdx = "select * from $set_table where id = '1'"; 
$wd_result = mysql_query($wdx);
while($wd = mysql_fetch_array( $wd_result )) {
	include("$smser_location/{$wd[lang_dict]}.php");
}
function settsmser() {
add_menu_page('SMSer', 'SMSer', '', 'smser_messenger', 'Outbox', "/wp-content/plugins/smser/picsmser.png", '99');
add_submenu_page('smser_messenger', 'Settings', 'Settings', '1', 'smser_settings','settsmsersettings');
add_submenu_page('smser_messenger', 'Outbox', 'Outbox', '1', 'smser_outbox','settsmseroutbox');
add_submenu_page('smser_messenger', 'Inbox', 'Inbox', '1', 'smser_inbox','settsmserinbox');
}    

function settsmsersettings() {
global $option, $set_table, $txt_table, $rectxt_table, $countries, $languages, $advert, $unsmser, $lims, $buls, $lang;

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
		$mymes = $_REQUEST["mes"];                $adv_sets = $_REQUEST["advsets"];
		$bannpic = $_REQUEST["bannpic"];
		$bannlink = $_REQUEST["bannlink"];        $goad = $_REQUEST["goad"];        $un_smser = $_REQUEST["un_smser"];        $ppem = $_REQUEST["ppem"];        $mone = $_REQUEST["mone"];        $twacc = $_REQUEST["twacc"];        $yoacc = $_REQUEST["yoacc"];        $insta = $_REQUEST["insta"];        $lim_sets = $_REQUEST["lim_sets"];         $bul_sets = $_REQUEST["bul_sets"];        $smsdlim = $_REQUEST["smsdlim"];        $bitc = $_REQUEST["bit_c"];
		$result = mysql_query("UPDATE $set_table SET lang_dict='$lang_dict', ppem='$ppem', lim_sets='$lim_sets', bit_c='$bitc', bul_sets='$bul_sets', insta='$insta', mone='$mone', twacc='$twacc', yoacc='$yoacc', adv_sets='$adv_sets', unsmser='$un_smser', fbacc='$fbupd', bannpic='$bannpic', goad='$goad', bannlink='$bannlink', mymess='$mymes', mynum='$mynum', smscount='$smscou', smsdlimt='$smsdlim', token='$token', country='$country' where id = '1'") or die(mysql_error());
		$_SESSION["a1_code"] = "zero";
		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:#CCFFCC;\">$lang[1]</div>";					
	} else { }		

}$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[token] == "") 
		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:#FFFF66;\"><center><h3> Order Number here: <a href=\"http://www.2-waysms.com\" target=\"_blank\" >2-waysms.com</a> when you order Number, you will get Token.</h3></center></div>";			
}
$x1_code=rand(1000,9999);
$_SESSION["a1_code"] = "$x1_code";

$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {

echo "<h1><br>$lang[2]</h1><br>"."<form method=post action=\"";
echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); 
echo "\">"

."<input type=\"hidden\" name=\"option\" value=\"save\">"
."<input type=\"hidden\" name=\"b1_code\" value=\"$x1_code\">"
."<h3>$lang[3]</h3><br>";$receiveurl = $_SERVER["SERVER_NAME"];echo "To activate SMSer Wiget - Go to  => <a href=\"http://{$receiveurl}/wp-admin/widgets.php\" target=\"_self\">Widgets</a> => drop /SMSer - SMS Sending Widget/ to wiget area.<br>";
echo "<br>2-Waysms.com $lang[4] ";$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[mynum] == "")  {
echo "<input style=\"border-color: red;\" placeholder=\"Enter Number\" type=\"text\" name=\"from\" id=\"from\" value=\"$row[mynum]\">"
."<blockquote><small>"
."<h4 style=\"color: red;\">$lang[5] <a href=\"http://www.2-waysms.com\" target=\"_blank\">2-WaySMS.com</a>.</h4>"
."</small></blockquote></p>";}else {
echo "<input type=\"text\"  name=\"from\" id=\"from\" value=\"$row[mynum]\">"
."<blockquote><small>"
."$lang[5] <a href=\"http://www.2-waysms.com\" target=\"_blank\">2-WaySMS.com</a>."
."</small></blockquote></p>";}}echo "<br>$lang[6] ";$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[token] == "")  {echo 
"<input type=\"text\" style=\"border-color: red;\" name=\"token\" placeholder=\"Enter Token\" id=\"token\" value=\"$row[token]\">";echo "<blockquote><small>"
."<h4 style=\"color: red;\">$lang[7] <a href=\"http://www.2-waysms.com/\" target=\"_blank\">2-WaySMS.com</a> $lang[8]</a></h4>"
."</small></blockquote></p>";}else { echo "<input type=\"text\" name=\"token\" id=\"token\" value=\"$row[token]\">";echo "<blockquote><small>"
."$lang[7] <a href=\"http://www.2-waysms.com/\" target=\"_blank\">2-WaySMS.com</a> $lang[8]</a>"
."</small></blockquote></p>"; }}$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {echo "<br>$lang[9]<br>"
."<select class=\"select\" name=\"country\"><option value=\"\">$lang[10]</option>";
foreach ($countries as $countriesk => $countriesv){
echo "<option value=\"$countriesk\"";
if ($row[country] == "$countriesk"){ echo " selected "; } else { }
echo ">$countriesv (+$countriesk)</option>";
}
echo "</select><br>"
."<br><h3>$lang[11]</h3><br>"
."<select class=\"select\" name=\"un_smser\">";
foreach ($unsmser as $unsmsersk => $unsmsersv){
echo "<option value=\"$unsmsersk\"";
if ($row[unsmser] == "$unsmsersk"){ echo " selected "; } else { }
echo ">$unsmsersv</ortion>";
}
echo "</select></p>"."PayPal Email for donations receiving: "
."<input type=\"text\" name=\"ppem\" id=\"ppem\" value=\"$row[ppem]\"><br>"
."Donations Amount: <input type=\"text\" name=\"mone\" id=\"mone\" value=\"$row[mone]\">$ USD.<br>"
."<blockquote><small>"
."Let’s say that you are an animal rescue organization needing to raise funds to provide care for animals. You can easily add a donate button to your website and make it safe and convenient for supporters to give to your cause.</a>"
."</small></blockquote></p>"
." BitCoin Address for donations receiving: <input type=\"text\" name=\"bit_c\" id=\"bit_c\" value=\"$row[bit_c]\"><br><br>"	."$lang[12]: "
." facebook.com/ <input type=\"text\" name=\"bfbacc\" id=\"bfbacc\" value=\"$row[fbacc]\"><br>"
."<blockquote><small>"
."$lang[13]</a>"
."</small></blockquote></p>"	."Your Twitter account: "
." twitter.com/ <input type=\"text\" name=\"twacc\" id=\"twacc\" value=\"$row[twacc]\"><br>"."Your Youtube account:"
." youtube.com/ <input type=\"text\" name=\"yoacc\" id=\"yoacc\" value=\"$row[yoacc]\"><br>"."Your Instagram account:"
." instagram.com/ <input type=\"text\" name=\"insta\" id=\"insta\" value=\"$row[insta]\"><br>"
."<br><h3>$lang[14]</h3><br>"
."Set limit to sending sms to one number: <select class=\"select\" name=\"lim_sets\">";
foreach ($lims as $limsk => $limsv){
echo "<option value=\"$limsk\"";
if ($row[lim_sets] == "$limsk"){ echo " selected "; } else { }
echo ">$limsv</ortion>";
}
echo "</select>" ."Limit for sms sending to one number if (Enable) : "
."<input type=\"text\" name=\"smsdlim\" size=4 id=\"smsdlim\" value=\"$row[smsdlimt]\"><br>"
."<blockquote><small>"
."You can set a maximum number of SMS messages, which can be sent to the same number. For reset, just Delete All numbers on Outbox page."
."</small></blockquote></p>"
."Bulk or Single Sms sending wiht SMSer: <select class=\"select\" name=\"bul_sets\">";
foreach ($buls as $bulsk => $bulsv){
echo "<option value=\"$bulsk\"";
if ($row[bul_sets] == "$bulsk"){ echo " selected "; } else { }
echo ">$bulsv</ortion>";
}
echo "</select>"."<blockquote><small>"
."Bulk or single sms sending from your site, if Bulk ( explode numbers with ; ) example 44444444;555555;666666"
."</small></blockquote></p>" ."$lang[15] "
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
."</small></blockquote></p>";    

echo "<br><h3>Advertising Settings</h3><br>"
."Advertising option: <select class=\"select\" name=\"advsets\">";
foreach ($advert as $advertsk => $advertsv){
echo "<option value=\"$advertsk\"";
if ($row[adv_sets] == "$advertsk"){ echo " selected "; } else { }
echo ">$advertsv</ortion>";
}
echo "</select></p>"
."Banner picture link: "
."<input type=\"text\" name=\"bannpic\" id=\"bannpic\" value=\"$row[bannpic]\"> <small>Banner size 300x250, Format / jpg,png,gid,flw/, link format: http://www.yoursite.com/picture.jpg</small><br>"
."Banner link: "
."<input type=\"text\" name=\"bannlink\" id=\"banlink\" value=\"$row[bannlink]\"> <small>link format: http://www.yoursite.com</small>"
."<blockquote><small>"
."Selected banner will be shown every time once message will be sent.</a>"
."</small></blockquote></p>"
."Google Adsense Client number: "
."<input type=\"text\" name=\"goad\" id=\"goad\" value=\"$row[goad]\"> <small>Example: 8611658640634958 , if you dont have Adsense code, you can get it here: www.google.com/adsense</small>"
."<small><blockquote></p>"
."You can earn money with Google Adsense, just select Google Adsense advertising and paste you /Google Adsense Client number/. Once Google Adsense will be activated it will automatically shows mobile version of Adsense for visitors with mobile devices (iphone, windows phone, blackberry, htc, samsung, etc.).</a>"
."</small></blockquote></p>";
echo "<br><input type=\"submit\" class=\"button button-primary\" name=\"submit\" value=\"$lang[20]\">"
."</form></center>";}
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
$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[token] == "") 
		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:#FFFF66;\"><center><h3> Order Number here: <a href=\"http://www.2-waysms.com\" target=\"_blank\" >2-waysms.com</a> when you order Number, you will get Token.</h3></center></div>";			
}
$x2_code=rand(1000,9999);
$_SESSION["a2_code"] = "$x2_code";
$result = mysql_query("SELECT  COUNT(id) FROM aa_text");$term = mysql_fetch_array($result);$ter=$term[0];		
$result = mysql_query("SELECT * FROM $txt_table ORDER BY id DESC LIMIT 20");

$nrofmessages = mysql_num_rows($result);  
if ($nrofmessages > 0){

echo "<h1>$lang[21] / $ter messages</h1>";

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
}function settsmserinbox() {
global $option, $set_table, $rectxt_table, $txt_table, $lang, $smser_location;$rectxt_table_exists = mysql_query("DESCRIBE $rectxt_table");
if (!$rectxt_table_exists) { 
	mysql_query("CREATE TABLE IF NOT EXISTS `$rectxt_table` (`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,`date` DATETIME NOT NULL ,`text` VARCHAR( 55 ) NULL ,`numberin` VARCHAR( 55 ) NULL ,PRIMARY KEY (  `id` ) ,UNIQUE KEY  `id` (  `id` )) ENGINE = MYISAM DEFAULT CHARSET = utf8 AUTO_INCREMENT =1;");
}
else { }
$result = mysql_query("SELECT  COUNT(id) FROM aa_rectext");$teerm = mysql_fetch_array($result);$teer=$teerm[0];	$query = "SELECT * FROM $set_table";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[token] == "") 
		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:#FFFF66;\"><center><h3> Order Number here: <a href=\"http://www.2-waysms.com\" target=\"_blank\" >2-waysms.com</a> when you order Number, you will get Token.</h3></center></div>";			
}
$query = "SELECT * FROM aa_set where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {
echo "<h1>SMSer Inbox / $teer Messages -  Your SMS number: $row[mynum]</h1>";$ch_code=rand(1000,9999);$_SESSION["ca_code"] = "$ch_code";if ($row[mynum] == "") {$receiveurl = $_SERVER["SERVER_NAME"];$currentsessid = session_id();echo "<br><h3>To receive SMS, order SMS number Here: <a href=\"http://www.2-waysms.com/\" target=\"_blank\">2-WaySMS.com</a><p> Copy this link:</h3>  http://{$receiveurl}/wp-content/plugins/smser/receive.php <p><h3>Insert this link to SMS number settings here: <a href=\"http://www.2-waysms.com/my\" target=\"_blank\">My 2-Waysms</a>.</h3><br>";}}echo  "<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-latest.js\"></script>\n" ."<script type=\"text/javascript\">\n"."$(function() {\n"     ."getStatus();\n" ."});\n"."function getStatus() {\n"     ."$('div#status').load('/wp-content/plugins/smser/channel.php?PHPSESSID=$currentsessid&cb_code=$ch_code');\n"    ."setTimeout(\"getStatus()\",3000);\n"."}\n"."</script>\n" ."<div id=\"status\"></div>\n";}

// WIGET
class RandomPostWidget extends WP_Widget
{
function RandomPostWidget()
{
$widget_ops = array('classname' => 'SMSer', 'description' => 'Displays a SMSer Widget' );
$this->WP_Widget('SMSer', 'SMSer - SMS sending', $widget_ops);
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

// WIDGET CODE GOES HEREfunction mobile_detect(){    $user_agent = $_SERVER['HTTP_USER_AGENT'];    $ipod = strpos($user_agent,"iPod");    $iphone = strpos($user_agent,"iPhone");    $android = strpos($user_agent,"Android");    $symb = strpos($user_agent,"Symbian");    $winphone = strpos($user_agent,"WindowsPhone");    $wp7 = strpos($user_agent,"WP7");    $wp8 = strpos($user_agent,"WP8");    $operam = strpos($user_agent,"Opera M");    $palm = strpos($user_agent,"webOS");    $berry = strpos($user_agent,"BlackBerry");    $mobile = strpos($user_agent,"Mobile");    $htc = strpos($user_agent,"HTC_");    $fennec = strpos($user_agent,"Fennec/");    if ($ipod || $iphone || $android || $symb || $winphone || $wp7 || $wp8 || $operam || $palm || $berry || $mobile || $htc || $fennec)     {        return true;     }     else    {        return false;     }}if  (mobile_detect()){
$query = "SELECT * FROM $set_table where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[adv_sets] == "goad") {    echo "<script type=\"text/javascript\">\n"."google_ad_client = \"pub-$row[goad]\";\n"."google_ad_width = 234;\n"."google_ad_height = 60;"."google_ad_format = \"234x60_as\";\n"."google_ad_type = \"text_image\";\n"."google_color_border = \"FFFFFF\";\n"."google_color_bg = \"C3D9FF\";\n"."google_color_link = \"FFFFFF\";\n"."google_color_text = \"000000\";\n"."google_color_url = \"008000\";\n"."</script>\n";echo "<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>\n<br><br>";}}}
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
while($row = mysql_fetch_array( $result )) {if ($row[unsmser] == "fa") {echo "<div id=\"fb-root\"></div>\n"
."<script>(function(d, s, id) {\n"
."var js, fjs = d.getElementsByTagName(s)[0];\n"
."if (d.getElementById(id)) return;\n"
."js = d.createElement(s); js.id = id;\n"
."js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=576381155747707\";\n"
."fjs.parentNode.insertBefore(js, fjs);\n"
."}(document, 'script', 'facebook-jssdk'));</script>\n"
."<div class=fb-like-box data-href=https://www.facebook.com/$row[fbacc] data-width=292 data-show-faces=false data-stream=false data-show-border=false data-header=false></div>";} elseif ($row[unsmser] == "pay") {echo "<center><form action=\"https://www.paypal.com/cgi-bin/webscr\" method=\"post\" target=\"_top\">"."<input type=\"hidden\" name=\"cmd\" value=\"_donations\">"."<input type=\"hidden\" name=\"business\" value=\"$row[ppem]\">"."<input type=\"hidden\" name=\"lc\" value=\"US\">"."<input type=\"hidden\" name=\"item_name\" value=\"SMSer Donations\">"."<input type=\"hidden\" name=\"amount\" value=\"$row[mone]\">"."<input type=\"hidden\" name=\"currency_code\" value=\"USD\">"."<input type=\"hidden\" name=\"no_note\" value=\"0\">"."<input type=\"hidden\" name=\"bn\" value=\"PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest\">"."<input type=\"image\" src=\"https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif\" border=\"0\" name=\"submit\" alt=\"PayPal - The safer, easier way to pay online!\">"."<img alt=\"\" border=\"0\" src=\"https://www.paypalobjects.com/en_US/i/scr/pixel.gif\" width=\"1\" height=\"1\">"."</form></center><br>";} elseif ($row[unsmser] == "tw") {echo "<center><a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-via=\"$row[twacc]\" data-size=\"large\">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></center><br>\n";} elseif ($row[unsmser] == "bit") {echo "<center><a onclick=\"myFunction()\"><img src=\"https://sourceforge.net/p/sms-messenger/screenshot/bitcoindonate.png\" width=\"176\" height=\"72\" alt=\"Read book\"></a></center>\n"."<p id=\"demo\"></p>\n"."<script>\n"."function myFunction()\n"."{\n"."var x;\n"."var person=prompt(\"To donate, please copy-paste my BitCoin address to your BitCoin software.\",\"$row[bit_c]\");\n"."if (person!=null)\n"  ."{\n"  ."x=\"Thank you for donation!\";\n"  ."document.getElementById(\"demo\").innerHTML=x;\n"  ."}\n"."}\n"."</script>\n";}elseif ($row[unsmser] == "yo") {echo "<script src=\"https://apis.google.com/js/plusone.js\"></script>"."<div class=\"g-ytsubscribe\" data-channel=\"$row[yoacc]\" data-layout=\"full\"></div><br>";}elseif ($row[unsmser] == "vk") {echo "<center><script type=\"text/javascript\" src=\"http://vkontakte.ru/js/api/share.js?9\" charset=\"windows-1251\"></script>"."<script type=\"text/javascript\">"."document.write(VK.Share.button());"."</script><center><br>";}elseif ($row[unsmser] == "insta") {echo "<center><style>.ig-b- { display: inline-block; }".".ig-b- img { visibility: hidden; }".".ig-b-:hover { background-position: 0 -60px; } .ig-b-:active { background-position: 0 -120px; }".".ig-b-v-24 { width: 137px; height: 24px; background: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24.png) no-repeat 0 0; }"."@media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2 / 1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {".".ig-b-v-24 { background-image: url(//badges.instagram.com/static/images/ig-badge-view-sprite-24@2x.png); background-size: 160px 178px; } }</style>"."<a href=\"http://instagram.com/$row[insta]\" class=\"ig-b- ig-b-v-24\"><img src=\"//badges.instagram.com/static/images/ig-badge-view-24.png\" alt=\"Instagram\" /></a></center><br>";}elseif ($row[unsmser] == "diss") {}echo "$lang[30]";
if ($option == "sendsms"){

		$senderid = $_REQUEST['senderid'];
		$to = $_REQUEST['to'];
		$text = $_REQUEST['text'];
		$b_code = $_REQUEST['b_code'];
		$a_code = $_SESSION["a_code"];

		if ($a_code == "$b_code") { $err .= ""; } else { $err .= "<li><small>$lang[31]</small></li>"; }
		if ($senderid == "") { $err .= "<li><small>$lang[32]</small></li>"; } else { $err .= ""; }
		if ($to == "") { $err .= "<li><small>$lang[33]</small></li>"; } else { $err .= ""; }
		if ($text == "") { $err .= "<li><small>$lang[34]</small></li>"; } else { $err .= ""; }	if ($row[lim_sets] == "enab") {$get = mysql_query("SELECT * FROM $txt_table WHERE receiver = '$to'");$getnr = mysql_num_rows($get); if ($getnr >= $row[smsdlimt]) { $err .= "<li><small>You have already Send SMS today. Get back Tomorrow!</small></li>"; } else { $err .= ""; }}

		echo "<div style=\"width: 100%; padding:5px; margin-top:10px; margin-bottom:5px; background-color:";

		if ($err == "") {
		$query = "SELECT * FROM $set_table where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[bul_sets] == "bu") {
				$newtoo = "$to";
				$newtext = "$text /$row[mymess]";
				$created = date('Y-m-d H:i:s');

				mysql_query("INSERT INTO $txt_table (senderid, text, sent_date, receiver) VALUES (\"$senderid\", \"$newtext\", \"$created\", \"$newtoo\")"); $to_arr = explode(";", $newtoo);foreach ($to_arr as $to_x){					$url = "http://www.2-waysms.com/my/api/sms.php";					$postfields = array ( "from" => "$row[mynum]", // Change ********, and put you'r SMS Number in www.2-waysms.com account			"token" => "$row[token]", // Change ********, and put you'r token code in www.2-waysms.com account			"text" => "$newtext", // do not need to change			"to" => "$to_x", // do not need to change			"senderid" => "$senderid"); // do not need to change			if (!$curld = curl_init()) {			echo "Could not initialize cURL session.";			exit;			}			curl_setopt($curld, CURLOPT_POST, true);			curl_setopt($curld, CURLOPT_POSTFIELDS, $postfields);			curl_setopt($curld, CURLOPT_URL, $url);			curl_setopt($curld, CURLOPT_RETURNTRANSFER, true);			$output = curl_exec($curld);			curl_close ($curld);		}}
if ($row[bul_sets] == "sing") {
				$newto = "$row[country]$to";
				$newtext = "$text /$row[mymess]";
				$created = date('Y-m-d H:i:s');

				mysql_query("INSERT INTO $txt_table (senderid, text, sent_date, receiver) VALUES (\"$senderid\", \"$newtext\", \"$created\", \"$newto\")");	     $url = "http://www.2-waysms.com/my/api/sms.php";
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
			
			}}

			echo "#CCFFCC;\"><small><b>$lang[46]</b><br>$lang[35] $to</small>";
		} else {
			echo "#FFCCCC;\"><small><b>$lang[36]</b><ul>$err</ul></small>";
		}

		echo "</div>";	
		$_SESSION["a_code"] = "zero";
}

$x_code=rand(1000,9999);
$ncode = $_SESSION["a_code"];
$_SESSION["a_code"] = "$x_code";

echo "<div style=\"position: relative;\">";

if ($ncode == "zero"){

echo "<style type=\"text/css\">\n"
        .".advt {\n"
                ."width:300px;\n"
                ."height:250px;\n"
                ."color:black;\n"
                ."font-weight:bold;\n"
                ."font-size:20px;\n"
                ."position:absolute;\n"
                ."bottom: 0px;\n"
             	."left: 0px;\n"
                ."margin-left:-20px;\n"
       ." }\n"
."</style>\n";
echo "<script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-1.8.3.min.js\"></script>\n"
."<script type=\"text/javascript\">\n"
."$(document).ready(function() {\n"
."$(\"#advt\").click(function() {\n"
."});\n"
."$(\"#closeadvt\").click(function(event) {\n"
."event.stopPropagation();\n"
."$(\"#advt\").fadeOut();\n"
."})\n"
."});\n"
."</script>\n";
$query = "SELECT * FROM $set_table where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[adv_sets] == "ba") {
echo "<div align=\"right\" id=\"advt\" class=\"advt\"><span id=\"closeadvt\" style=\"cursor:pointer;\">close</span>\n"
."<a href=\"$row[bannlink]/\"><img src=\"$row[bannpic]\" /></a>\n";} elseif ($row[adv_sets] == "goad") {echo "<script type=\"text/javascript\">\n"."google_ad_client = \"pub-$row[goad]\";\n"."google_ad_width = 300;\n"."google_ad_height = 250;"."google_ad_format = \"300x250_as\";\n"."google_ad_type = \"text_image\";\n"."google_color_border = \"FFFFFF\";\n"."google_color_bg = \"C3D9FF\";\n"."google_color_link = \"FFFFFF\";\n"."google_color_text = \"000000\";\n"."google_color_url = \"008000\";\n"."</script>\n";echo "<div align=\"right\" id=\"advt\" class=\"advt\"><span id=\"closeadvt\" style=\"cursor:pointer;\">close</span>\n<br>";echo "<script type=\"text/javascript\" src=\"http://pagead2.googlesyndication.com/pagead/show_ads.js\"></script>\n";} else {}}
echo "</div>\n";
}
echo "<form name=\"myform\" onsubmit=\"return formValidator()\" method=post action=\"$PHP_SELF\">"
."<input type=\"hidden\" name=\"option\" value=\"sendsms\">"
."<input type=\"hidden\" name=\"b_code\" value=\"$x_code\">"
."<table border=\"0\" cellpadding=\"5\" cellspacing=\"0\">"
."<tr><td>$lang[37]</td><td><input type=\"text\" name=\"senderid\" id=\"senderid\" onkeyup=\"valid(this,'special')\" onblur=\"valid(this,'special')\"></td></tr>";$query = "SELECT * FROM $set_table where id = '1'";
$result = mysql_query($query);
while($row = mysql_fetch_array( $result )) {if ($row[bul_sets] == "bu") { echo "<tr><td style=\"white-space: nowrap;\">Numbers&nbsp;<br><font size=1 >(explode ;)</font></br></td><td><span id=phno1></span><textarea rows=2 cols=15 name=\"to\" id=\"to\"></textarea></td></tr>"; }if ($row[bul_sets] == "sing") {
echo "<tr><td style=\"white-space: nowrap;\">$lang[38]&nbsp;<font size=1 >+$row[country]</font></td><td><span id=phno1></span><input type=\"text\" name=\"to\" id=\"to\" onKeyup=\"isNumeric()\"></td></tr>";}}
echo "<tr><td>$lang[39]</td><td><textarea name=text wrap=physical id=\"message\" rows=3 cols=15 onkeyup=limiter()></textarea></td></tr>"
."<tr><td>&nbsp;</td><td><font size=1 >$lang[40]\n<script type=\"text/javascript\">\ndocument.write(\"<input type=text name=limit size=4 readonly value=\"+count+\">\");\n</script>\n</font><td></tr>"
."<tr><td>&nbsp;</td><td><input id=\"increment\" type=submit name=submit value=\"$lang[41]\"><div class=\"spacer\"></div></td></tr>"
."</table>"
."</form>";

}
echo "</div>";

// END WIDGET CODE GOES HERE NO MORE!
echo $after_widget;
}

}
add_action( 'widgets_init', create_function('', 'return register_widget("RandomPostWidget");') );


?>