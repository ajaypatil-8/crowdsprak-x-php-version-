<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current = basename($_SERVER['PHP_SELF']);

// Determine current page theme
$pageTheme = 'orange'; // default
if (strpos($current, 'explore') !== false || strpos($current, 'campaign') !== false) {
    $pageTheme = 'cyan';
} elseif (strpos($current, 'about') !== false) {
    $pageTheme = 'purple';
}
?>


<html lang="en" data-theme="light" data-page="<?= $pageTheme ?>">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CrowdSpark - Support Dreams, Change Lives</title>

<link rel="icon" href="/favicon.ico">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>

/* ===== THEME VARIABLES ===== */
:root {
    --bg-primary: #fafafa;
    --bg-card: rgba(255, 255, 255, 0.95);
    --bg-card-solid: #ffffff;
    --bg-hover: #fff7ed;
    --bg-secondary: #f1f5f9;
    
    --text-primary: #0f172a;
    --text-secondary: #64748b;
    --text-tertiary: #94a3b8;
    
    --border-color: rgba(15, 23, 42, 0.08);
    --border-hover: rgba(245, 158, 11, 0.2);
    
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);
    --shadow-md: 0 8px 32px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.15);
    
    --overlay-bg: rgba(0, 0, 0, 0.4);
}

[data-theme="dark"] {
    --bg-primary: #0f0f0f;
    --bg-card: rgba(20, 20, 30, 0.95);
    --bg-card-solid: #1a1a1a;
    --bg-hover: rgba(245, 158, 11, 0.1);
    --bg-secondary: rgba(30, 30, 40, 0.8);
    
    --text-primary: #ffffff;
    --text-secondary: #cbd5e1;
    --text-tertiary: #94a3b8;
    
    --border-color: rgba(255, 255, 255, 0.1);
    --border-hover: rgba(245, 158, 11, 0.3);
    
    --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.3);
    --shadow-md: 0 8px 32px rgba(0, 0, 0, 0.4);
    --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.6);
    
    --overlay-bg: rgba(0, 0, 0, 0.7);
}

