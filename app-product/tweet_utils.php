<?php

function getTweets($limit = 50) {
    $tweets_file = 'data/tweets.json';
    
    if (!file_exists($tweets_file)) {
        return [];
    }
    
    $tweets_data = file_get_contents($tweets_file);
    $tweets = json_decode($tweets_data, true) ?? [];
    
    return array_slice($tweets, 0, $limit);
}

function formatTimestamp($timestamp) {
    $now = time();
    $diff = $now - $timestamp;
    
    if ($diff < 60) {
        return $diff . 's';
    } elseif ($diff < 3600) {
        return floor($diff / 60) . 'm';
    } elseif ($diff < 86400) {
        return floor($diff / 3600) . 'h';
    } elseif ($diff < 604800) {
        return floor($diff / 86400) . 'd';
    } else {
        return date('M j', $timestamp);
    }
}

function formatNumber($number) {
    if ($number >= 1000000) {
        return round($number / 1000000, 1) . 'M';
    } elseif ($number >= 1000) {
        return round($number / 1000, 1) . 'K';
    }
    return $number;
}

// Create some initial sample tweets if the file doesn't exist or is empty
function createSampleTweets() {
    $tweets_file = 'data/tweets.json';
    
    if (file_exists($tweets_file)) {
        $content = file_get_contents($tweets_file);
        $existing_tweets = json_decode($content, true);
        if (!empty($existing_tweets) && count($existing_tweets) > 1) {
            return; // Already has tweets beyond just test tweets
        }
    }
    
    $sample_tweets = [
        [
            'id' => 'sample1',
            'content' => 'Just launched my new Twitter clone built with PHP! 🚀 #WebDevelopment #PHP',
            'author' => [
                'name' => 'Sarah Chen',
                'handle' => '@sarahcodes',
                'avatar' => 'SC'
            ],
            'timestamp' => time() - 3600,
            'likes' => 24,
            'retweets' => 5,
            'replies' => 3,
            'liked_by_user' => false,
            'retweeted_by_user' => false
        ],
        [
            'id' => 'sample2',
            'content' => 'Beautiful sunset today! Sometimes you need to step away from the code and enjoy the simple things in life 🌅',
            'author' => [
                'name' => 'Mike Johnson',
                'handle' => '@mikej',
                'avatar' => 'MJ'
            ],
            'timestamp' => time() - 7200,
            'likes' => 156,
            'retweets' => 23,
            'replies' => 12,
            'liked_by_user' => true,
            'retweeted_by_user' => false
        ],
        [
            'id' => 'sample3',
            'content' => 'Hot take: CSS Grid is still underrated. So many developers stick to Flexbox when Grid would be perfect for their layout needs.',
            'author' => [
                'name' => 'Alex Rivera',
                'handle' => '@alexcss',
                'avatar' => 'AR'
            ],
            'timestamp' => time() - 10800,
            'likes' => 89,
            'retweets' => 34,
            'replies' => 28,
            'liked_by_user' => false,
            'retweeted_by_user' => true
        ]
    ];
    
    file_put_contents($tweets_file, json_encode($sample_tweets, JSON_PRETTY_PRINT));
}

?>