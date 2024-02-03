<?php
include('includes/functions.php');
include('includes/db.php');

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$username = getUsername($user_id);
$avatar = getAvatar($user_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include your existing head content here -->
  <!--plugins-->
  <link
      href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
      rel="stylesheet"
    />
    <link
      href="assets/plugins/metismenu/css/metisMenu.min.css"
      rel="stylesheet"
    />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <!-- loader-->
    <!--Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="assets/css/icons.css" />

    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Include your existing stylesheet link -->

    <!-- Add the following script -->
    <script>
        function enterRoom(roomId) {
        
            $.post('update_current_room.php', { room_id: roomId }, function (data) {
              
                console.log(data);

                window.location.href = 'rooms/room.php?id=' + roomId;
            });
        }

        function displayUsersInRoom(roomId) {
            $.get('get_users_in_room.php', { room_id: roomId }, function (data) {

                console.log("Users in Room " + roomId + ":", data);
                alert("Users in Room " + roomId + ": " + data.join(', '));
            });
        }
    </script>
    <title>Virtual Office</title>
</head>

<body>
    <div class="main-container">
      
     
<style>
    @media only screen and (max-width: 1199px) {
  .slidebar-wrapper {
    left: 0px !important;
  }
}
</style>
    <!--end header-->

    <!--start sidebar-->
    <aside class="sidebar-wrapper">
      <div class="sidebar-header">
        <div class="logo-icon">
          <img src="assets/images/logo-icon.png" class="logo-img" alt="" />
        </div>
        <div class="logo-name flex-grow-1">
          <h5 class="mb-0">Online Office</h5>
        </div>
      </div>
      <div class="sidebar-nav" data-simplebar="true">
        <!--navigation-->
        <ul class="metismenu" id="menu">
          <button type="button" class="btn btn-secondary"><a href="logout.php" style="color: black; text-decoration: none;">Log Out</a></button>
          
        </ul>
        <ul class="metismenu" id="menu">
        <div class="room-list">
           

<br><br><br><br><br>
    <h2>Rooms</h2>
    <ul>
      
        <?php
        $allRooms = getAllRooms();
        foreach ($allRooms as $room) {
            $room_id = $room['id'];
            $usersInRoom = getUsersInRoom($room_id);
            ?> 
            <li onclick="enterRoom(<?php echo $room_id; ?>); displayUsersInRoom(<?php echo $room_id; ?>);">
                <?php echo $room['name']; ?>
              
                <ul>
                    <?php foreach ($usersInRoom as $user): ?>
                        <li>
                            <?php echo $user['username']; ?> - Online for: <?php echo $user['online_duration']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
            </ul>
        <?php } ?>
        <ul class="metismenu" id="menu">
            <br><br>
        <?php include('chat.php'); ?>
        </ul>
    
      </div>

</div>
   
      <div class="sidebar-bottom dropdown dropup-center dropup">
        <div
          class=" d-flex align-items-center px-3 gap-3 w-100 h-100"
          data-bs-toggle="dropdown"
        >
          <div class="user-img">
          <img src="<?php echo $avatar; ?>" alt="User Avatar">
          </div>
          <div class="user-info"> 

            <h5 class="mb-0 user-name"><?php echo $username; ?></h5>
          </div>
        </div>
      </div>
    </aside>
   
     
    <main class="page-content">
        
<img src="assets\office base clean\office_base_clean.jpg" alt="" width="100%">
                    </main>
        
   
        
</div>

    </div>

  
<script>
function pollForUpdates() {
    $.get('update_rooms.php', function (data) {
        console.log("Received data:", data);
        setTimeout(pollForUpdates, 5000);
    });
}

$(document).ready(function () {
    pollForUpdates();
});
</script>

    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/apex/apexcharts.min.js"></script>
    <script src="assets/js/index.js"></script>
    <!--BS Scripts-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/main.js"></script>
</body>

</html>
