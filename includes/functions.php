<?php
include('db.php');
function getUsername($user_id)
{
    global $conn;
    $sql = "SELECT username FROM users WHERE id = $user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['username'];
}

function getAvatar($user_id)
{
    global $conn;
    $sql = "SELECT avatar FROM users WHERE id = $user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    return $row['avatar'];
}

function createUser($username, $avatar)
{
    global $conn;
    $sql = "INSERT INTO users (username, avatar) VALUES ('$username', '$avatar')";
    if ($conn->query($sql) === TRUE) {
        return $conn->insert_id;
    } else {
        return false;
    }
}


function getChatMessages($room_id)
{
    global $conn;
    $sql = "SELECT * FROM messages WHERE room_id = $room_id ORDER BY created_at";
    $result = $conn->query($sql);
    $messages = [];

    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    return $messages;
}

function saveChatMessage($user_id, $room_id, $content)
{
    global $conn;
    $content = $conn->real_escape_string($content);
    $sql = "INSERT INTO messages (user_id, room_id, content) VALUES ($user_id, $room_id, '$content')";
    $conn->query($sql);
}

// includes/functions.php

function getUsersInRoom($room_id) {
    global $conn;

    $room_id = mysqli_real_escape_string($conn, $room_id);

    $sql = "SELECT * FROM users WHERE current_room = '$room_id'";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($conn));
    }

    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Calculate the online duration for each user
        $row['online_duration'] = calculateOnlineDuration($row['last_login']);
        $users[] = $row;
    }

    return $users;
}

function getAllRooms() {
    global $conn;

    $sql = "SELECT * FROM rooms";
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if (!$result) {
        die('Error in SQL query: ' . mysqli_error($conn));
    }

    $rooms = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rooms[] = $row;
    }

    return $rooms;
}

function addRoom($name, $capacity) {
    global $conn;

    $name = mysqli_real_escape_string($conn, $name);
    $capacity = mysqli_real_escape_string($conn, $capacity);

    $sql = "INSERT INTO rooms (name, capacity) VALUES ('$name', '$capacity')";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        die('Error in SQL query: ' . mysqli_error($conn));
    }
}

function calculateOnlineDuration($lastLoginTimestamp) {
    // Calculate the difference between the current time and the last login timestamp
    $currentTime = time();
    $lastLoginTime = strtotime($lastLoginTimestamp);
    $duration = $currentTime - $lastLoginTime;

    // Format the duration into hours, minutes, and seconds
    $hours = floor($duration / 3600);
    $minutes = floor(($duration % 3600) / 60);
    $seconds = $duration % 60;

    return "$hours hours, $minutes minutes, $seconds seconds";
}
?>
