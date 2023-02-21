<?php 
   $host = 'localhost';
   $user = 'root';
   $pw = 'coding101';
   $db = 'rutgers_info';

try {

   $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pw);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Success - Connected to Database: ".$db;

} catch (PDOException $e){

    echo "Failure to connect to database", $e->getMessage();

}

?>