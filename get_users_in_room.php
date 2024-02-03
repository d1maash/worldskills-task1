<?php
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['room_id'])) {
    $room_id = $_GET['room_id'];
    $users = getUsersInRoom($room_id); // Implement this function to retrieve users in the room

    header('Content-Type: application/json');
    echo json_encode($users);
}
?>
