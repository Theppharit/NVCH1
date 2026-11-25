<footer class="main-footer">
        <div class="footer-container">
            <div class="footer-about">
                <h3>JATAWAT<span>.</span></h3>
                <p>ศูนย์รวมยนตรกรรมระดับพรีเมียมที่ผ่านการคัดสรรโดยคุณเจตวัฒน์ ทองสุวรรณ เรามุ่งมั่นที่จะส่งมอบรถยนต์ที่ดีที่สุดพร้อมบริการที่เหนือระดับ</p>
            </div>

            <div class="footer-links">
                <h4>Explore</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Inventory</a></li>
                    <li><a href="about.php">Our Story</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>

            <div class="footer-contact">
                <h4>Contact Us</h4>
                <p><strong>Email:</strong> jatawat@gallery.com</p>
                <p><strong>Phone:</strong> 02-123-4567 | 081-999-XXXX</p>
                <p><strong>Address:</strong> Sukhumvit 24, Bangkok, Thailand</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 JATAWAT THONGSUWAN Auto Gallery. All rights reserved.</p>
        </div>
    </footer>

    <style>
        .main-footer {
            background-color: #080808;
            border-top: 1px solid #1a1a1a;
            padding: 80px 0 30px;
            margin-top: 0; /* ต่อเนื่องจาก Section ก่อนหน้า */
        }

        .footer-container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.5fr 1fr 1.5fr; /* เน้นส่วนหัวและส่วนติดต่อ */
            gap: 50px;
            padding-bottom: 50px;
        }

        .footer-about h3 {
            font-family: 'Inter', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 20px;
            letter-spacing: 1px;
        }

        .footer-about h3 span {
            color: #00f2ff; /* สีฟ้า Neon ตามธีมใหม่ */
            text-shadow: 0 0 10px rgba(0, 242, 255, 0.3);
        }

        .footer-about p {
            color: #777;
            line-height: 1.8;
            font-size: 0.95rem;
        }

        .main-footer h4 {
            color: #fff;
            font-size: 1.1rem;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 2px;
            position: relative;
        }

        .main-footer h4::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -8px;
            width: 30px;
            height: 2px;
            background-color: #00f2ff;
        }

        .footer-links ul { list-style: none; }
        .footer-links ul li { margin-bottom: 12px; }
        .footer-links ul li a {
            color: #777;
            text-decoration: none;
            transition: 0.3s;
            font-size: 0.9rem;
        }

        .footer-links ul li a:hover {
            color: #00f2ff;
            padding-left: 8px;
        }

        .footer-contact p {
            color: #777;
            margin-bottom: 15px;
            font-size: 0.95rem;
        }

        .footer-contact strong {
            color: #fff;
            font-weight: 500;
        }

        .footer-bottom {
            border-top: 1px solid #1a1a1a;
            padding-top: 30px;
            text-align: center;
        }

        .footer-bottom p {
            color: #444;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .footer-container {
                grid-template-columns: 1fr;
                text-align: center;
            }
            .main-footer h4::after {
                left: 50%;
                transform: translateX(-50%);
            }
            .footer-links ul li a:hover { padding-left: 0; }
        }
    </style>

    <script src="assets/main.js"></script>
</body>
</html>