<?php

// Check if the form was submitted
if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    // Retrieve username and password
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Database connection
    $host = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'auth';

    // Create a new MySQLi connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    // Check if the connection was successful
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

    // SQL query to check for the username and password
    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";

    // Execute the query
    $result = $conn->query($query);

    // Check if there is a match in the db
    if($result->num_rows == 1){

        // Redirect to success page if login is successful
        header("Location: success.html");
        exit();
    }
    else{
        // Redirect to error page if login fails
        header("Location: error.html");
        exit();
    }
    
    // Close the database connection
    $conn->close();
}

?>