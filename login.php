<?php
include('includes/functions.php');
include('includes/db.php');

session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $avatar = $_POST['avatar'];

    $user_id = createUser($username, $avatar);

    if ($user_id) {
        $_SESSION['user_id'] = $user_id;
        header("Location: index.php");
        exit();
    } else {
        $error_message = "Error creating user.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <style>
        
/* Add this to your existing CSS file or create a new one */
.avatar-dropdown {
    position: relative;
    display: inline-block;
    width: 150px;
    margin: 0 auto;
}

.selected-avatar {
    cursor: pointer;
}

.avatar-options {
    display: none;
    position: absolute;
    top: 100%;
    width: 300px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border: 1px solid #ccc;
    padding: 5px;
    overflow-y: auto; /* Enable vertical scrolling if there are many avatars */
}

.avatar-options table {
    width: 200%;
    display: flex;
  /* Allow avatars to wrap to the next line */
}

.avatar-options td {
    margin-left: 30px;
    padding: 15px
}

.avatar-options img {
    width: 75px;
    height: auto;
    cursor: pointer;
    display: block;
}

.open .avatar-options {
    display: flex;
    flex-direction: column; /* Display avatars in a column */
}

    </style>
    
    <br>
        <br><br><br><br><br><br><br><br><br>
    <div class="login-container container" style="width: 50%">
        <h2>Login</h2>
        <?php if (isset($error_message)) : ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="POST">
        <div class="row mb-3">
        <label for="imputUsername3" class="col-sm-2 col-form-label">UserName</label>
        <div class="col-sm-10">
            <input type="text" id="username" name="username" class="form-control" id="imputUsername3" required>
            </div>
            <br><br>
            <label for="avatar">Select Avatar:</label>
            <div class="avatar-dropdown" id="avatarDropdown">
                <input type="hidden" id="avatar" name="avatar" required>
                <div class="selected-avatar" id="selectedAvatar">
                    <img src="assets/avatars/avatar-01.svg" alt="Avatar 1">
                </div>
                <div class="avatar-options">
                    <table>
                        <tr>
                            <td onclick="selectAvatar('assets/avatars/avatar-01.svg')"><img src="assets/avatars/avatar-01.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-02.svg')"><img src="assets/avatars/avatar-02.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-03.svg')"><img src="assets/avatars/avatar-03.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-04.svg')"><img src="assets/avatars/avatar-04.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-05.svg')"><img src="assets/avatars/avatar-05.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-06.svg')"><img src="assets/avatars/avatar-06.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-07.svg')"><img src="assets/avatars/avatar-07.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-08.svg')"><img src="assets/avatars/avatar-08.svg" alt="Avatar 1"></td>
                            <td onclck="selectAvatar('assets/avatars/avatar-09.svg')"><img src="assets/avatars/avatar-09.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-10.svg')"><img src="assets/avatars/avatar-10.svg" alt="Avatar 1"></td>
                            <td onclick="selectAvatar('assets/avatars/avatar-11.svg')"><img src="assets/avatars/avatar-11.svg" alt="Avatar 1"></td>
                            
                        </tr>
                        <!-- Add more rows if needed -->
                    </table>
                </div>
            </div>
            <button type="submit">Login</button>
           
        </form>
    </div>
    <script>
        // JavaScript function to set the selected avatar
        function selectAvatar(avatarPath) {
            document.getElementById('selectedAvatar').innerHTML = '<img src="' + avatarPath + '" alt="Selected Avatar">';
            document.getElementById('avatar').value = avatarPath;
            document.getElementById('avatarDropdown').classList.remove('open');
        }

        document.getElementById('selectedAvatar').addEventListener('click', function () {
            document.getElementById('avatarDropdown').classList.toggle('open');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
