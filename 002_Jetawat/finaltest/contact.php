<?php 
session_start();
include('include/head.php');
?>
<style>/* --- Core Styling for Jatawat's Showroom --- */
:root {
    --bg-dark: #050505;
    --card-bg: #111111;
    --accent-silver: #e5e5e5;
    --accent-dim: #888888;
    --transition-smooth: all 0.5s cubic-bezier(0.2, 1, 0.3, 1);
}

body {
    background-color: var(--bg-dark);
    font-family: 'Inter', 'Kanit', sans-serif; /* ใช้ฟอนต์ที่ดูทันสมัยและอ่านง่าย */
}

/* --- About & Contact Header --- */
.luxury-title {
    font-family: 'Inter', sans-serif;
    font-weight: 700;
    letter-spacing: -1px;
    text-transform: uppercase;
    color: #ffffff;
    text-shadow: 0 10px 20px rgba(0,0,0,0.5);
}

.subtitle {
    color: var(--accent-dim);
    font-size: 0.85rem;
    letter-spacing: 5px;
    margin-bottom: 40px;
}

/* --- Step Cards (Contact Page) --- */
.step-card {
    background: var(--card-bg);
    border: 1px solid #222;
    padding: 50px 30px;
    border-radius: 4px;
    width: 320px;
    position: relative;
    overflow: hidden;
    transition: var(--transition-smooth);
}

.step-card:hover {
    border-color: var(--accent-silver);
    transform: translateY(-15px);
    background: #181818;
}

.step-icon {
    font-size: 40px;
    color: var(--accent-silver);
    margin-bottom: 25px;
    position: relative;
    z-index: 2;
}

.step-number {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 6rem;
    font-weight: 900;
    color: rgba(255, 255, 255, 0.03); /* เลขเบื้องหลังแบบจางๆ */
    line-height: 1;
    z-index: 1;
}

.step-card h3 {
    font-size: 1.4rem;
    color: #fff;
    margin-bottom: 15px;
    position: relative;
    z-index: 2;
}

.step-card p {
    color: var(--accent-dim);
    font-size: 0.9rem;
    line-height: 1.7;
    position: relative;
    z-index: 2;
}

/* เอฟเฟกต์ไฟวิ่งจางๆ เวลา Hover */
.step-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: var(--accent-silver);
    transform: scaleX(0);
    transition: var(--transition-smooth);
}

.step-card:hover::after {
    transform: scaleX(1);
}

/* --- Car Display (About Page) --- */
.car-display {
    padding: 50px 0;
}

.floating-car {
    max-width: 90%;
    filter: drop-shadow(0 30px 50px rgba(0,0,0,0.8));
    transition: var(--transition-smooth);
}

.car-display:hover .floating-car {
    transform: scale(1.03) translateY(-10px);
}

/* --- Address/Profile Card --- */
.address-card {
    background: linear-gradient(145deg, #111, #080808);
    border: 1px solid #222;
    padding: 40px;
    text-align: left;
    max-width: 600px;
    margin: 0 auto;
    box-shadow: 0 40px 100px rgba(0,0,0,0.5);
}

.address-card h3 {
    color: var(--accent-silver);
    text-transform: uppercase;
    font-size: 1.1rem;
    letter-spacing: 2px;
    margin-bottom: 30px;
}

.status-bar {
    border-top: 1px solid #222;
    margin-top: 30px;
    padding-top: 20px;
    color: #00ff88; /* สีเขียวบอกสถานะ Verified */
    font-family: monospace;
    font-size: 0.8rem;
}

/* Responsive */
@media (max-width: 768px) {
    .step-card { width: 100%; }
}</style>
<body class="contact-page" style="background: #050508; color: #fff;">
    <?php include('include/navbar.php'); ?>

    <main class="contact-content" style="padding: 150px 10% 80px; text-align: center;">
        <h1 class="luxury-title" style="font-family: 'Inter', sans-serif; color: #fff; font-size: 3rem; margin-bottom: 10px; text-transform: uppercase;">Connect With Us</h1>
        <p style="color: #888; letter-spacing: 2px; margin-bottom: 50px;">ELEVATE YOUR LIFESTYLE TODAY.</p>
        
        <div class="steps-container" style="display: flex; justify-content: center; flex-wrap: wrap; gap: 30px; margin-top: 50px;">
            
            <div class="step-card">
                <div class="step-icon"><i class="fas fa-calendar-check"></i></div>
                <div class="step-number">01</div>
                <h3>นัดหมายล่วงหน้า</h3>
                <p>เลือกวันและเวลาที่คุณสะดวก เพื่อเข้าชมรถแบบ Private Viewing กับคุณเจตวัฒน์โดยตรง</p>
            </div>

            <div class="step-card">
                <div class="step-icon"><i class="fas fa-map-marker-alt"></i></div>
                <div class="step-number">02</div>
                <h3>เยี่ยมชมแกลเลอรี่</h3>
                <p>เดินทางมายังโชว์รูมย่านสุขุมวิท เพื่อสัมผัสสมรรถนะและความประณีตของรถคันจริง</p>
            </div>

            <div class="step-card">
                <div class="step-icon"><i class="fas fa-handshake"></i></div>
                <div class="step-number">03</div>
                <h3>ปิดการขายและส่งมอบ</h3>
                <p>รับคำปรึกษาด้านสินเชื่อและการโอนรถอย่างมืออาชีพ พร้อมส่งมอบรถถึงหน้าบ้านคุณ</p>
            </div>

        </div>
    </main>

    <?php include('include/footer.php'); ?>
    <script src="assets/main.js"></script>
</body>
</html>