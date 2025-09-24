<?php
$current_page = 'notifications';
$page_title = 'Notifications';
$page_description = 'See your latest notifications and interactions.';
include 'includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Notifications</h1>
</div>

<div class="tweet-feed">
    <div style="padding: 40px; text-align: center; color: var(--twitter-dark-gray);">
        <h3>🔔 No new notifications</h3>
        <p>When someone likes, sees, or replies to your thoughty, you'll see it here.</p>
        <br>
        <div style="background-color: var(--twitter-hover); border-radius: 16px; padding: 20px; margin: 20px 0;">
            <p style="color: var(--twitter-black);">Stay connected! Start engaging with tweets to see more activity in your notifications.</p>
        </div>
        <p><a href="index.php" style="color: var(--twitter-blue);">← Back to Home</a></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>