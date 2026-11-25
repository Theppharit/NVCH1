<?php 
session_start();
include('include/head.php');
?>

<body class="contact-page" style="background: #050508; color: #fff;">
    <?php include('include/navbar.php'); ?>

    <main class="contact-content" style="padding: 150px 10% 80px; text-align: center;">
        <h1 class="luxury-title" style="font-family: 'Playfair Display', serif; color: #c5a059; font-size: 3rem; margin-bottom: 50px;">How to Contact Us</h1>
        
        <div class="steps-container" style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 30px; margin-top: 50px;">
            
            <div class="step-card">
                <div class="step-icon">
                    <i class="fas fa-walking"></i>
                </div>
                <div class="step-number">01</div>
                <h3>เดินไปยังจุดศูนย์กลาง</h3>
                <p>มุ่งหน้าสู่ใจกลาง Mare Tranquillitatis เพื่อเข้าสู่จุดรับสัญญาณหลัก</p>
            </div>

            <div class="step-card">
                <div class="step-icon">
                    <i class="fas fa-broadcast-tower"></i>
                </div>
                <div class="step-number">02</div>
                <h3>ติดตั้งเสาสัญญาณ</h3>
                <p>กางเสาสัญญาณ Quantum Link เพื่อเชื่อมต่อกับระบบ LUXE Server</p>
            </div>

            <div class="step-card">
                <div class="step-icon">
                    <i class="fas fa-hands"></i>
                </div>
                <div class="step-number">03</div>
                <h3>ปรบมือ 3 ครั้ง</h3>
                <p>รหัสลับเสียงเพื่อยืนยันตัวตน ระบบจะเปิดการสนทนาอัตโนมัติ</p>
            </div>

        </div>
    </main>

    <?php include('include/footer.php'); ?>
    <script src="assets/main.js"></script>
</body>