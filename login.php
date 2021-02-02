<?php

include 'connect.php';
session_start();

if(isset($_POST["EmailAdd"], $_POST["Password"])) 
    {     

        $EmailID=$_POST['EmailAdd']; 
        $pass= md5($_POST["Password"]); 

        $query2 = "SELECT ID, USERNAME, PASSWORD FROM authentication WHERE USERNAME = '".$EmailID."' AND  password = '".$pass."'";
        $result2=mysqli_query($con,$query2);
        if(mysqli_num_rows($result2) > 0 )
        { 
            $row = mysqli_fetch_array($result2);
            $_SESSION["ID"] = $row["ID"];
            $_SESSION["Email"] = $row["USERNAME"];
            echo "<script>location.href='options.php'</script>";

        }
        else
        {
            echo '<script>alert("The username or password are incorrect!")</script>';
            echo "<script>location.href='logout.php'</script>";

        }
} 
?>