/* PAGE-SPECIFIC ACCENT COLORS */
[data-page="orange"] {
    --accent-primary: #f59e0b;
    --accent-secondary: #fb923c;
    --accent-gradient: linear-gradient(135deg, #f59e0b, #fb923c);
}

[data-page="cyan"] {
    --accent-primary: #06b6d4;
    --accent-secondary: #14b8a6;
    --accent-gradient: linear-gradient(135deg, #06b6d4, #14b8a6);
}

[data-page="purple"] {
    --accent-primary: #8b5cf6;
    --accent-secondary: #3b82f6;
    --accent-gradient: linear-gradient(135deg, #8b5cf6, #3b82f6);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    overflow-x: hidden;
    scroll-behavior: smooth;
}

body {
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    background: var(--bg-primary);
    color: var(--text-primary);
    padding-top: 100px;
    -webkit-font-smoothing: antialiased;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* ===== NAVBAR ===== */
.nav-wrap {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    display: flex;
    justify-content: center;
    z-index: 999;
    padding: 20px 16px;
    animation: slideDown 0.5s ease;
}

@keyframes slideDown {
    from { transform: translateY(-100px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.navbar {
    max-width: 1180px;
    width: 100%;
    height: 68px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 32px;
    border-radius: 999px;
    background: var(--bg-card);
    backdrop-filter: blur(20px) saturate(180%);
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border-color);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    position: relative;
    overflow: hidden;
}

.navbar.scrolled {
    height: 60px;
    box-shadow: var(--shadow-lg);
}

/* Logo */
.logo {
    font-weight: 900;
    font-size: 22px;
    text-decoration: none;
    color: var(--text-primary);
    display: flex;
    align-items: center;
    transition: transform 0.3s ease;
}

.logo:hover {
    transform: scale(1.05);
}

.logo-icon {
    font-size: 26px;
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: pulse 2s ease infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.logo span {
    background: var(--accent-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Nav Links */
.nav-links {
    display: flex;
    align-items: center;
    gap: 8px;
    list-style: none;
}

.nav-links a {
    position: relative;
    padding: 10px 18px;
    border-radius: 999px;
    text-decoration: none;
    font-size: 14px;
    font-weight: 600;
    color: var(--text-secondary);
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    display: flex;
    align-items: center;
    gap: 6px;
}

.nav-links a:hover {
    color: var(--accent-primary);
    transform: translateY(-2px);
}

/* Active page - uses current page color */
.nav-links a.active {
    background: var(--accent-gradient);
    color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.nav-links a.active:hover {
    transform: translateY(-2px) scale(1.05);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

/* Right Section */
.nav-right {
    display: flex;
    align-items: center;
    gap: 12px;
}

/* Buttons */
.btn-nav {
    padding: 10px 20px;
    border-radius: 999px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-login {
    border: 2px solid var(--accent-primary);
    color: var(--accent-primary);
    background: transparent;
}

.btn-login:hover {
    background: var(--accent-primary);
    color: #fff;
    transform: translateY(-2px);
}

.btn-creator {
    background: var(--accent-gradient);
    color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.btn-creator:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
}

/* Theme Toggle */
.theme-btn {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    border: 2px solid var(--border-color);
    cursor: pointer;
    background: var(--bg-card-solid);
    color: var(--accent-primary);
    font-size: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
}

.theme-btn:hover {
    transform: scale(1.1) rotate(20deg);
    border-color: var(--accent-primary);
}

[data-theme="light"] .theme-btn .fa-moon { display: block; }
[data-theme="light"] .theme-btn .fa-sun { display: none; }
[data-theme="dark"] .theme-btn .fa-moon { display: none; }
[data-theme="dark"] .theme-btn .fa-sun { display: block; }

/* Avatar */
.avatar {
    width: 42px;
    height: 42px;
    border-radius: 50%;
    background: var(--accent-gradient);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-weight: 800;
    cursor: pointer;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    transition: all 0.3s ease;
}

.avatar:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
}

.avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* ===== OVERLAY ===== */
.profile-overlay {
    position: fixed;
    inset: 0;
    background: var(--overlay-bg);
    backdrop-filter: blur(8px);
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.4s ease;
    z-index: 998;
}

.profile-overlay.active {
    opacity: 1;
    pointer-events: auto;
}

/* ===== SIDEBAR ===== */
.profile-sidebar {
    position: fixed;
    top: 0;
    right: -450px;
    width: 420px;
    height: 100vh;
    background: var(--bg-card);
    backdrop-filter: blur(40px) saturate(180%);
    box-shadow: -20px 0 80px rgba(0, 0, 0, 0.3);
    transition: right 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    z-index: 999;
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

.profile-sidebar.active {
    right: 0;
}

/* Close Button */
.sidebar-close {
    position: absolute;
    top: 24px;
    right: 24px;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--bg-secondary);
    backdrop-filter: blur(10px);
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: var(--text-secondary);
    transition: all 0.3s ease;
    z-index: 10;
    box-shadow: var(--shadow-sm);
}

.sidebar-close:hover {
    background: #ef4444;
    color: #fff;
    transform: rotate(90deg) scale(1.1);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
}

/* Sidebar Header */
.sidebar-header {
    padding: 50px 30px 30px;
    background: var(--accent-gradient);
    position: relative;
    overflow: hidden;
}

.sidebar-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%);
    animation: float 6s ease-in-out infinite;
}

.sidebar-header::after {
    content: '';
    position: absolute;
    bottom: -50%;
    left: -20%;
    width: 250px;
    height: 250px;
    background: radial-gradient(circle, rgba(255,255,255,0.1), transparent 70%);
    animation: float 8s ease-in-out infinite reverse;
}

@keyframes float {
    0%, 100% { transform: translate(0, 0); }
    50% { transform: translate(20px, 20px); }
}

/* Profile Content */
.sidebar-profile {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    position: relative;
    z-index: 1;
}

.sidebar-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #fff;
    color: var(--accent-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 42px;
    font-weight: 900;
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    border: 4px solid rgba(255, 255, 255, 0.3);
    animation: scaleIn 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    margin-bottom: 20px;
    /* pulse ring animation */
    position: relative;
}

.sidebar-avatar::after {
    content: '';
    position: absolute;
    inset: -6px;
    border-radius: 50%;
    border: 2.5px solid rgba(255, 255, 255, 0.5);
    animation: ringPulse 2.5s ease-in-out infinite;
    pointer-events: none;
}

@keyframes ringPulse {
    0%   { transform: scale(1);    opacity: 0.7; }
    50%  { transform: scale(1.1);  opacity: 0.25; }
    100% { transform: scale(1);    opacity: 0.7; }
}

@keyframes scaleIn {
    from { transform: scale(0); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.sidebar-avatar img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.sidebar-user-info h4 {
    color: #fff;
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 8px;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    animation: slideUp 0.5s ease 0.1s both;
}

@keyframes slideUp {
    from { transform: translateY(20px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}

.sidebar-user-info p {
    color: rgba(255, 255, 255, 0.95);
    font-size: 14px;
    font-weight: 600;
    text-transform: capitalize;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    padding: 6px 16px;
    border-radius: 999px;
    display: inline-block;
    animation: slideUp 0.5s ease 0.2s both;
    /* shimmer sweep on the role badge */
    position: relative;
    overflow: hidden;
}

.sidebar-user-info p::after {
    content: '';
    position: absolute;
    top: 0; left: -100%;
    width: 60%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.35), transparent);
    animation: badgeShimmer 3s ease-in-out infinite;
    pointer-events: none;
}

@keyframes badgeShimmer {
    0%   { left: -100%; }
    50%  { left: 140%; }
    100% { left: 140%; }
}

/* Scrollable Content */
.sidebar-content {
    flex: 1;
    overflow-y: auto;
    padding: 24px;
}

.sidebar-content::-webkit-scrollbar { width: 6px; }
.sidebar-content::-webkit-scrollbar-track { background: transparent; }
.sidebar-content::-webkit-scrollbar-thumb {
    background: var(--border-color);
    border-radius: 10px;
}
.sidebar-content::-webkit-scrollbar-thumb:hover {
    background: var(--accent-primary);
}

/* ===== SIDEBAR LINKS — enhanced animations, outlines, effects ===== */
.sidebar-links {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

/* Stagger-in animation when sidebar opens */
.profile-sidebar.active .sidebar-links a {
    animation: linkSlideIn 0.4s cubic-bezier(0.22, 1, 0.36, 1) both;
}
.profile-sidebar.active .sidebar-links a:nth-child(1) { animation-delay: 0.06s; }
.profile-sidebar.active .sidebar-links a:nth-child(2) { animation-delay: 0.12s; }
.profile-sidebar.active .sidebar-links a:nth-child(3) { animation-delay: 0.18s; }
.profile-sidebar.active .sidebar-links a:nth-child(4) { animation-delay: 0.24s; }
.profile-sidebar.active .sidebar-links a:nth-child(5) { animation-delay: 0.30s; }
.profile-sidebar.active .sidebar-links a:nth-child(6) { animation-delay: 0.36s; }

@keyframes linkSlideIn {
    from { opacity: 0; transform: translateX(24px); }
    to   { opacity: 1; transform: translateX(0); }
}

.sidebar-links a {
    text-decoration: none;
    color: var(--text-primary);
    padding: 14px 18px;
    border-radius: 14px;
    font-weight: 600;
    font-size: 15px;
    /* outlined border always visible, subtle */
    border: 1.5px solid var(--border-color);
    background: transparent;
    transition:
        background   0.28s ease,
        color        0.28s ease,
        border-color 0.28s ease,
        transform    0.28s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow   0.28s ease,
        padding-left 0.28s ease;
    display: flex;
    align-items: center;
    gap: 14px;
    position: relative;
    overflow: hidden;
}

/* Gradient left-bar indicator */
.sidebar-links a::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 4px;
    background: var(--accent-gradient);
    border-radius: 0 4px 4px 0;
    transform: scaleY(0);
    transform-origin: center;
    transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Shine sweep on hover */
.sidebar-links a::after {
    content: '';
    position: absolute;
    top: 0; left: -80%;
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.12), transparent);
    transform: skewX(-20deg);
    transition: left 0.5s ease;
    pointer-events: none;
}

.sidebar-links a:hover {
    background: var(--bg-hover);
    color: var(--accent-primary);
    border-color: var(--accent-primary);
    transform: translateX(6px) scale(1.015);
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.08),
                inset 0 0 0 1px rgba(245, 158, 11, 0.15);
    padding-left: 24px;
}

.sidebar-links a:hover::before {
    transform: scaleY(1);
}

.sidebar-links a:hover::after {
    left: 130%;
}

/* Active press */
.sidebar-links a:active {
    transform: translateX(4px) scale(0.98);
    box-shadow: none;
}

/* Icon */
.sidebar-links a i {
    font-size: 18px;
    width: 24px;
    flex-shrink: 0;
    transition:
        transform  0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
        color      0.28s ease,
        filter     0.28s ease;
}

.sidebar-links a:hover i {
    transform: scale(1.25) rotate(-6deg);
    filter: drop-shadow(0 0 5px var(--accent-primary));
}

/* ===== THEME TOGGLE ===== */
.sidebar-theme-toggle {
    margin: 20px 0;
    padding: 18px 20px;
    background: var(--bg-secondary);
    backdrop-filter: blur(10px);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border: 1.5px solid var(--border-color);
    cursor: pointer;
    transition:
        border-color 0.28s ease,
        background   0.28s ease,
        transform    0.28s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow   0.28s ease;
}

.sidebar-theme-toggle:hover {
    border-color: var(--accent-primary);
    background: var(--bg-hover);
    transform: scale(1.025);
    box-shadow: 0 4px 18px rgba(0, 0, 0, 0.07),
                inset 0 0 0 1px rgba(245, 158, 11, 0.1);
}

.sidebar-theme-info {
    display: flex;
    align-items: center;
    gap: 12px;
    color: var(--text-primary);
    font-weight: 600;
    font-size: 15px;
}

.sidebar-theme-info i {
    font-size: 20px;
    color: var(--accent-primary);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.sidebar-theme-toggle:hover .sidebar-theme-info i {
    transform: rotate(30deg) scale(1.2);
}

.theme-switch {
    width: 56px;
    height: 30px;
    background: #cbd5e1;
    border-radius: 999px;
    position: relative;
    cursor: pointer;
    transition: background 0.3s ease, box-shadow 0.3s ease;
}

.sidebar-theme-toggle:hover .theme-switch {
    box-shadow: 0 0 0 3px rgba(245, 158, 11, 0.2);
}

.theme-switch::before {
    content: "";
    position: absolute;
    top: 3px;
    left: 3px;
    width: 24px;
    height: 24px;
    background: #fff;
    border-radius: 50%;
    transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

[data-theme="dark"] .theme-switch {
    background: var(--accent-gradient);
}

[data-theme="dark"] .theme-switch::before {
    left: 29px;
}

/* ===== LOGOUT BUTTON ===== */
.logout-btn {
    margin: 20px 0;
    padding: 18px;
    text-align: center;
    background: linear-gradient(135deg, #ef4444, #dc2626);
    color: #fff;
    border-radius: 14px;
    text-decoration: none;
    font-weight: 700;
    font-size: 16px;
    border: 1.5px solid transparent;
    transition:
        background   0.3s ease,
        transform    0.3s cubic-bezier(0.34, 1.56, 0.64, 1),
        box-shadow   0.3s ease,
        border-color 0.3s ease;
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    position: relative;
    overflow: hidden;
}

/* Shine sweep on logout hover */
.logout-btn::after {
    content: '';
    position: absolute;
    top: 0; left: -80%;
    width: 50%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transform: skewX(-20deg);
    transition: left 0.5s ease;
    pointer-events: none;
}

.logout-btn:hover {
    background: linear-gradient(135deg, #dc2626, #b91c1c);
    transform: translateY(-2px) scale(1.02);
    box-shadow: 0 10px 30px rgba(239, 68, 68, 0.45);
    border-color: rgba(239, 68, 68, 0.4);
}

.logout-btn:hover::after {
    left: 130%;
}

.logout-btn:active {
    transform: translateY(0) scale(0.99);
    box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
}

.logout-btn i {
    font-size: 18px;
    transition: transform 0.35s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.logout-btn:hover i {
    transform: translateX(5px) rotate(-8deg);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 968px) {
    .nav-links {
        display: none;
    }
    
    .navbar {
        padding: 0 20px;
    }
    
    .profile-sidebar {
        width: 100%;
        right: -100%;
    }
}

@media (max-width: 480px) {
    .navbar {
        height: 60px;
        padding: 0 16px;
    }
    
    .logo {
        font-size: 18px;
    }
    
    .btn-nav {
        padding: 8px 14px;
        font-size: 13px;
    }
    
    .theme-btn {
        width: 38px;
        height: 38px;
        font-size: 16px;
    }
    
    .sidebar-avatar {
        width: 80px;
        height: 80px;
        font-size: 36px;
    }
    
    .sidebar-user-info h4 {
        font-size: 20px;
    }
}

</style>


<!-- NAVBAR — unchanged -->
<div class="nav-wrap">
    <nav class="navbar" id="navbar">
        
        <a href="/index.php" class="logo">
            <span class="logo-icon">✨</span>
            Crowd<span>Spark</span>
        </a>

        <div class="nav-links">
            <a class="<?= $current=='index.php'?'active':'' ?>" href="/index.php">
                <i class="fa-solid fa-house"></i> Home
            </a>

            <a class="<?= (strpos($current, 'explore') !== false || strpos($current, 'campaign') !== false)?'active':'' ?>" href = "/public/explore-campaigns.php">
                <i class="fa-solid fa-layer-group"></i> Projects
            </a>

            <a class="<?= $current=='about.php'?'active':'' ?>" href="/public/about.php">
                <i class="fa-solid fa-circle-info"></i> About
            </a>

            <a class="<?= $current=='contact.php'?'active':'' ?>" href="/public/contact.php">
                <i class="fa-solid fa-phone"></i> Contact
            </a>
        </div>

        <div class="nav-right">
            
            <button class="theme-btn" onclick="toggleTheme()" title="Toggle theme">
                <i class="fa-solid fa-moon"></i>
                <i class="fa-solid fa-sun"></i>
            </button>

            <?php if(!isset($_SESSION['user_id'])): ?>

                <a href = "/user/login.php" class="btn-nav btn-login">
                    <i class="fa-solid fa-sign-in"></i> Login
                </a>
                <a href = "/user/becomecreator.php" class="btn-nav btn-creator">
                    <i class="fa-solid fa-rocket"></i> Start Project
                </a>

            <?php else: ?>

                <?php if($_SESSION['role']=="creator"): ?>
                    <a href="/creator/create-campaign.php" class="btn-nav btn-creator">
                        <i class="fa-solid fa-plus"></i> New Campaign
                    </a>
                <?php elseif($_SESSION['role']=="admin"): ?>
                    <a href="/admin/admin-dashboard.php" class="btn-nav btn-creator">
                        <i class="fa-solid fa-shield"></i> Admin
                    </a>
                <?php else: ?>
                    <a href="/user/becomecreator.php" class="btn-nav btn-creator">
                        <i class="fa-solid fa-star"></i> Become Creator
                    </a>
                <?php endif; ?>

                <div class="avatar" onclick="openSidebar()">
                    <?php if(!empty($_SESSION['profile_image'])): ?>
                        <img src="<?= $_SESSION['profile_image'] ?>" alt="Profile">
                    <?php else: ?>
                        <?= strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                    <?php endif; ?>
                </div>

            <?php endif; ?>

        </div>
    </nav>
</div>

<!-- GLASSMORPHIC SIDEBAR — unchanged HTML, enhanced CSS only -->
<?php if(isset($_SESSION['user_id'])): ?>

<div id="overlay" class="profile-overlay" onclick="closeSidebar()"></div>

<div id="sidebar" class="profile-sidebar">
    
    <button class="sidebar-close" onclick="closeSidebar()">
        <i class="fa-solid fa-times"></i>
    </button>

    <div class="sidebar-header">
        <div class="sidebar-profile">
            <div class="sidebar-avatar">
                <?php if(!empty($_SESSION['profile_image'])): ?>
                    <img src="<?= $_SESSION['profile_image'] ?>" alt="Profile">
                <?php else: ?>
                    <?= strtoupper(substr($_SESSION['name'], 0, 1)); ?>
                <?php endif; ?>
            </div>

            <div class="sidebar-user-info">
                <h4><?= htmlspecialchars($_SESSION['name']); ?></h4>
                <p><?= ucfirst($_SESSION['role']); ?></p>
            </div>
        </div>
    </div>

    <div class="sidebar-content">
        <div class="sidebar-links">

            <?php if($_SESSION['role']=="admin"): ?>
                <a href = "/admin/admin-dashboard.php">
                    <i class="fa-solid fa-shield"></i> Admin Dashboard
                </a>
            <?php endif; ?>

            <?php if($_SESSION['role']=="creator"): ?>
                <a href="/creator/creator-dashboard.php">
                    <i class="fa-solid fa-chart-line"></i> Creator Dashboard
                </a>
                <a href="/creator/my-campaigns.php">
                    <i class="fa-solid fa-layer-group"></i> My Campaigns
                </a>
            <?php endif; ?>

            <a href="/dashboard/user-dashboard.php">
                <i class="fa-solid fa-user"></i> My Dashboard
            </a>
            <a href="/dashboard/edit-profile.php">
                <i class="fa-solid fa-pen"></i> Edit Profile
            </a>
            <a href="/dashboard/change-password.php">
                <i class="fa-solid fa-lock"></i> Change Password
            </a>
            <a href="/dashboard/my-donations.php">
                <i class="fa-solid fa-heart"></i> My Donations
            </a>

        </div>

        <div class="sidebar-theme-toggle">
            <div class="sidebar-theme-info">
                <i class="fa-solid fa-palette"></i>
                <span>Dark Mode</span>
            </div>
            <div class="theme-switch" onclick="toggleTheme()"></div>
        </div>

        <a href = "/user/logout.php" class="logout-btn">
            <i class="fa-solid fa-sign-out"></i> Logout
        </a>
    </div>

</div>
</head>

<body>

<?php endif; ?>

<script>
// Theme System
function getTheme() {
    return localStorage.getItem('crowdspark-theme') || 'light';
}

function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('crowdspark-theme', theme);
}

function toggleTheme() {
    const currentTheme = getTheme();
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';
    setTheme(newTheme);
}

// Initialize theme
(function() {
    const savedTheme = getTheme();
    setTheme(savedTheme);
})();

// Sidebar Controls
function openSidebar() {
    document.getElementById("sidebar").classList.add("active");
    document.getElementById("overlay").classList.add("active");
    document.body.style.overflow = "hidden";
}

function closeSidebar() {
    document.getElementById("sidebar").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
    document.body.style.overflow = "auto";
}

// Navbar Scroll
window.addEventListener('scroll', () => {
    const navbar = document.getElementById('navbar');
    if (window.pageYOffset > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});
</script>