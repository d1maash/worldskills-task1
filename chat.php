
<style>
    .chat-messages {
    max-height: 50px; /* Set your desired maximum height */
    height: 30px;
    overflow-y: auto; /* Enable vertical scrolling if the content exceeds the maximum height */

}
</style>
<!-- chat.php -->
<div class="chat-container">
    <h2>Chat</h2>
    <div id="chat-messages" style=" max-height: 200px; /* Set your desired maximum height */
    overflow-y: auto; /* Enable vertical scrolling if the content exceeds the maximum height */ width: 97%;">
        <?php
        // Fetch and display chat messages
        $room_id = 1; // Replace with the actual room ID
        $messages = getChatMessages($room_id);

        if (!empty($messages)) {
            foreach ($messages as $message) {
                echo '<p><strong>' . getUsername($message['user_id']) . ':</strong> ' . $message['content'] . '</p>';
            }
        } else {
            echo '<p>No messages available.</p>';
        }
        ?>
    </div>
    <form id="chat-form">
        <style>
            textarea {
                /* = Убираем скролл */
	overflow: auto;

/* = Убираем увеличение */
resize: none;
width: 100%;
height: 50px;

/* = Добавим фон, рамку, отступ*/
background: #f6f6f6;
border: 1px solid #cecece;
padding: 8px 0 8px 10px;
            }
        </style>
        <textarea id="message-input" placeholder="Type your message"></textarea>
        <button type="button" class="btn btn-success" style="width: 100%"onclick="sendMessage(); window.location.reload();"> Send</button>
    </form>
</div>
