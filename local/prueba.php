<?php
$dip = $_SERVER['REMOTE_ADDR'];
$json = file_get_contents("https://ipinfo.io/".$dip);
$details = json_decode($json,true);
if(array_key_exists("ip",$details)) $ip.=$details["ip"];  
if(array_key_exists("city",$details)) $city.=$details["city"];
if(array_key_exists("region",$details)) $region.=$details["region"];
if(array_key_exists("country",$details)) $country.=$details["country"];
if(array_key_exists("loc",$details)) $loc.=$details["loc"];
if(array_key_exists("org",$details)) $org.=$details["org"];
echo "Direcci&#243;n IP: " .$ip."<br>";
echo "Ciudad: " .$city."<br>";
echo "Regi&#243;n: " .$region."<br>";
echo "Pa&#237;s: " .$country."<br>";
echo "Localizaci&#243;n: ".$loc."<br>";
echo "Proveedor de internet: ".$org."<br>";
?>