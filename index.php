
<?php
    require "conn.php";

    error_reporting(E_ALL ^ E_WARNING); 


if($_POST['submit']){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $query = $pdo->prepare('SELECT * FROM rutgers_credentials WHERE fname=:fname AND lname=:lname ORDER BY fname');
        $query->bindValue(':fname', $fname, PDO::PARAM_STR) and $query->bindValue(':lname', $lname, PDO::PARAM_STR);       
        $query->execute();
        $results = $query->fetchAll();
        $rows = $query->rowCount();

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rutgers Credential Search</title>
    <link rel =stylesheet  type="text/css" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cerulean/bootstrap.min.css">
</head>
<style>
</style>
<body>
       <div class= "container p-5 my-5 bg-danger" >
            <h1 class="text-dark">SEARCH FOR YOUR RUTGERS CREDENTIALS HERE!</h1>
        </div>

        <div class="container pt-5">
                <form action="index.php" method="post" >
                    <input type="text" placeholder="First Name" name="fname">
                    <input type="text" placeholder="Last Name" name ="lname">
                    <button class="btn btn-danger btn-sm" name="submit" type="submit" value="Submit">Search</button>
                </form>
               
        </div>
  
        <div class="container my-5">
            <?php
            if($rows != 0){
                foreach($results as $r){
                    
                    echo '<h4 class="text-dark">'.$r['fname']. ' ' .$r['lname'].'</h4><br>';
                    echo '<h4 class="text-dark">'.$r['netid'].'</h4><br>';
                    echo '<h4 class="text-dark">'.$r['ruid'].'</h4><br>';
                    
                }
           } else {
            echo '<h4 class="text-danger"> No result was found for your search!</h4>';
           }

            ?>
        </div>




</body>
</html>
