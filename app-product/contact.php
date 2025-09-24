<?php
$current_page = 'contact';
$page_title = 'Contact';
$page_description = 'Get in touch with Slowmly. Send us a message and let\'s discuss your next web project together.';
include 'includes/header.php';
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Get in Touch</h1>
            <p class="card-subtitle">Let's discuss your next project</p>
        </div>
        <p style="font-size: 1.1rem; line-height: 1.7;">
            We'd love to hear from you! Whether you have a question about our services, need help with a project, or just want to say hello, don't hesitate to reach out.
        </p>
    </div>

    <div class="grid grid-cols-2">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Send us a Message</h2>
            </div>
            <form action="contact_process.php" method="POST" id="contactForm">
                <div class="form-group">
                    <label for="name" class="form-label">Full Name *</label>
                    <input type="text" id="name" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email Address *</label>
                    <input type="email" id="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="subject" class="form-label">Subject *</label>
                    <input type="text" id="subject" name="subject" class="form-input" required>
                </div>

                <div class="form-group">
                    <label for="message" class="form-label">Message *</label>
                    <textarea id="message" name="message" class="form-textarea" placeholder="Tell us about your project or how we can help you..." required></textarea>
                </div>

                <div class="form-group">
                    <label for="project_type" class="form-label">Project Type</label>
                    <select id="project_type" name="project_type" class="form-input">
                        <option value="">Select project type (optional)</option>
                        <option value="website">Website Design/Development</option>
                        <option value="webapp">Web Application</option>
                        <option value="mobile">Mobile App</option>
                        <option value="ecommerce">E-commerce Platform</option>
                        <option value="redesign">Website Redesign</option>
                        <option value="consultation">Consultation</option>
                        <option value="other">Other</option>
                    </select>
                </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Contact Information</h2>
            </div>
            
            <div style="margin-bottom: 2rem;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">📧 Email</h4>
                <p style="margin-bottom: 0.5rem;">General Inquiries: info@slowmly.com</p>
                <p style="margin-bottom: 0.5rem;">Projects: projects@slowmly.com</p>
                <p>Support: support@slowmly.com</p>
            </div>

            <div style="margin-bottom: 2rem;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">⏰ Response Time</h4>
                <p style="margin-bottom: 0.5rem;">We typically respond within 24 hours during business days.</p>
                <p>For urgent matters, please mention "URGENT" in your subject line.</p>
            </div>

            <div style="margin-bottom: 2rem;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">💼 Office Hours</h4>
                <p style="margin-bottom: 0.5rem;">Monday - Friday: 9:00 AM - 6:00 PM</p>
                <p style="margin-bottom: 0.5rem;">Saturday: 10:00 AM - 4:00 PM</p>
                <p>Sunday: Closed</p>
            </div>

            <div>
                <h4 style="color: var(--primary); margin-bottom: 1rem;">🌐 Connect With Us</h4>
                <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                    <a href="#" class="btn btn-outline" style="font-size: 0.875rem;">LinkedIn</a>
                    <a href="#" class="btn btn-outline" style="font-size: 0.875rem;">Slowmly</a>
                    <a href="#" class="btn btn-outline" style="font-size: 0.875rem;">GitHub</a>
                    <a href="#" class="btn btn-outline" style="font-size: 0.875rem;">YouTube</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Frequently Asked Questions</h2>
        </div>
        <div class="grid grid-cols-2">
            <div>
                <h4 style="margin-bottom: 0.5rem;">What services do you offer?</h4>
                <p style="font-size: 0.9rem; color: var(--muted-foreground); margin-bottom: 1.5rem;">
                    We specialize in modern web design, development, and user experience optimization with a focus on social media inspired interfaces.
                </p>
                
                <h4 style="margin-bottom: 0.5rem;">How long does a project take?</h4>
                <p style="font-size: 0.9rem; color: var(--muted-foreground); margin-bottom: 1.5rem;">
                    Project timelines vary based on complexity, but most websites take 2-6 weeks from concept to launch.
                </p>
            </div>
            <div>
                <h4 style="margin-bottom: 0.5rem;">Do you provide ongoing support?</h4>
                <p style="font-size: 0.9rem; color: var(--muted-foreground); margin-bottom: 1.5rem;">
                    Yes, we offer maintenance packages and ongoing support to keep your website updated and secure.
                </p>
                
                <h4 style="margin-bottom: 0.5rem;">What's your design process?</h4>
                <p style="font-size: 0.9rem; color: var(--muted-foreground); margin-bottom: 1.5rem;">
                    We start with discovery, move to wireframes and design, then development, testing, and launch with ongoing optimization.
                </p>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Basic form validation
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const subject = document.getElementById('subject').value.trim();
    const message = document.getElementById('message').value.trim();
    
    if (!name || !email || !subject || !message) {
        alert('Please fill in all required fields.');
        return;
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address.');
        return;
    }
    
});
</script>

<?php include 'includes/footer.php'; ?>