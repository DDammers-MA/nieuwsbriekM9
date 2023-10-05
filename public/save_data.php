<?php

include_once("./connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $nieuwsbrief = mysqli_real_escape_string($conn, $_POST['nieuwsbrief']);

    if (empty($fname) || empty($lname) || empty($email) || empty($nieuwsbrief)) {
        echo "Please fill in all fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {

        $query = "SELECT * FROM newsletter_subscribers WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "Email already subscribed.";
        } else {
          
            $sql = "INSERT INTO newsletter_subscribers (first_name, last_name, email, nieuwsbrief) 
                    VALUES ('$fname', '$lname', '$email', '$nieuwsbrief')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Thank you for subscribing!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
