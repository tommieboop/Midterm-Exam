        </main>
        
        <aside class="right-sidebar">
            <div class="trending-widget">
                <h3>What's up!</h3>
                <div class="trending-item">
                    <div class="trend-category">Trending in Technology</div>
                    <div class="trend-topic">#PHP</div>
                    <div class="trend-tweets">1.6K Thoughtly</div>
                </div>
                <div class="trending-item">
                    <div class="trend-category">Trending Right Now</div>
                    <div class="trend-topic">#Man'sBestFriend </div>
                    <div class="trend-tweets">2.5K Thoughtly</div>
                </div>
                <div class="trending-item">
                    <div class="trend-category">Trending in Foooods</div>
                    <div class="trend-topic">#Bird</div>
                    <div class="trend-tweets">966 Thoughtly</div>
                </div>
            </div>
        </aside>
    </div>

    <!-- Tweet Composer Modal -->
    <div id="tweet-composer" class="tweet-modal" style="display: none;">
        <div class="tweet-modal-content">
            <div class="tweet-modal-header">
                <span class="close" onclick="document.getElementById('tweet-composer').style.display='none'">&times;</span>
                <h3>Compose Tweet</h3>
            </div>
            <form action="post_tweet.php" method="POST" class="tweet-form">
                <textarea name="tweet_content" class="tweet-textarea" placeholder="What's happening?" maxlength="280" required></textarea>
                <div class="tweet-form-footer">
                    <span class="char-count">280</span>
                    <button type="submit" class="tweet-submit-btn">Tweet</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Character counter for tweet composer
        document.addEventListener('DOMContentLoaded', function() {
            const textarea = document.querySelector('.tweet-textarea');
            const charCount = document.querySelector('.char-count');
            
            if (textarea && charCount) {
                textarea.addEventListener('input', function() {
                    const remaining = 280 - this.value.length;
                    charCount.textContent = remaining;
                    charCount.style.color = remaining < 20 ? '#ff0000' : '#657786';
                });
            }
        });
    </script>
</body>
</html>