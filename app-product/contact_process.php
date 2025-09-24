<?php
$current_page = 'contact';
$page_title = 'Message Sent';
$page_description = 'Thank you for contacting Slowmly. Your message has been received and we\'ll get back to you soon.';

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// Sanitize and validate input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Process form data
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$subject = sanitizeInput($_POST['subject'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');
$project_type = sanitizeInput($_POST['project_type'] ?? '');

// Validation
$errors = [];

if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email is required.";
}

if (empty($subject)) {
    $errors[] = "Subject is required.";
}

if (empty($message)) {
    $errors[] = "Message is required.";
}

// If there are errors, redirect back with error message
if (!empty($errors)) {
    $error_message = implode(" ", $errors);
    header("Location: contact.php?error=" . urlencode($error_message));
    exit;
}

// In a real application, you would:
// 1. Save to database
// 2. Send email notification
// 3. Log the submission
// For this demo, we'll just simulate success

// Simulate email sending (in real app, use mail() or a service like SendGrid)
$to = "info@slowmy.com"; // Replace with actual email
$email_subject = "New Contact Form Submission: " . $subject;
$email_body = "
New contact form submission:

Name: $name
Email: $email
Subject: $subject
Project Type: " . ($project_type ?: 'Not specified') . "

Message:
$message

---
Submitted from: " . $_SERVER['HTTP_HOST'] . "
IP Address: " . $_SERVER['REMOTE_ADDR'] . "
Date: " . date('Y-m-d H:i:s') . "
";

$headers = "From: noreply@slowmly.com\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Uncomment the line below to actually send emails (requires mail server configuration)
// mail($to, $email_subject, $email_body, $headers);

// Log submission to a file (optional)
$log_entry = date('Y-m-d H:i:s') . " - Contact form submission from: $name ($email)\n";
file_put_contents('contact_log.txt', $log_entry, FILE_APPEND | LOCK_EX);

include 'includes/header.php';
?>

<div class="container">
    <div class="card" style="text-align: center; max-width: 600px; margin: 2rem auto;">
        <div style="margin-bottom: 2rem;">
            <div style="width: 80px; height: 80px; background: var(--primary); border-radius: 50%; margin: 0 auto 1.5rem; display: flex; align-items: center; justify-content: center;">
                <span style="color: var(--primary-foreground); font-size: 2rem;">✓</span>
            </div>
            <h1 class="card-title" style="color: var(--primary); margin-bottom: 1rem;">Message Sent Successfully!</h1>
            <p style="font-size: 1.1rem; color: var(--muted-foreground);">
                Thank you for reaching out to us, <?php echo htmlspecialchars($name); ?>!
            </p>
        </div>
        
        <div style="background: var(--muted); padding: 1.5rem; border-radius: var(--radius); margin-bottom: 2rem;">
            <h3 style="margin-bottom: 1rem;">Submission Details</h3>
            <div style="text-align: left;">
                <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Subject:</strong> <?php echo htmlspecialchars($subject); ?></p>
                <?php if ($project_type): ?>
                <p><strong>Project Type:</strong> <?php echo htmlspecialchars($project_type); ?></p>
                <?php endif; ?>
                <p><strong>Submitted:</strong> <?php echo date('F j, Y \a\t g:i A'); ?></p>
            </div>
        </div>
        
        <div style="margin-bottom: 2rem;">
            <h3 style="margin-bottom: 1rem;">What Happens Next?</h3>
            <div style="text-align: left;">
                <ul style="list-style: none; padding: 0;">
                    <li style="padding: 0.5rem 0; display: flex; align-items: center;">
                        <span style="background: var(--primary); color: var(--primary-foreground); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem; font-size: 0.8rem;">1</span>
                        We'll review your message within 24 hours
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center;">
                        <span style="background: var(--primary); color: var(--primary-foreground); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem; font-size: 0.8rem;">2</span>
                        Our team will respond to your inquiry
                    </li>
                    <li style="padding: 0.5rem 0; display: flex; align-items: center;">
                        <span style="background: var(--primary); color: var(--primary-foreground); width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 1rem; font-size: 0.8rem;">3</span>
                        We'll schedule a consultation if needed
                    </li>
                </ul>
            </div>
        </div>
        
        <div>
            <a href="index.php" class="btn btn-primary">Return to Home</a>
            <a href="portfolio.php" class="btn btn-outline" style="margin-left: 1rem;">View Our Work</a>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">While You Wait</h2>
        </div>
        <div class="grid grid-cols-3">
            <div style="text-align: center;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">📱 Follow Us</h4>
                <p style="font-size: 0.9rem;">Stay updated with our latest projects and design insights on social media.</p>
            </div>
            <div style="text-align: center;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">📚 Browse Portfolio</h4>
                <p style="font-size: 0.9rem;">Check out our recent work and see what we can create for you.</p>
            </div>
            <div style="text-align: center;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">💡 Learn More</h4>
                <p style="font-size: 0.9rem;">Read about our design philosophy and approach to creating great experiences.</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>