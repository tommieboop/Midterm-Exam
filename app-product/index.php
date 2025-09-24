<?php
$current_page = 'index';
$page_title = 'Home';
$page_description = 'See what\'s happening in the world right now.';

// Include tweet utilities
include 'tweet_utils.php';

// Create sample tweets if they don't exist
createSampleTweets();

// Get tweets for the feed
$tweets = getTweets(20);

include 'includes/header.php';
?>

<div class="page-header">
    <h1 class="page-title">Home</h1>
</div>

<div class="tweet-composer">
    <form action="post_tweet.php" method="POST" class="composer-form" onsubmit="return validateTweet()">
        <div class="composer-avatar">JD</div>
        <div class="composer-input-area">
            <textarea 
                name="tweet_content" 
                class="composer-textarea" 
                placeholder="What's happening?" 
                maxlength="280" 
                oninput="updateCharCount()"
                required
            ></textarea>
            <div class="composer-footer">
                <span class="composer-char-count">280</span>
                <button type="submit" class="composer-submit">Tweet</button>
            </div>
        </div>
    </form>
</div>

<div class="tweet-feed">
    <?php if (empty($tweets)): ?>
        <div style="padding: 40px; text-align: center; color: var(--twitter-dark-gray);">
            <h3>Welcome to Slowmly!</h3>
            <p>Start by composing your first thoughty above.</p>
        </div>
    <?php else: ?>
        <?php foreach ($tweets as $tweet): ?>
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
                    <div class="tweet-action" onclick="toggleReply('<?php echo $tweet['id']; ?>')">
                        <span>💬</span>
                        <span><?php echo $tweet['replies'] > 0 ? formatNumber($tweet['replies']) : ''; ?></span>
                    </div>
                    
                    <div class="tweet-action <?php echo $tweet['retweeted_by_user'] ? 'retweeted' : ''; ?>" 
                         onclick="toggleRetweet('<?php echo $tweet['id']; ?>')">
                        <span>🔁</span>
                        <span><?php echo $tweet['retweets'] > 0 ? formatNumber($tweet['retweets']) : ''; ?></span>
                    </div>
                    
                    <div class="tweet-action <?php echo $tweet['liked_by_user'] ? 'liked' : ''; ?>" 
                         onclick="toggleLike('<?php echo $tweet['id']; ?>')">
                        <span><?php echo $tweet['liked_by_user'] ? '❤️' : '🤍'; ?></span>
                        <span><?php echo $tweet['likes'] > 0 ? formatNumber($tweet['likes']) : ''; ?></span>
                    </div>
                    
                    <div class="tweet-action" onclick="shareTweet('<?php echo $tweet['id']; ?>')">
                        <span>📤</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
function updateCharCount() {
    const textarea = document.querySelector('.composer-textarea');
    const charCount = document.querySelector('.composer-char-count');
    const submitBtn = document.querySelector('.composer-submit');
    
    const remaining = 280 - textarea.value.length;
    charCount.textContent = remaining;
    
    if (remaining < 0) {
        charCount.style.color = 'var(--twitter-red)';
        submitBtn.disabled = true;
    } else if (remaining < 20) {
        charCount.style.color = 'var(--twitter-red)';
        submitBtn.disabled = false;
    } else {
        charCount.style.color = 'var(--twitter-dark-gray)';
        submitBtn.disabled = false;
    }
}

function validateTweet() {
    const textarea = document.querySelector('.composer-textarea');
    return textarea.value.trim().length > 0 && textarea.value.length <= 280;
}

function toggleLike(tweetId) {
    // This would normally make an AJAX call to like/unlike the tweet
    const action = document.querySelector(`[data-tweet-id="${tweetId}"] .tweet-action.liked`) ? 'unlike' : 'like';
    console.log(`${action} tweet ${tweetId}`);
    // For demo purposes, just toggle the visual state
    // In a real app, you'd make an AJAX call here
}

function toggleRetweet(tweetId) {
    const action = document.querySelector(`[data-tweet-id="${tweetId}"] .tweet-action.retweeted`) ? 'unretweet' : 'retweet';
    console.log(`${action} tweet ${tweetId}`);
}

function toggleReply(tweetId) {
    console.log(`Reply to tweet ${tweetId}`);
    // Could open a reply modal here
}

function shareTweet(tweetId) {
    console.log(`Share tweet ${tweetId}`);
    // Could open share options here
}
</script>

<?php include 'includes/footer.php'; ?>