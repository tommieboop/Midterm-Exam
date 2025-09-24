<?php
$current_page = 'explore';
$page_title = 'Explore';
$page_description = 'Discover what\'s happening right now in the world.';
include 'includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Explore</h1>
</div>

<div class="tweet-feed">
    <div style="padding: 40px; text-align: center; color: var(--twitter-dark-gray);">
        <h3>🔍 Explore Slowmly</h3>
        <p>Discover trending topics, hashtags, and conversations happening around the world.</p>
        <br>
        <div style="background-color: var(--twitter-hover); border-radius: 16px; padding: 20px; margin: 20px 0;">
            <h4 style="color: var(--twitter-black); margin-bottom: 10px;">Trending Now</h4>
            <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                <span style="background-color: var(--twitter-blue); color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px;">#WebDevelopment</span>
                <span style="background-color: var(--twitter-blue); color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px;">#PHP</span>
                <span style="background-color: var(--twitter-blue); color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px;">#JavaScript</span>
                <span style="background-color: var(--twitter-blue); color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px;">#CSS</span>
                <span style="background-color: var(--twitter-blue); color: white; padding: 8px 16px; border-radius: 20px; font-size: 14px;">#React</span>
            </div>
        </div>
        <p><a href="index.php" style="color: var(--twitter-blue);">← Back to Home</a></p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>