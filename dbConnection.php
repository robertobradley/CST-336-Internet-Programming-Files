<?php
function getDatabaseConnection($dbName) {

$host = "localhost";
$dbname = $dbName;
$username = "root";
$password = "";

//checks whether the URL contains "herokuapp" (using Heroku)
if(strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
   $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
   $host = $url["host"];
   $dbname = substr($url["path"], 1);
   $username = $url["beeae2a6f56b03"];
   $password = $url["fec867f0"];
}

$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

return $dbConn;

}
 

?>