<?php
    if(isset($_POST['submit']))
    {
        $date = $_POST['date'];
        $artwork = $_POST['artwork'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
    }

    // database details
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_ArtworkBooking";
    $artworkID = "";

    // creating a connection
    $con = mysqli_connect($host, $username, $password, $dbname);

    // to ensure that the connection is made
    if (!$con)
    {
        die("Connection failed!" . mysqli_connect_error());
    }

    // using sql to create a data entry query
    $sql = "INSERT INTO tb_Viewing (ViewingDate, AccountFirstName, AccountLastName, ArtworkID) VALUES ('$date', '$fname', '$lname', '$artwork')";
  
    // send query to the database to add values and confirm if successful
    $rs = mysqli_query($con, $sql);
    if($rs) {
      header('Location: index2.html');
      exit;
    } else {
      echo "Error! Please try again";
    }
  
    // close connection
    mysqli_close($con);
?>