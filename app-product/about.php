<?php
$current_page = 'about';
$page_title = 'About';
$page_description = 'Learn more about Slowmly and our mission to create engaging web experiences with modern design principles.';
include 'includes/header.php';
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">About Slowmly</h1>
            <p class="card-subtitle">Creating modern web experiences</p>
        </div>
        <p style="font-size: 1.1rem; line-height: 1.7; margin-bottom: 2rem;">
            Slowmly represents a new approach to web design, drawing inspiration from the clean, engaging interfaces of modern social media platforms. We believe that websites should be intuitive, beautiful, and accessible to everyone.
        </p>
    </div>

    <div class="grid grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Our Mission</h2>
            </div>
            <p>To create web experiences that feel natural and engaging, combining the best practices of modern design with the familiarity of social media interfaces. We strive to make every interaction meaningful and every design decision purposeful.</p>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Our Approach</h2>
            </div>
            <p>We focus on clean design, intuitive navigation, and responsive layouts that work beautifully across all devices. Our color schemes and typography are carefully chosen to provide excellent readability and visual appeal.</p>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Design Philosophy</h2>
        </div>
        <div class="grid grid-cols-3">
            <div>
                <h4 style="color: var(--primary); margin-bottom: 1rem;">Simplicity</h4>
                <p style="font-size: 0.9rem;">Clean interfaces that focus on content and functionality without unnecessary complexity.</p>
            </div>
            <div>
                <h4 style="color: var(--primary); margin-bottom: 1rem;">Consistency</h4>
                <p style="font-size: 0.9rem;">Unified design language across all pages and components for a cohesive experience.</p>
            </div>
            <div>
                <h4 style="color: var(--primary); margin-bottom: 1rem;">Accessibility</h4>
                <p style="font-size: 0.9rem;">Inclusive design that ensures everyone can access and use our interfaces effectively.</p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Technical Excellence</h2>
        </div>
        <div class="grid grid-cols-2">
            <div>
                <h4 style="margin-bottom: 1rem;">Frontend Technologies</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.25rem 0;"> Modern CSS with custom properties</li>
                    <li style="padding: 0.25rem 0;"> Responsive grid systems</li>
                    <li style="padding: 0.25rem 0;"> Optimized performance</li>
                    <li style="padding: 0.25rem 0;"> Cross-browser compatibility</li>
                </ul>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem;">Design Features</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.25rem 0;">  User-centered design</li>
                    <li style="padding: 0.25rem 0;">  Consistent spacing and typography</li>
                    <li style="padding: 0.25rem 0;">  Carefully crafted color palettes</li>
                    <li style="padding: 0.25rem 0;">  Smooth transitions and interactions</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Get in Touch</h2>
        </div>
        <p>Interested in learning more about our design approach or working together? We'd love to hear from you.</p>
        <div style="margin-top: 1.5rem;">
            <a href="contact.php" class="btn btn-primary">Contact Us</a>
            <a href="portfolio.php" class="btn btn-outline" style="margin-left: 1rem;">View Our Work</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>