    // --- 1. Global Function (เรียกใช้จาก HTML ได้ทันที) ---
   // --- แก้ไขฟังก์ชัน openQuickView ให้รับ URL โดยตรง ---
function openQuickView(element, imgUrl) {
    const modal = document.getElementById("quickViewModal");
    const modalImg = document.getElementById("imgFull");
    const captionText = document.getElementById("caption");

    if (!modal || !modalImg) {
        console.error("หา Modal หรือ Tag รูปไม่เจอครับพี่!");
        return;
    }

    // 1. ดึง URL รูป (ถ้าส่งมาตรงๆ ใช้ตัวนั้น ถ้าไม่ส่งมาให้ลองหาจากพื้นหลัง)
    let finalUrl = imgUrl;
    if (!finalUrl) {
        const parent = element.parentElement;
        let bgImg = window.getComputedStyle(parent).backgroundImage;
        finalUrl = bgImg.replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
    }

    // 2. ดึงชื่อสินค้า
    const card = element.closest('.product-card');
    const title = card ? card.querySelector('h3').innerText : 'LUXE Product';

    // 3. เซ็ตค่าและสั่งแสดงผล
    modalImg.src = finalUrl;
    captionText.innerText = title;
    
    // สำคัญ: ต้องสั่งแสดง display: flex ก่อนสั่งเพิ่ม class active
    modal.style.display = "flex";
    
    // ล้างค่าเก่า
    modalImg.style.transform = "scale(1)";
    modal.classList.remove('active');

    // Force Reflow เพื่อให้ Animation ทำงาน
    void modal.offsetWidth; 

    // เริ่มแสดงผล Animation
    setTimeout(() => {
        modal.classList.add('active');
        applyZoomLogic(modalImg); // เรียกฟังก์ชันซูม
    }, 10);
}

// แยกฟังก์ชันซูมออกมาให้เรียกใช้ง่ายๆ
function applyZoomLogic(img) {
    img.onmousemove = (e) => {
        const { left, top, width, height } = img.getBoundingClientRect();
        const x = ((e.pageX - left - window.scrollX) / width) * 100;
        const y = ((e.pageY - top - window.scrollY) / height) * 100;
        img.style.transformOrigin = `${x}% ${y}%`;
        img.style.transform = "scale(2.5)";
    };
    img.onmouseleave = () => { img.style.transform = "scale(1)"; };
}

    // --- 2. Main Logic (รันครั้งเดียวเมื่อโหลดหน้าเสร็จ) ---
    document.addEventListener('DOMContentLoaded', () => {
        // เลือก Elements สำคัญ
        const navbar = document.querySelector('.navbar'); 
        const modal = document.getElementById("quickViewModal");
        const closeBtn = document.querySelector(".modal-close");
        const backToTopBtn = document.getElementById('backToTop');
        const productCards = document.querySelectorAll('.product-card');
        const moon = document.getElementById('bigMoon');

        // สร้าง Progress Bar สีทองอัตโนมัติ (ไม่ต้องเขียนใน HTML)
        const progressBar = document.createElement('div');
        progressBar.style.cssText = "position:fixed; top:0; left:0; height:3px; background:#c5a059; z-index:9999; transition:width 0.1s; width: 0%;";
        document.body.appendChild(progressBar);

        // --- ฟังก์ชันตรวจจับการเลื่อนหน้าจอ (Scroll Logic) ---
        const handleAllScroll = () => {
            const winScroll = window.pageYOffset || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;

            // A. อัปเดต Progress Bar
            progressBar.style.width = scrolled + "%";

            // B. Animation Navbar (ถ้าเลื่อนเกิน 50px ให้เปลี่ยนสไตล์)
            if (navbar) {
                if (winScroll > 50) {
                    navbar.classList.add('navbar-scrolled');
                } else {
                    navbar.classList.remove('navbar-scrolled');
                }
            }

            // C. ปุ่ม Back to Top
            if (backToTopBtn) {
                if (winScroll > 300) {
                    backToTopBtn.style.display = "block";
                    setTimeout(() => backToTopBtn.style.opacity = "1", 10);
                } else {
                    backToTopBtn.style.opacity = "0";
                    setTimeout(() => backToTopBtn.style.display = "none", 300);
                }
            }

            // D. Product Reveal Animation
            productCards.forEach((card) => {
                const cardTop = card.getBoundingClientRect().top;
                if (cardTop < window.innerHeight * 0.9) {
                    card.classList.add('reveal');
                    card.classList.remove('js-hidden');
                }
            });
        };

        // ลงทะเบียนการ Scroll
        window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar'); 
        
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });

        // --- ฟังก์ชันอื่นๆ ---

        // 1. คลิกปุ่ม Back to Top
        if (backToTopBtn) {
            backToTopBtn.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }

        // 2. ปิด Quick View Modal
        const closeModal = () => {
            if (modal) {
                modal.classList.remove('active');
                setTimeout(() => { modal.style.display = "none"; }, 400);
            }
        };
        if (closeBtn) closeBtn.onclick = closeModal;
        window.onclick = (e) => { if (e.target === modal) closeModal(); };

        // 3. ควบคุมดวงจันทร์ (หน้า About)
        if (moon) {
            moon.addEventListener('click', function() {
                if (this.style.transform === "rotate(360deg)") {
                    this.style.transform = "rotate(0deg)";
                } else {
                    this.style.transform = "rotate(360deg)";
                    this.style.transition = "2s ease-in-out";
                }
                this.classList.toggle('rotating');
            });
        }
    });

  document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.querySelector('.search-icon');
    const searchOverlay = document.getElementById('search-overlay');
    const closeSearch = document.getElementById('close-search');
    const searchInput = document.getElementById('search-input');
    
    // ย้ายการเลือกการ์ดเข้ามาข้างในฟังก์ชันค้นหา เผื่อมีการโหลดสินค้าเพิ่ม
    // และเช็คว่าชื่อ class ตรงกับ .product-card ใน HTML ไหม
    const productCards = document.querySelectorAll('.product-card');

    if (searchIcon) {
        searchIcon.onclick = () => {
            searchOverlay.style.display = 'flex';
            setTimeout(() => {
                searchOverlay.classList.add('active');
                searchInput.focus();
            }, 50);
        };
    }

    const closeSearchFunc = () => {
        searchOverlay.classList.remove('active');
        setTimeout(() => { searchOverlay.style.display = 'none'; }, 400);
        
        document.querySelectorAll('.product-card').forEach(card => {
            card.style.display = 'block';
            card.style.opacity = '1';
        });
        searchInput.value = '';
    };

    if (closeSearch) closeSearch.onclick = closeSearchFunc;

    // ระบบค้นหา (ปรับปรุงใหม่)
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.product-card'); // ดึงใหม่ทุกครั้งที่พิมพ์ชัวร์สุด

            console.log("Searching for:", searchTerm, "in", cards.length, "cards");

            cards.forEach(card => {
                // เช็คทั้งชื่อสินค้า (h3) และหมวดหมู่ (p)
                const title = card.querySelector('h3').innerText.toLowerCase();
                const category = card.querySelector('p').innerText.toLowerCase();

                if (title.includes(searchTerm) || category.includes(searchTerm)) {
                    card.style.display = 'block';
                    setTimeout(() => card.style.opacity = '1', 10);
                } else {
                    card.style.opacity = '0';
                    setTimeout(() => card.style.display = 'none', 300);
                }
            });
        });
    }

    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && searchOverlay.classList.contains('active')) closeSearchFunc();
    });
});