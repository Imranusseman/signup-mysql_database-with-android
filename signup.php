<?php

//header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mysql";


//Connect to MySQL
$mysql = mysqli_connect($servername, $username, $password, $dbname);

if ($mysql->connect_error) {
  echo "Connection failed: " . $mysql->connect_error;
/*---------------------------------------------------*/
} else {
  echo "";
/*---------------------------------------------------*/
}


//info user & project
$uid= $_POST["uid"];
//for next banned users
$user= $_POST["user"];
$user2= $_POST["user2"];
//
$email = $_POST["email"];
$pass = $_POST["pass"];




//generate new table if doesnt exist
$table = "CREATE TABLE IF NOT EXISTS datausers(
profile INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
uid text NOT NULL,
user text NOT NULL,
user2 text NOT NULL,
email text NOT NULL,
pass text NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$mysql->query($table);

 $data = mysqli_query($mysql, "SELECT * FROM datausers WHERE email='$email'");
if($data->num_rows > 0) {
$result = mysqli_fetch_array($data);
// row more than zero ==> exists	
  

    echo "Dear User: This e-mail exists on server <br>";

    
   
      /*
         
  
$sql="UPDATE `datausers` SET `email`='$email', `pass`='$pass' WHERE email='$idlink'";

              
                  
                      if ($mysql->query($sql) === True) {
    echo "UPDATED success <br>";
$data = array(""=>"", ""=>"");
	header('Content-type: application/json');
	echo json_encode($data);
    
} else {
    echo "Error: " . $sql . "<br>" . $mysql->error;
	$data = array("status"=>"ERROR", "pesan"=>mysqli_error($mysql));
	header('Content-type: application/json');
	echo json_encode($data);
	}
               
   */                  

}else{

    
    
  //  echo "The file <br> has been uploaded";

    //This will add the filename into the DB
//     $sql = "INSERT INTO cat (id, title, id_link, email, a1, a2, a3 ,a4, a5 ,a6, a7, a8, a9, a90, a91, a92, a93, a94, a95, a96, a97, a98, a99, a990, a991, a992, a993, a994, a995, a996, a997, a998) VALUES ('id', '$title', '$idlink', '$email', '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$a90', '$a91', '$a92', '$a93', '$a94', '$a95', '$a96', '$a97', '$a98', '$a99', '$a990', '$a991', '$a992', '$a993', '$a994', '$a995', '$a996', '$a997', '$a998')";

$sql = "INSERT INTO datausers ( uid, user, user2, email, pass) VALUES ('$uid', '$user', '$user2', '$email', '$pass')";


                  
                      if ($mysql->query($sql) === True) {
$data = array("status"=>"account created sucessfull");
	header('Content-type: application/json');
	echo json_encode($data);
    
/*---------------------------------------------------*/} else {
    echo "Dear User: Failed " . $sql . "<br>" . $mysql->error;
	}
               
               
               
               
               
               
               

}


?>