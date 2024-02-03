
<header class="top-header">
      <nav class="navbar navbar-expand justify-content-between">
        <div class="btn-toggle-menu">
          <span class="material-symbols-outlined">menu</span>
        </div>
        <div
          class="position-relative search-bar d-lg-block d-none"
          data-bs-toggle="modal"
          data-bs-target="#exampleModal"
        >
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
        <div class="sidebar-close">
          <span class="material-symbols-outlined">close</span>
        </div>
      </div>
      <div class="sidebar-nav" data-simplebar="true">
        <!--navigation-->
        <ul class="metismenu" id="menu">
          <button type="button" class="btn btn-secondary"><a href="logout.php" style="color: black; text-decoration: none;">Log Out</a></button>
        </ul>
        <!--end navigation-->
      </div>

      <?php include('rooms/office.php'); ?>
        <div class="room-list">
    <h2>Rooms</h2>
    <ul>
        <!-- Add the following lines to display room information -->
        <?php
        $allRooms = getAllRooms();
        foreach ($allRooms as $room) {
            $room_id = $room['id'];
            $usersInRoom = getUsersInRoom($room_id);
            ?> 
            <li onclick="enterRoom(<?php echo $room_id; ?>); displayUsersInRoom(<?php echo $room_id; ?>);">
                <?php echo $room['name']; ?>
                <!-- Display the list of users and their online duration in the room -->
                <ul>
                    <?php foreach ($usersInRoom as $user): ?>
                        <li>
                            <?php echo $user['username']; ?> - Online for: <?php echo $user['online_duration']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
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
    <!--end sidebar-->

