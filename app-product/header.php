<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' / Twitter' : 'Home / Twitter'; ?></title>
    <meta name="description" content="<?php echo isset($page_description) ? $page_description : 'From breaking news and entertainment to sports and politics, get the full story with all the live commentary.'; ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="twitter-layout">
        <nav class="sidebar">
            <div class="sidebar-header">
                <div class="twitter-logo">
                    <svg viewBox="0 0 24 24" width="32" height="32" fill="#1d9bf0">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li><a href="index.php" class="<?php echo ($current_page == 'index') ? 'active' : ''; ?>"><span class="nav-icon">🏠</span> Home</a></li>
                <li><a href="explore.php" class="<?php echo ($current_page == 'explore') ? 'active' : ''; ?>"><span class="nav-icon">🔍</span> Explore</a></li>
                <li><a href="notifications.php" class="<?php echo ($current_page == 'notifications') ? 'active' : ''; ?>"><span class="nav-icon">🔔</span> Notifications</a></li>
                <li><a href="messages.php" class="<?php echo ($current_page == 'messages') ? 'active' : ''; ?>"><span class="nav-icon">✉️</span> Messages</a></li>
                <li><a href="profile.php" class="<?php echo ($current_page == 'profile') ? 'active' : ''; ?>"><span class="nav-icon">👤</span> Profile</a></li>
            </ul>
            <button class="tweet-btn" onclick="document.getElementById('tweet-composer').style.display='block'">Tweet</button>
        </nav>
        
        <main class="main-content">