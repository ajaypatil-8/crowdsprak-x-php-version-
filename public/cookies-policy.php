<?php
session_start();
require_once __DIR__ . "/../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Policy - CrowdSpark</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;900&family=DM+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-primary: #fafafa;
            --bg-secondary: #f1f5f9;
            --bg-card: rgba(255, 255, 255, 0.95);
            
            --text-primary: #0f172a;
            --text-secondary: #475569;
            --text-tertiary: #64748b;
            
            --border-color: rgba(15, 23, 42, 0.08);
            
            --shadow-md: 0 8px 32px rgba(0, 0, 0, 0.08);
            
            --orb-opacity: 0.20;
        }

        [data-theme="dark"] {
            --bg-primary: #0f0f0f;
            --bg-secondary: #1a1a1a;
            --bg-card: rgba(20, 20, 30, 0.85);
            
            --text-primary: #ffffff;
            --text-secondary: #cbd5e1;
            --text-tertiary: #94a3b8;
            
            --border-color: rgba(255, 255, 255, 0.1);
            
            --shadow-md: 0 8px 32px rgba(0, 0, 0, 0.4);
            
            --orb-opacity: 0.25;
        }

        /* Amber accent */
        :root, [data-theme="dark"] {
            --accent-primary: #f59e0b;
            --accent-secondary: #fbbf24;
            --accent-gradient: linear-gradient(135deg, #f59e0b, #fbbf24);
            --accent-glow: rgba(245, 158, 11, 0.4);
        }

        [data-theme="dark"] {
            --orb-1: linear-gradient(45deg, #f59e0b, #fbbf24);
            --orb-2: linear-gradient(45deg, #d97706, #f59e0b);
            --orb-3: linear-gradient(45deg, #b45309, #d97706);
        }

        [data-theme="light"] {
            --orb-1: linear-gradient(45deg, #fde68a, #fbbf24);
            --orb-2: linear-gradient(45deg, #fbbf24, #f59e0b);
            --orb-3: linear-gradient(45deg, #f59e0b, #d97706);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--bg-primary);
            color: var(--text-primary);
            overflow-x: hidden;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .bg-animation {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            opacity: var(--orb-opacity);
            transition: opacity 0.3s ease;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            animation: float 20s infinite ease-in-out;
        }

        .orb-1 {
            width: 500px;
            height: 500px;
            background: var(--orb-1);
            top: -10%;
            left: -10%;
        }

        .orb-2 {
            width: 400px;
            height: 400px;
            background: var(--orb-2);
            bottom: -10%;
            right: -10%;
            animation-delay: 5s;
        }

        .orb-3 {
            width: 350px;
            height: 350px;
            background: var(--orb-3);
            top: 50%;
            left: 50%;
            animation-delay: 10s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) scale(1); }
            25% { transform: translate(50px, 50px) scale(1.1); }
            50% { transform: translate(-30px, 80px) scale(0.9); }
            75% { transform: translate(40px, -40px) scale(1.05); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .cookie-page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            padding: 140px 20px 80px;
        }

        .cookie-container {
            max-width: 900px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease;
        }

        .cookie-hero {
            text-align: center;
            margin-bottom: 50px;
        }

        .cookie-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            margin-bottom: 16px;
            background: linear-gradient(135deg, var(--text-primary), var(--accent-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .cookie-meta {
            color: var(--text-tertiary);
            font-size: 14px;
            font-weight: 600;
        }

        .cookie-content {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 50px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .cookie-content h2 {
            font-size: 1.75rem;
            font-weight: 900;
            margin: 40px 0 20px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .cookie-content h2:first-child {
            margin-top: 0;
        }

        .cookie-content h2::before {
            content: '';
            width: 4px;
            height: 28px;
            background: var(--accent-gradient);
            border-radius: 2px;
        }

        .cookie-content h3 {
            font-size: 1.25rem;
            font-weight: 800;
            margin: 24px 0 12px;
            color: var(--text-primary);
        }

        .cookie-content p {
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 16px;
            font-size: 15px;
        }

        .cookie-content ul {
            margin-left: 24px;
            margin-bottom: 16px;
        }

        .cookie-content li {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .cookie-content strong {
            color: var(--text-primary);
            font-weight: 700;
        }

        .cookie-table {
            width: 100%;
            border-collapse: collapse;
            margin: 24px 0;
            background: var(--bg-secondary);
            border-radius: 12px;
            overflow: hidden;
        }

        .cookie-table th,
        .cookie-table td {
            padding: 16px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .cookie-table th {
            background: var(--accent-gradient);
            color: #fff;
            font-weight: 800;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .cookie-table td {
            color: var(--text-secondary);
            font-size: 14px;
        }

        .cookie-table tr:last-child td {
            border-bottom: none;
        }

        .cookie-type {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-essential {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
        }

        .type-functional {
            background: rgba(59, 130, 246, 0.2);
            color: #3b82f6;
        }

        .type-analytics {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }

        .type-marketing {
            background: rgba(139, 92, 246, 0.2);
            color: #8b5cf6;
        }

        .highlight-box {
            background: rgba(245, 158, 11, 0.1);
            border-left: 4px solid var(--accent-primary);
            padding: 20px 24px;
            border-radius: 12px;
            margin: 24px 0;
        }

        .highlight-box p {
            margin-bottom: 0;
        }

        .control-box {
            background: var(--bg-secondary);
            border-radius: 16px;
            padding: 28px;
            margin: 24px 0;
        }

        .control-box h4 {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .control-box h4 i {
            color: var(--accent-primary);
        }

        .contact-box {
            background: var(--accent-gradient);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            color: #fff;
            margin-top: 50px;
        }

        .contact-box h3 {
            font-size: 1.75rem;
            font-weight: 900;
            margin-bottom: 12px;
        }

        .contact-box p {
            margin-bottom: 24px;
            opacity: 0.95;
        }

        .contact-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 28px;
            background: #fff;
            color: var(--accent-primary);
            border-radius: 999px;
            text-decoration: none;
            font-weight: 800;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .contact-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .cookie-page {
                padding: 120px 15px 60px;
            }

            .cookie-content {
                padding: 35px 24px;
            }

            .cookie-table {
                font-size: 13px;
            }

            .cookie-table th,
            .cookie-table td {
                padding: 12px 10px;
            }

            .contact-box {
                padding: 32px 24px;
            }
        }
    </style>
</head>
<body>

    <div class="bg-animation">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>

    <div class="cookie-page">
        <div class="cookie-container">

            <div class="cookie-hero">
                <h1>Cookie Policy</h1>
                <p class="cookie-meta">Last Updated: February 24, 2026</p>
            </div>

            <div class="cookie-content">

                <h2>What Are Cookies?</h2>
                <p>Cookies are small text files that are stored on your device (computer, tablet, or mobile) when you visit a website. They help websites remember your preferences and improve your browsing experience.</p>

                <div class="highlight-box">
                    <p><strong>Important:</strong> By using CrowdSpark, you consent to our use of cookies as described in this policy. You can control cookie settings through your browser.</p>
                </div>

                <h2>How We Use Cookies</h2>
                <p>CrowdSpark uses cookies for the following purposes:</p>
                <ul>
                    <li><strong>Essential Operations:</strong> To enable core functionality like login sessions and security</li>
                    <li><strong>User Preferences:</strong> To remember your settings (theme, language, etc.)</li>
                    <li><strong>Analytics:</strong> To understand how visitors use our platform</li>
                    <li><strong>Performance:</strong> To improve platform speed and reliability</li>
                    <li><strong>Security:</strong> To detect and prevent fraudulent activity</li>
                </ul>

                <h2>Types of Cookies We Use</h2>

                <table class="cookie-table">
                    <thead>
                        <tr>
                            <th>Cookie Type</th>
                            <th>Purpose</th>
                            <th>Duration</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="cookie-type type-essential">Essential</span></td>
                            <td>Required for basic platform functionality, login sessions, and security</td>
                            <td>Session / Persistent</td>
                        </tr>
                        <tr>
                            <td><span class="cookie-type type-functional">Functional</span></td>
                            <td>Remember your preferences (theme, language, settings)</td>
                            <td>Persistent (1 year)</td>
                        </tr>
                        <tr>
                            <td><span class="cookie-type type-analytics">Analytics</span></td>
                            <td>Track usage patterns to improve our services</td>
                            <td>Persistent (2 years)</td>
                        </tr>
                        <tr>
                            <td><span class="cookie-type type-marketing">Marketing</span></td>
                            <td>Deliver relevant advertisements (if applicable)</td>
                            <td>Persistent (1 year)</td>
                        </tr>
                    </tbody>
                </table>

                <h2>Specific Cookies We Use</h2>

                <h3>Essential Cookies</h3>
                <ul>
                    <li><strong>PHPSESSID:</strong> Session identifier for user login and authentication</li>
                    <li><strong>csrf_token:</strong> Cross-site request forgery protection</li>
                    <li><strong>crowdspark_secure:</strong> Security token for preventing unauthorized access</li>
                </ul>

                <h3>Functional Cookies</h3>
                <ul>
                    <li><strong>crowdspark-theme:</strong> Stores your theme preference (light/dark mode)</li>
                    <li><strong>user_preferences:</strong> Remembers your customization settings</li>
                    <li><strong>language:</strong> Stores your language preference</li>
                </ul>

                <h3>Analytics Cookies</h3>
                <ul>
                    <li><strong>_ga, _gid:</strong> Google Analytics for tracking visitor behavior</li>
                    <li><strong>analytics_session:</strong> Tracks your session for analytics purposes</li>
                </ul>

                <h2>Third-Party Cookies</h2>
                <p>We use services from trusted third parties that may also set cookies:</p>

                <ul>
                    <li><strong>Google Analytics:</strong> Website usage statistics and visitor insights</li>
                    <li><strong>Razorpay:</strong> Payment processing and fraud detection</li>
                    <li><strong>Cloudinary:</strong> Media hosting and delivery optimization</li>
                    <li><strong>Social Media:</strong> Social sharing buttons (Facebook, Twitter, etc.)</li>
                </ul>

                <p>These third parties have their own privacy and cookie policies. We recommend reviewing their policies:</p>
                <ul>
                    <li>Google Privacy Policy: policies.google.com/privacy</li>
                    <li>Razorpay Privacy Policy: razorpay.com/privacy</li>
                    <li>Cloudinary Privacy Policy: cloudinary.com/privacy</li>
                </ul>

                <h2>Managing Your Cookie Preferences</h2>

                <div class="control-box">
                    <h4><i class="fa-solid fa-sliders"></i> Browser Settings</h4>
                    <p>You can control cookies through your browser settings:</p>
                    <ul>
                        <li><strong>Chrome:</strong> Settings → Privacy and security → Cookies</li>
                        <li><strong>Firefox:</strong> Options → Privacy & Security → Cookies</li>
                        <li><strong>Safari:</strong> Preferences → Privacy → Cookies</li>
                        <li><strong>Edge:</strong> Settings → Cookies and site permissions</li>
                    </ul>
                </div>

                <div class="control-box">
                    <h4><i class="fa-solid fa-ban"></i> Blocking Cookies</h4>
                    <p>You can block or delete cookies, but please note:</p>
                    <ul>
                        <li>Some platform features may not work properly</li>
                        <li>You may need to log in repeatedly</li>
                        <li>Your preferences won't be remembered</li>
                        <li>Essential cookies are required for security</li>
                    </ul>
                </div>

                <h2>Session vs. Persistent Cookies</h2>

                <h3>Session Cookies</h3>
                <p>Temporary cookies that are deleted when you close your browser. Used for:</p>
                <ul>
                    <li>Maintaining your login session</li>
                    <li>Shopping cart functionality</li>
                    <li>Form data during submission</li>
                </ul>

                <h3>Persistent Cookies</h3>
                <p>Cookies that remain on your device until they expire or you delete them. Used for:</p>
                <ul>
                    <li>Remembering your preferences</li>
                    <li>Analytics and performance tracking</li>
                    <li>Personalization features</li>
                </ul>

                <h2>Do Not Track Signals</h2>
                <p>Some browsers support "Do Not Track" (DNT) signals. Currently, there is no industry standard for how to respond to DNT signals. We do not alter our data collection practices when we detect a DNT signal.</p>

                <h2>Mobile App Cookies</h2>
                <p>If you use our mobile app, we may use similar technologies to cookies, such as:</p>
                <ul>
                    <li>Local storage for app preferences</li>
                    <li>Device identifiers for analytics</li>
                    <li>Session tokens for authentication</li>
                </ul>

                <h2>Cookie Consent</h2>
                <p>When you first visit CrowdSpark, you'll see a cookie consent banner. You can:</p>
                <ul>
                    <li><strong>Accept All:</strong> Allow all cookies for full functionality</li>
                    <li><strong>Reject Non-Essential:</strong> Only use essential cookies</li>
                    <li><strong>Customize:</strong> Choose which types of cookies to allow</li>
                </ul>

                <h2>Updates to This Policy</h2>
                <p>We may update this Cookie Policy from time to time to reflect changes in technology or legal requirements. We'll notify you of significant changes through our platform.</p>

                <h2>More Information</h2>
                <p>For more details about how we handle your data, please review our:</p>
                <ul>
                    <li><a href="/public/privacy-policy.php" style="color: var(--accent-primary); font-weight: 700;">Privacy Policy</a></li>
                    <li><a href="/public/terms-of-service.php" style="color: var(--accent-primary); font-weight: 700;">Terms of Service</a></li>
                </ul>

                <h2>Contact Us</h2>
                <p>If you have questions about our use of cookies, contact us at:</p>
                <ul>
                    <li><strong>Email:</strong> crowdspark.business@gmail.com</li>
                    <li><strong>Support:</strong> Via Help Center or Contact page</li>
                </ul>

                <div class="contact-box">
                    <h3>Questions About Cookies?</h3>
                    <p>Our team is here to help you understand how we use cookies.</p>
                    <a href="public/contact.php" class="contact-btn">
                        <i class="fa-solid fa-envelope"></i> Contact Support
                    </a>
                </div>

            </div>

        </div>
    </div>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>

</body>
</html>