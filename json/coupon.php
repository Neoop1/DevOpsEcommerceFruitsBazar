<?php 

$envVarMARIADB_HOST = getenv('MARIADB_HOST');
$envVarMARIADB_PASSWORD = getenv('MARIADB_PASSWORD');
$envVarMARIADB_USER = getenv('MARIADB_USER');
$envVarMARIADB_DB = getenv('MARIADB_DB');

$dbhost = $envVarMARIADB_HOST;
$dbuser = $envVarMARIADB_USER;
$dbpass = $envVarMARIADB_PASSWORD;
$dbname = $envVarMARIADB_DB;

 $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

 if(isset($_POST['action'])){
    if($_POST['action']=='load_discount'){
        $coupon_code = $_POST['cupon'];
        $price = $_POST['price'];
        $query = "SELECT * FROM `cupon` WHERE `cupon_code`='$coupon_code' AND `status`=1";

        if(mysqli_query($connection, $query)){
            $result = mysqli_query($connection, $query);

            $discount = 0;
            foreach($result as $res){
                $discount = $res['discount'];
            }
            
            $dis = ($price * $discount/100);
            echo $dis;
        }else{
            echo 0;
        }

    }
 }




?>