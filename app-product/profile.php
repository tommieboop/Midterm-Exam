<?php
$current_page = 'profile';
$page_title = 'Profile';
$page_description = 'View and edit your profile.';

// Include tweet utilities
include 'tweet_utils.php';

// Get user's tweets (for demo, we'll show tweets by John Doe)
$all_tweets = getTweets(100);
$user_tweets = array_filter($all_tweets, function($tweet) {
    return $tweet['author']['handle'] === '@johndoe';
});

include 'includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Slowmly</h1>
</div>

<div style="padding: 20px; border-bottom: 1px solid var(--twitter-border);">
    <div style="display: flex; gap: 16px; margin-bottom: 16px;">
        <div style="width: 80px; height: 80px; border-radius: 50%; background-color: var(--twitter-blue); display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; font-size: 32px;">JD</div>
        <div style="flex: 1;">
            <h2 style="font-size: 24px; font-weight: 800; margin-bottom: 4px;">John Doe</h2>
            <p style="color: var(--twitter-dark-gray); margin-bottom: 12px;">@johndoe</p>
            <p style="margin-bottom: 12px;">Web developer passionate about creating amazing user experiences. Building the future one line of code at a time. 🚀</p>
            <div style="display: flex; gap: 20px; color: var(--twitter-dark-gray); font-size: 14px;">
                <span><strong style="color: var(--twitter-black);">123</strong> Following</span>
                <span><strong style="color: var(--twitter-black);">456</strong> Followers</span>
            </div>
        </div>
    </div>
    <button style="background-color: transparent; border: 1px solid var(--twitter-border); border-radius: 25px; padding: 8px 16px; cursor: pointer; font-weight: 700;">Edit profile</button>
</div>

<div style="border-bottom: 1px solid var(--twitter-border); padding: 16px;">
    <nav style="display: flex; gap: 32px;">
        <a href="#" style="color: var(--twitter-black); text-decoration: none; font-weight: 700; border-bottom: 3px solid var(--twitter-blue); padding-bottom: 12px;">Tweets</a>
        <a href="#" style="color: var(--twitter-dark-gray); text-decoration: none;">Replies</a>
        <a href="#" style="color: var(--twitter-dark-gray); text-decoration: none;">Media</a>
        <a href="#" style="color: var(--twitter-dark-gray); text-decoration: none;">Likes</a>
    </nav>
</div>

<div class="tweet-feed">
    <?php if (empty($user_tweets)): ?>
        <div style="padding: 40px; text-align: center; color: var(--twitter-dark-gray);">
            <h3>No thoughty yet!</h3>
            <p>When you post some thoughty, it'll show up here.</p>
            <br>
            <a href="index.php" style="color: var(--twitter-blue);">← Back to Home to start thoughty</a>
        </div>
    <?php else: ?>
        <?php foreach ($user_tweets as $tweet): ?>
            <div class="tweet" data-tweet-id="<?php echo $tweet['id']; ?>">
                <div class="tweet-header">
                    <div class="tweet-avatar"><?php echo htmlspecialchars($tweet['author']['avatar']); ?></div>
                    <div class="tweet-author-info">
                        <span class="tweet-author-name"><?php echo htmlspecialchars($tweet['author']['name']); ?></span>
                        <span class="tweet-author-handle"><?php echo htmlspecialchars($tweet['author']['handle']); ?></span>
                        <span class="tweet-timestamp">·</span>
                        <span class="tweet-timestamp"><?php echo formatTimestamp($tweet['timestamp']); ?></span>
                    </div>
                </div>
                
                <div class="tweet-content">
                    <?php echo nl2br(htmlspecialchars($tweet['content'])); ?>
                </div>
                
                <div class="tweet-actions">
                    <div class="tweet-action">
                        <span>💬</span>
                        <span><?php echo $tweet['replies'] > 0 ? formatNumber($tweet['replies']) : ''; ?></span>
                    </div>
                    
                    <div class="tweet-action <?php echo $tweet['retweeted_by_user'] ? 'retweeted' : ''; ?>">
                        <span>🔁</span>
                        <span><?php echo $tweet['retweets'] > 0 ? formatNumber($tweet['retweets']) : ''; ?></span>
                    </div>
                    
                    <div class="tweet-action <?php echo $tweet['liked_by_user'] ? 'liked' : ''; ?>">
                        <span><?php echo $tweet['liked_by_user'] ? '❤️' : '🤍'; ?></span>
                        <span><?php echo $tweet['likes'] > 0 ? formatNumber($tweet['likes']) : ''; ?></span>
                    </div>
                    
                    <div class="tweet-action">
                        <span>📤</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>