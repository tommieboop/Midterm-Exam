<?php
$current_page = 'messages';
$page_title = 'Messages';
$page_description = 'Send and receive direct messages.';
include 'includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Messages</h1>
</div>

<div class="tweet-feed">
    <div style="padding: 40px; text-align: center; color: var(--twitter-dark-gray);">
        <h3>✉️ Welcome to Messages</h3>
        <p>Send private messages to people on Slowmly. Share thoughty, media, and more!</p>
        <br>
        <div style="background-color: var(--twitter-hover); border-radius: 16px; padding: 20px; margin: 20px 0;">
            <h4 style="color: var(--twitter-black); margin-bottom: 10px;">Start a conversation</h4>
            <p style="color: var(--twitter-dark-gray);">Choose from your followers or search for someone specific to start messaging.</p>
            <br>
            <button style="background-color: var(--twitter-blue); color: white; border: none; border-radius: 25px; padding: 12px 24px; cursor: pointer;">Write a message</button>
        </div>
        <p><a href="index.php" style="color: var(--twitter-blue);">← Back to Home</a></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>