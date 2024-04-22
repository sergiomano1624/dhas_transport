<?php

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $pickup_location = $_POST['pickup_location'];
    $drop_location = $_POST['drop_location'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];
    $property_size = $_POST['property_size'];

    // Compose email message
    $to = "dhastransport@gmail.com";
    $subject = "New Transport Request";
    $message = "Name: $name\n";
    $message .= "Pickup Location: $pickup_location\n";
    $message .= "Drop Location: $drop_location\n";
    $message .= "Contact No: $contact_no\n";
    $message .= "Email: $email\n";
    $message .= "Property Size: $property_size\n";

    // Send email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email. Please try again later.";
    }
} else {
    // If not submitted via POST method, redirect to the form page
    header("Location: index.html");
    exit;
}
?>
