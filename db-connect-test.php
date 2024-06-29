<?php
# Fill our vars and run on cli
# $ php -f db-connect-test.php

$envVarMARIADB_HOST = getenv('MARIADB_HOST');
$envVarMARIADB_PASSWORD = getenv('MARIADB_PASSWORD');
$envVarMARIADB_USER = getenv('MARIADB_USER');
$envVarMARIADB_DB = getenv('MARIADB_DB');


   echo $envVarMARIADB_HOST;
   echo $envVarMARIADB_PASSWORD;
   echo $envVarMARIADB_USER;
   echo $envVarMARIADB_DB;


$dbname = $envVarMARIADB_DB;
$dbuser = $envVarMARIADB_USER;
$dbpass = $envVarMARIADB_PASSWORD;
$dbhost = $envVarMARIADB_HOST;


$connect = mysqli_connect($dbhost, $dbuser, $dbpass) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");

$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($connect, $test_query);

$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}
 
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}
 
