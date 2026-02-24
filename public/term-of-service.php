<?php
session_start();
require_once __DIR__ . "/../includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service - CrowdSpark</title>
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

        /* Indigo accent */
        :root, [data-theme="dark"] {
            --accent-primary: #6366f1;
            --accent-secondary: #818cf8;
            --accent-gradient: linear-gradient(135deg, #6366f1, #818cf8);
            --accent-glow: rgba(99, 102, 241, 0.4);
        }

        [data-theme="dark"] {
            --orb-1: linear-gradient(45deg, #6366f1, #818cf8);
            --orb-2: linear-gradient(45deg, #4f46e5, #6366f1);
            --orb-3: linear-gradient(45deg, #4338ca, #4f46e5);
        }

        [data-theme="light"] {
            --orb-1: linear-gradient(45deg, #a5b4fc, #818cf8);
            --orb-2: linear-gradient(45deg, #818cf8, #6366f1);
            --orb-3: linear-gradient(45deg, #6366f1, #4f46e5);
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

        .terms-page {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            padding: 140px 20px 80px;
        }

        .terms-container {
            max-width: 900px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease;
        }

        .terms-hero {
            text-align: center;
            margin-bottom: 50px;
        }

        .terms-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 900;
            margin-bottom: 16px;
            background: linear-gradient(135deg, var(--text-primary), var(--accent-primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .terms-meta {
            color: var(--text-tertiary);
            font-size: 14px;
            font-weight: 600;
        }

        .terms-content {
            background: var(--bg-card);
            backdrop-filter: blur(20px);
            border: 1px solid var(--border-color);
            border-radius: 24px;
            padding: 50px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
        }

        .terms-content h2 {
            font-size: 1.75rem;
            font-weight: 900;
            margin: 40px 0 20px;
            color: var(--text-primary);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .terms-content h2:first-child {
            margin-top: 0;
        }

        .terms-content h2::before {
            content: '';
            width: 4px;
            height: 28px;
            background: var(--accent-gradient);
            border-radius: 2px;
        }

        .terms-content h3 {
            font-size: 1.25rem;
            font-weight: 800;
            margin: 24px 0 12px;
            color: var(--text-primary);
        }

        .terms-content p {
            line-height: 1.8;
            color: var(--text-secondary);
            margin-bottom: 16px;
            font-size: 15px;
        }

        .terms-content ul,
        .terms-content ol {
            margin-left: 24px;
            margin-bottom: 16px;
        }

        .terms-content li {
            color: var(--text-secondary);
            line-height: 1.8;
            margin-bottom: 10px;
        }

        .terms-content strong {
            color: var(--text-primary);
            font-weight: 700;
        }

        .highlight-box {
            background: rgba(99, 102, 241, 0.1);
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
            .terms-page {
                padding: 120px 15px 60px;
            }

            .terms-content {
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

    <div class="terms-page">
        <div class="terms-container">

            <div class="terms-hero">
                <h1>Terms of Service</h1>
                <p class="terms-meta">Last Updated: February 24, 2026</p>
            </div>

            <div class="terms-content">

                <h2>Agreement to Terms</h2>
                <p>By accessing and using CrowdSpark ("the Platform", "we", "us", "our"), you agree to be bound by these Terms of Service. If you disagree with any part of these terms, you may not access the service.</p>

                <div class="highlight-box">
                    <p><strong>Important:</strong> These terms constitute a legally binding agreement between you and CrowdSpark. Please read them carefully.</p>
                </div>

                <h2>Eligibility</h2>
                <p>To use CrowdSpark, you must:</p>
                <ul>
                    <li>Be at least 18 years of age</li>
                    <li>Have the legal capacity to enter into a binding contract</li>
                    <li>Not be prohibited from using the service under applicable laws</li>
                    <li>Provide accurate and complete registration information</li>
                </ul>

                <h2>User Accounts</h2>

                <h3>Account Registration</h3>
                <ul>
                    <li>You must create an account to use certain features</li>
                    <li>You are responsible for maintaining the security of your account</li>
                    <li>You must notify us immediately of any unauthorized access</li>
                    <li>You are responsible for all activities under your account</li>
                </ul>

                <h3>Account Termination</h3>
                <p>We reserve the right to suspend or terminate your account if you violate these terms or engage in fraudulent, illegal, or harmful activities.</p>

                <h2>Campaigns</h2>

                <h3>Creating Campaigns</h3>
                <p>When creating a campaign, you agree to:</p>
                <ul>
                    <li>Provide truthful and accurate information</li>
                    <li>Not misrepresent the purpose or use of funds</li>
                    <li>Comply with all applicable laws and regulations</li>
                    <li>Use funds solely for the stated campaign purpose</li>
                    <li>Provide regular updates to donors</li>
                </ul>

                <h3>Prohibited Campaign Content</h3>
                <p>Campaigns must not involve:</p>
                <ul>
                    <li>Illegal activities, products, or services</li>
                    <li>Fraudulent, deceptive, or misleading content</li>
                    <li>Weapons, drugs, or controlled substances</li>
                    <li>Hate speech, violence, or discrimination</li>
                    <li>Adult content or services</li>
                    <li>Pyramid schemes or multi-level marketing</li>
                    <li>Gambling or betting activities</li>
                    <li>Political campaigns (without proper authorization)</li>
                </ul>

                <h3>Campaign Review</h3>
                <ul>
                    <li>All campaigns are subject to review before approval</li>
                    <li>We reserve the right to reject or remove any campaign</li>
                    <li>Approval does not guarantee campaign success or verify claims</li>
                </ul>

                <h2>Donations</h2>

                <h3>Making Donations</h3>
                <ul>
                    <li>All donations are voluntary and made at your own risk</li>
                    <li>Donations are final and generally non-refundable</li>
                    <li>You are responsible for verifying campaign legitimacy</li>
                    <li>We do not guarantee campaign outcomes or fund usage</li>
                </ul>

                <h3>Payment Processing</h3>
                <ul>
                    <li>Payments are processed through Razorpay</li>
                    <li>You agree to Razorpay's terms and conditions</li>
                    <li>Standard payment processing fees apply</li>
                </ul>

                <h2>Fees and Payments</h2>
                <p>CrowdSpark charges the following fees:</p>
                <ul>
                    <li><strong>Platform Fee:</strong> [X]% of funds raised</li>
                    <li><strong>Payment Processing Fee:</strong> As charged by payment processor</li>
                    <li>Fees are automatically deducted from donations</li>
                    <li>Fee structure may change with 30 days notice</li>
                </ul>

                <h2>Fund Disbursement</h2>
                <ul>
                    <li>Funds are transferred to verified bank accounts</li>
                    <li>Campaign creators must complete identity verification</li>
                    <li>We may hold funds pending verification or investigation</li>
                    <li>Transfer timelines depend on payment processing and verification</li>
                </ul>

                <h2>Intellectual Property</h2>

                <h3>Platform Content</h3>
                <p>All platform content, including logos, designs, text, and code, is owned by CrowdSpark and protected by intellectual property laws.</p>

                <h3>User Content</h3>
                <p>By posting content, you grant us a worldwide, non-exclusive, royalty-free license to use, display, and distribute your content on our platform.</p>
                <p>You retain ownership of your content and are responsible for ensuring you have rights to all content you post.</p>

                <h2>Prohibited Activities</h2>
                <p>You may not:</p>
                <ul>
                    <li>Use the platform for illegal purposes</li>
                    <li>Impersonate others or provide false information</li>
                    <li>Harass, threaten, or harm other users</li>
                    <li>Attempt to hack, disrupt, or compromise platform security</li>
                    <li>Use bots, scrapers, or automated tools</li>
                    <li>Post spam, malware, or malicious content</li>
                    <li>Manipulate donation amounts or campaign rankings</li>
                    <li>Create duplicate accounts to circumvent restrictions</li>
                </ul>

                <h2>Disclaimers</h2>

                <h3>No Guarantee</h3>
                <p>We do not guarantee:</p>
                <ul>
                    <li>Campaign success or funding goals will be met</li>
                    <li>Accuracy of campaign information</li>
                    <li>Proper use of funds by campaign creators</li>
                    <li>Availability or reliability of the platform</li>
                </ul>

                <h3>No Endorsement</h3>
                <p>Listing a campaign does not constitute our endorsement or verification of its legitimacy.</p>

                <h2>Limitation of Liability</h2>
                <p>To the maximum extent permitted by law:</p>
                <ul>
                    <li>We are not liable for any indirect, incidental, or consequential damages</li>
                    <li>Our total liability is limited to the amount you paid in fees</li>
                    <li>We are not responsible for user conduct or campaign outcomes</li>
                    <li>You use the platform at your own risk</li>
                </ul>

                <h2>Indemnification</h2>
                <p>You agree to indemnify and hold CrowdSpark harmless from any claims, damages, or expenses arising from:</p>
                <ul>
                    <li>Your violation of these terms</li>
                    <li>Your use of the platform</li>
                    <li>Content you post or campaigns you create</li>
                    <li>Violation of any third-party rights</li>
                </ul>

                <h2>Dispute Resolution</h2>
                <ul>
                    <li>Disputes should first be resolved through our support team</li>
                    <li>If unresolved, disputes will be handled through binding arbitration</li>
                    <li>You waive the right to participate in class action lawsuits</li>
                    <li>Arbitration will be conducted under [Jurisdiction] law</li>
                </ul>

                <h2>Governing Law</h2>
                <p>These terms are governed by the laws of [Your Jurisdiction], without regard to conflict of law principles.</p>

                <h2>Changes to Terms</h2>
                <p>We may modify these terms at any time. We will notify users of material changes via email or platform notice. Continued use after changes constitutes acceptance of new terms.</p>

                <h2>Severability</h2>
                <p>If any provision of these terms is found to be unenforceable, the remaining provisions will remain in full effect.</p>

                <h2>Contact Information</h2>
                <p>For questions about these terms, contact us at:</p>
                <ul>
                    <li><strong>Email:</strong> crowdspark.business@gmail.com</li>
                    <li><strong>Support:</strong> Via Help Center or Contact page</li>
                    <li><strong>Mail:</strong> CrowdSpark Legal Team, crowdspark.business@gmail.com</li>
                </ul>

                <div class="contact-box">
                    <h3>Questions About Our Terms?</h3>
                    <p>Our team is available to clarify any questions you may have.</p>
                    <a href="/public/contact.php" class="contact-btn">
                        <i class="fa-solid fa-envelope"></i> Contact Us
                    </a>
                </div>

            </div>

        </div>
    </div>

    <?php require_once __DIR__ . "/../includes/footer.php"; ?>

</body>
</html>