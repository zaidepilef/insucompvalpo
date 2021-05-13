<?php
require 'class-Clockwork.php';

try
{
    // Create a Clockwork object using your API key
    $clockwork = new Clockwork( "8e672d7aeb755432966cd03d739bd3786cc8c2c4" );
    //$clockwork = new Clockwork( "8e672d7aeb755432966cd03d739bd3786cc8c2c4" );

    // Setup and send a message
    $message = array( 'to' => '56956372606', 'message' => 'This is a test!' );
    $result = $clockwork->send( $message );

    // Check if the send was successful
    if($result['success']) {
        echo 'Message sent - ID: ' . $result['id'];
    } else {
        echo 'Message failed - Error: ' . $result['error_message'];
    }
}
catch (ClockworkException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}
?>