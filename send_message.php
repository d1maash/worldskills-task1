<?php
include('includes/functions.php');
include('includes/db.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $room_id = 1; // Replace with the actual room ID
    $message = $_POST['message'];

    saveChatMessage($user_id, $room_id, $message);
    echo getChatMessages($room_id); // Return updated chat messages
}
?>
