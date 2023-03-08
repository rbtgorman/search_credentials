<?php
include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Rutgers Credentials </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<body>

<div class="container my-5 text-white">
    <form method="post">
        <input type="text" placeholder="First Name - Last Name">
        <button class="btn btn-dark btn-sm" name="submit">Search</button>
    </form> 
    <!-- <div class="container my-5">
        <table class="table"> -->

<?php
if(isset($_POST['submit'])){
    $search=$_POST['search'];

    $sql="SELECT * FROM rutgers_credentials WHERE id='$search'";
    $result=mysqli_query($conn,$sql);
    if($result){
    if(mysqli_num_rows(($result))>0){
        echo '<thead>
        <tr>
        <th>id #</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Netid</th>
        <th>Email</th>
        </tr>
        </thead>
        ';
        $row=mysql_fetch_assoc($result);
        echo '<tbody>
        <tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['fname'].'</td>
        <td>'.$row['lname'].'</td>
        <td>'.$row['netid'].'</td>
        <td>'.$row['email'].'</td>
        </tr>
        </tbody>';
    
    }
    }   

}
?>   


        </table>

    </div>  
</div>
    
</body>
</html>