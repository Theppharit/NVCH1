<?php 
session_start();
include('include/head.php');
?>

<body class="about-page">
    <?php include('include/navbar.php'); ?>

    <main class="about-content">
        <section class="intro-section">
            <h1 class="luxury-title">LUXE Moon Base</h1>
            <p class="subtitle">EXPERIENCE THE PINNACLE OF LUXURY, 384,400 KM AWAY FROM EARTH.</p>
        </section>

        <section class="moon-experience">
            <div class="moon-wrap">
        <div id="bigMoon" class="moon-sphere"></div>
    </div>

            <div class="address-card">
                <h3>Our Lunar Address</h3>
                <p><strong>Sector:</strong> Mare Tranquillitatis (Sea of Tranquility)</p>
                <p><strong>Crater:</strong> Luxury Ridge, Suite 707</p>
                <p><strong>Coordinates:</strong> 0.6741° N, 23.4730° E</p>
                <p><strong>Planet:</strong> The Moon (Luna)</p>
                <div class="status-bar">
                    <span class="status-item">OXYGEN: 100%</span>
                    <span class="status-item">GRAVITY: 1.62 m/s²</span>
                </div>
            </div>
        </section>

        <section class="story-section">
            <h2>About LUXE.</h2>
            <div class="line"></div>
            <p>LUXE คือแบรนด์แรกของโลกที่ขยายขอบเขตแห่งแฟชั่นไปไกลกว่าชั้นบรรยากาศ เราก่อตั้งขึ้นในปี 2026 เพื่อตอบสนองความต้องการของผู้ที่รักความโดดเด่นและต้องการสัมผัสประสบการณ์การใช้ชีวิตบนดวงจันทร์อย่างมีระดับ</p>
        </section>
    </main>

    <?php include('include/footer.php'); ?>
    <script src="assets/main.js"></script>
</body>
</html>