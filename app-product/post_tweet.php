<?php
header('Content-Type: application/json');

// Check if request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get tweet content
$tweet_content = trim($_POST['tweet_content'] ?? '');

// Validate tweet
if (empty($tweet_content)) {
    http_response_code(400);
    echo json_encode(['error' => 'Tweet content cannot be empty']);
    exit;
}

if (strlen($tweet_content) > 280) {
    http_response_code(400);
    echo json_encode(['error' => 'Tweet too long']);
    exit;
}

// Load existing tweets
$tweets_file = 'data/tweets.json';
$tweets = [];

if (file_exists($tweets_file)) {
    $tweets_data = file_get_contents($tweets_file);
    $tweets = json_decode($tweets_data, true) ?? [];
}

// Create new tweet
$new_tweet = [
    'id' => uniqid(),
    'content' => $tweet_content,
    'author' => [
        'name' => 'John Doe', // Default user for now
        'handle' => '@johndoe',
        'avatar' => 'JD'
    ],
    'timestamp' => time(),
    'likes' => 0,
    'retweets' => 0,
    'replies' => 0,
    'liked_by_user' => false,
    'retweeted_by_user' => false
];

// Add tweet to beginning of array (newest first)
array_unshift($tweets, $new_tweet);

// Keep only last 100 tweets
$tweets = array_slice($tweets, 0, 100);

// Save tweets
if (file_put_contents($tweets_file, json_encode($tweets, JSON_PRETTY_PRINT))) {
    // If this is a form submission (not AJAX), redirect back
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        header('Location: index.php');
        exit;
    }
    
    echo json_encode(['success' => true, 'tweet' => $new_tweet]);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to save tweet']);
}
?>