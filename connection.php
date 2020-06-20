<?php

$user = "a3001736_user";
$pw = "Toiohomai1234";
$db = "a3001736_scp";

// Create connection to database
$connection = new mysqli('localhost', $user, $pw, $db) or die(mysqli_error($connection));


// select all records from table and save as $result which we can use within our index page
$result = $connection->query("select * from scp") or die($connection->error());

if(isset($_POST['submit']))
{
   $pg = $_POST['pg'];
   
   $h1 = $_POST['h1'];
   $h2 = $_POST['h2'];
   $h3 = $_POST['h3'];
   
   $p1 = $_POST['p1'];
   $p2 = $_POST['p2'];
   $p3 = $_POST['p3'];
   
   $img1 = $_POST['pg'];
   $img2 = $_POST['pg'];
   $img3 = $_POST['pg'];
   
     // Create an insert command
        $sql = "insert into scp(pg, h1, h2, h3, p1, p2, p3, img1, img2, img3)
        values('$pg', '$h1', '$h2', '$h3', '$p1', '$p2', '$p3', '$img1', '$img2', '$img3')";

        // display success or error message on screen
        if($connection->query($sql) === TRUE)
        {
            echo "
                <h1>Record added successfully</h1>
                <p><a href='../index.php'>Back to index page</p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error()}</p>
                <p><a href='../index.php'>Back to index page</p>
            ";
        }
   
}



?>