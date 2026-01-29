<?php 
session_start();
include('include/head.php');
?>
<style>/* --- Custom Style for LUXE Auto Gallery --- */
.about-page {
    background-color: #0c0c0c !important; /* พื้นหลังเทาดำแบบพรีเมียม */
    color: #e0e0e0 !important;
}

.about-content {
    padding: 140px 10% 80px;
    text-align: center;
}

/* หัวข้อใหญ่ */
.luxury-title {
    font-family: 'Inter', sans-serif;
    font-weight: 800;
    font-size: 4rem;
    letter-spacing: -1px;
    color: #fff;
    margin-bottom: 5px;
    text-transform: uppercase;
}

.subtitle {
    letter-spacing: 4px;
    font-size: 0.8rem;
    color: #888;
    margin-bottom: 50px;
}

/* ส่วนแสดงผลวงกลม (เปลี่ยนจากพระจันทร์เป็น Wheel/Lens Style) */
.moon-sphere {
    width: 300px;
    height: 300px;
    margin: 40px auto;
    border-radius: 50%;
    position: relative;
    /* ไล่เฉดสีให้ดูเหมือนโลหะหรือล้อแม็ก */
    background: conic-gradient(from 0deg, #1a1a1a, #444, #1a1a1a, #444, #1a1a1a);
    box-shadow: 0 0 50px rgba(0,0,0,0.8), 
                inset 0 0 30px rgba(255,255,255,0.05);
    border: 8px solid #222;
}

/* การ์ดข้อมูลติดต่อ */
.address-card {
    background: #151515;
    border: 1px solid #282828;
    padding: 45px;
    border-radius: 8px;
    max-width: 550px;
    margin: 40px auto;
    text-align: left;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4);
}

.address-card h3 {
    font-size: 1.5rem;
    color: #fff;
    margin-bottom: 25px;
    border-left: 4px solid #fff;
    padding-left: 15px;
    text-transform: uppercase;
}

.address-card p {
    margin-bottom: 12px;
    font-size: 0.95rem;
    color: #aaa;
    border-bottom: 1px solid #222;
    padding-bottom: 8px;
}

.address-card strong {
    color: #fff;
    width: 100px;
    display: inline-block;
}

/* แถบสถานะด้านล่างการ์ด */
.status-bar {
    margin-top: 30px;
    padding-top: 20px;
    display: flex;
    justify-content: space-between;
}

.status-item {
    font-size: 0.75rem;
    font-weight: 700;
    color: #00ff88; /* สีเขียวแบบสถานะเปิดทำการ */
    letter-spacing: 1px;
}

/* ส่วนเนื้อหาประวัติ */
.story-section {
    margin-top: 100px;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
}

.story-section h2 {
    font-size: 2.5rem;
    color: #fff;
    margin-bottom: 20px;
}

.line {
    width: 50px;
    height: 3px;
    background: #fff;
    margin: 20px auto 30px;
}

.story-section p {
    line-height: 2;
    color: #999;
    font-size: 1.1rem;
    text-align: justify;
    text-justify: inter-word;
}

/* Responsive */
@media (max-width: 768px) {
    .luxury-title { font-size: 2.5rem; }
    .about-content { padding: 100px 5% 50px; }
    .address-card { padding: 25px; }
}
</style>
<body class="about-page">
    <?php include('include/navbar.php'); ?>

    <main class="about-content">
        <section class="intro-section">
            <h1 class="luxury-title">LUXE Auto Gallery</h1>
            <p class="subtitle">THE ULTIMATE COLLECTION OF RARE SUPERCAR AND LUXURY VEHICLES.</p>
        </section>

        <section class="car-experience">
    <div class="car-wrap">
        <div id="mainCar" class="car-display">
            <div class="car-shadow"></div>
        </div>
    </div>

            <div class="address-card">
                <h3>Contact Information</h3>
                <p><strong>Showroom:</strong> LUXE Auto Gallery (Sukhumvit 24)</p>
                <p><strong>Address:</strong> 123/45 Sukhumvit Road, Khlong Tan, Khlong Toei, Bangkok 10110</p>
                <p><strong>Phone:</strong> 02-123-4567 | 081-999-XXXX</p>
                <p><strong>Email:</strong> Jetawat@luxeautogallery.com</p>
                
                <div class="status-bar">
                    <span class="status-item">OPEN: 09:00 - 20:00</span>
                    <span class="status-item">SERVICE: AVAILABLE</span>
                </div>
            </div>
        </section>

        <section class="story-section">
            <h2>About Our Gallery</h2>
            <div class="line"></div>
            <p>
                LUXE Auto Gallery คือผู้นำเข้าและจัดจำหน่ายยนตรกรรมระดับพรีเมียมและซูเปอร์คาร์มือสองสภาพสะสม 
                เราคัดสรรเฉพาะรถยนต์ที่มีประวัติการบำรุงรักษาดีเยี่ยมและผ่านการตรวจสอบกว่า 200 จุด 
                ด้วยประสบการณ์ในวงการรถยนต์หรูยาวนานกว่า 15 ปี เราพร้อมส่งมอบรถในฝันให้ถึงมือคุณด้วยบริการที่เหนือระดับ 
                และศูนย์บริการหลังการขายแบบครบวงจร
            </p>
        </section>
    </main>

    <?php include('include/footer.php'); ?>
    <script src="assets/main.js"></script>
</body>
</html>