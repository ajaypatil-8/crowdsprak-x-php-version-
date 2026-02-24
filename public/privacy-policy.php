<?php
session_start();
require_once __DIR__ . "/../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - CrowdSpark</title>
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

        /* Blue accent */
        :root, [data-theme="dark"] {
            --accent-primary: #3b82f6;
            --accent-secondary: #60a5fa;
            --accent-gradient: linear-gradient(135deg, #3b82f6, #60a5fa);
            --accent-glow: rgba(59, 130, 246, 0.4);
        }

        [data-theme="dark"] {
            --orb-1: linear-gradient(45deg, #3b82f6, #60a5fa);
            --orb-2: linear-gradient(45deg, #2563eb, #3b82f6);
            --orb-3: linear-gradient(45deg, #1d4ed8, #2563eb);
        }

        [data-theme="light"] {
            --orb-1: linear-gradient(45deg, #93c5fd, #60a5fa);
            --orb-2: linear-gradient(45deg, #60a5fa, #3b82f6);
            --orb-3: linear-gradient(45deg, #3b82f6, #2563eb);
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

        .policy-page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            padding: 140px 20px 80px;
        }

        .policy-container {
            max-width: 900px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease;
        }

        .policy-hero {
            text-align: center;
            margin-bottom: 50px;
        }

        .policy-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            margin-bottom: 16px;
            background: linear-gradient(135deg, var(--text-primary), var(--accent-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .policy-meta {
            color: var(--text-tertiary);
            font-size: 14px;
            font-weight: 600;
        }

        .policy-content {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 50px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .policy-content h2 {
            font-size: 1.75rem;
            font-weight: 900;
            margin: 40px 0 20px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .policy-content h2:first-child {
            margin-top: 0;
        }

        .policy-content h2::before {
            content: '';
            width: 4px;
            height: 28px;
            background: var(--accent-gradient);
            border-radius: 2px;
        }

        .policy-content h3 {
            font-size: 1.25rem;
            font-weight: 800;
            margin: 24px 0 12px;
            color: var(--text-primary);
        }

        .policy-content p {
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 16px;
            font-size: 15px;
        }

        .policy-content ul,
        .policy-content ol {
            margin-left: 24px;
            margin-bottom: 16px;
        }

        .policy-content li {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .policy-content strong {
            color: var(--text-primary);
            font-weight: 700;
        }

        .highlight-box {
            background: rgba(59, 130, 246, 0.1);
            border-left: 4px solid var(--accent-primary);
            padding: 20px 24px;
            border-radius: 12px;
            margin: 24px 0;
        }

        .highlight-box p {
            margin-bottom: 0;
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
            .policy-page {
                padding: 120px 15px 60px;
            }

            .policy-content {
                padding: 35px 24px;
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

    <div class="policy-page">
        <div class="policy-container">

            <div class="policy-hero">
                <h1>Privacy Policy</h1>
                <p class="policy-meta">Last Updated: February 24, 2026</p>
            </div>

            <div class="policy-content">

                <h2>Introduction</h2>
                <p>Welcome to CrowdSpark. We respect your privacy and are committed to protecting your personal data. This privacy policy explains how we collect, use, store, and protect your information when you use our crowdfunding platform.</p>

                <div class="highlight-box">
                    <p><strong>Important:</strong> By using CrowdSpark, you agree to the collection and use of information in accordance with this policy. If you do not agree with our policies and practices, please do not use our services.</p>
                </div>

                <h2>Information We Collect</h2>

                <h3>1. Information You Provide</h3>
                <ul>
                    <li><strong>Account Information:</strong> Name, email address, password, phone number, and profile picture</li>
                    <li><strong>Campaign Information:</strong> Campaign titles, descriptions, goals, stories, and media uploads</li>
                    <li><strong>Payment Information:</strong> We use Razorpay for payment processing. We do not store your full credit card details on our servers</li>
                    <li><strong>Communication Data:</strong> Messages, comments, updates, and correspondence with us or other users</li>
                    <li><strong>Identity Verification:</strong> Government-issued ID, proof of address (for campaign creators)</li>
                </ul>

                <h3>2. Information Collected Automatically</h3>
                <ul>
                    <li><strong>Usage Data:</strong> Pages visited, time spent, clicks, campaign views</li>
                    <li><strong>Device Information:</strong> IP address, browser type, operating system, device identifiers</li>
                    <li><strong>Location Data:</strong> Approximate location based on IP address</li>
                    <li><strong>Cookies and Tracking:</strong> See our Cookie Policy for details</li>
                </ul>

                <h2>How We Use Your Information</h2>
                <p>We use your personal information for the following purposes:</p>
                <ul>
                    <li><strong>Service Provision:</strong> To create and manage your account, process donations, and facilitate campaigns</li>
                    <li><strong>Payment Processing:</strong> To process transactions securely through our payment partners</li>
                    <li><strong>Communication:</strong> To send you updates, notifications, and important information about your account</li>
                    <li><strong>Platform Improvement:</strong> To analyze usage patterns and improve our services</li>
                    <li><strong>Security:</strong> To detect and prevent fraud, abuse, and illegal activities</li>
                    <li><strong>Legal Compliance:</strong> To comply with legal obligations and respond to legal requests</li>
                    <li><strong>Marketing:</strong> To send promotional materials (you can opt-out anytime)</li>
                </ul>

                <h2>How We Share Your Information</h2>
                <p>We do not sell your personal information. We may share your data with:</p>

                <h3>1. Service Providers</h3>
                <ul>
                    <li><strong>Payment Processors:</strong> Razorpay for secure payment processing</li>
                    <li><strong>Cloud Storage:</strong> Cloudinary for media hosting</li>
                    <li><strong>Email Services:</strong> For sending transactional and marketing emails</li>
                    <li><strong>Analytics:</strong> To understand platform usage and improve services</li>
                </ul>

                <h3>2. Public Information</h3>
                <ul>
                    <li>Campaign titles, descriptions, goals, and updates are publicly visible</li>
                    <li>Your name and profile picture may be visible on campaigns you create or support</li>
                    <li>Donation amounts may be visible to campaign creators and other donors</li>
                </ul>

                <h3>3. Legal Requirements</h3>
                <p>We may disclose your information if required by law, court order, or to protect our rights and safety.</p>

                <h2>Data Security</h2>
                <p>We implement industry-standard security measures to protect your data:</p>
                <ul>
                    <li><strong>Encryption:</strong> All data transmission is encrypted using SSL/TLS</li>
                    <li><strong>Secure Storage:</strong> Passwords are hashed using bcrypt</li>
                    <li><strong>Access Controls:</strong> Limited employee access to personal data</li>
                    <li><strong>Regular Audits:</strong> Security assessments and vulnerability testing</li>
                    <li><strong>Payment Security:</strong> PCI-DSS compliant payment processing</li>
                </ul>

                <h2>Your Rights and Choices</h2>
                <p>You have the following rights regarding your personal data:</p>
                <ul>
                    <li><strong>Access:</strong> Request a copy of your personal data</li>
                    <li><strong>Correction:</strong> Update or correct inaccurate information</li>
                    <li><strong>Deletion:</strong> Request deletion of your account and data</li>
                    <li><strong>Opt-Out:</strong> Unsubscribe from marketing emails</li>
                    <li><strong>Data Portability:</strong> Export your data in a structured format</li>
                    <li><strong>Withdrawal of Consent:</strong> Withdraw consent for data processing</li>
                </ul>

                <h2>Data Retention</h2>
                <p>We retain your personal information for as long as necessary to:</p>
                <ul>
                    <li>Provide our services to you</li>
                    <li>Comply with legal obligations (e.g., tax records for 7 years)</li>
                    <li>Resolve disputes and enforce agreements</li>
                    <li>Prevent fraud and abuse</li>
                </ul>
                <p>After you delete your account, we may retain certain information for legal and security purposes.</p>

                <h2>Children's Privacy</h2>
                <p>CrowdSpark is not intended for users under 18 years of age. We do not knowingly collect personal information from children. If you believe we have collected data from a child, please contact us immediately.</p>

                <h2>International Data Transfers</h2>
                <p>Your information may be transferred to and stored on servers located outside your country of residence. We ensure appropriate safeguards are in place to protect your data in accordance with this policy.</p>

                <h2>Third-Party Links</h2>
                <p>Our platform may contain links to external websites. We are not responsible for the privacy practices of these third-party sites. Please review their privacy policies.</p>

                <h2>Changes to This Policy</h2>
                <p>We may update this privacy policy from time to time. We will notify you of significant changes via email or a prominent notice on our platform. Your continued use of CrowdSpark after changes constitute acceptance of the updated policy.</p>

                <h2>Contact Us</h2>
                <p>If you have questions or concerns about this privacy policy or our data practices, please contact us:</p>
                <ul>
                    <li><strong>Email:</strong> crowdspark.business@gmail.com</li>
                    <li><strong>Support:</strong> Via our Help Center or Contact page</li>
                    <li><strong>Mail:</strong> CrowdSpark Privacy Team, crowdspark.business@gmail.com</li>
                </ul>

                <div class="contact-box">
                    <h3>Questions About Privacy?</h3>
                    <p>Our team is here to help you understand how we protect your data.</p>
                    <a href="/public/contact.php" class="contact-btn">
                        <i class="fa-solid fa-envelope"></i> Contact Support
                    </a>
                </div>

            </div>

        </div>
    </div>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>

</body>
</html>