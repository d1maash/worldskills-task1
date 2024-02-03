<?php
include('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $allRooms = getAllRooms();

    $roomsData = [];
    foreach ($allRooms as $room) {
        $room_id = $room['id'];
        $usersInRoom = getUsersInRoom($room_id);

        $roomsData[] = [
            'id' => $room_id,
            'name' => $room['name'],
            'capacity' => $room['capacity'],
            'users' => $usersInRoom,
        ];
    }

    header('Content-Type: application/json');
    echo json_encode(['action' => 'updateRooms', 'rooms' => $roomsData]);
}
?>
