document.addEventListener('DOMContentLoaded', () => {
    const productCards = document.querySelectorAll('.product-card');

    // 1. สั่งซ่อนการ์ดด้วย JS (ถ้า JS ทำงาน บรรทัดนี้จะรัน)
    productCards.forEach(card => card.classList.add('js-hidden'));

    // 2. ฟังก์ชันตรวจจับการ Scroll
    const revealOnScroll = () => {
        productCards.forEach((card) => {
            const cardTop = card.getBoundingClientRect().top;
            const triggerBottom = window.innerHeight * 0.9; // ปรับให้โชว์เร็วขึ้น

            if (cardTop < triggerBottom) {
                card.classList.add('reveal');
                card.classList.remove('js-hidden');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    // รันทันทีหนึ่งครั้งเพื่อเช็คสินค้าที่อยู่บนหน้าจอตอนแรก
    setTimeout(revealOnScroll, 100); 
});
// assets/main.js

document.addEventListener('DOMContentLoaded', () => {
    const progressBarr = document.getElementById('scroll-progress');
    const backToTopBtn = document.getElementById('backToTop');

    window.onscroll = function() {
        // --- 1. แถบ Progress Bar ด้านบน ---
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        
        if (progressBarr) {
            progressBarr.style.width = scrolled + "%";
        }

        // --- 2. ปุ่ม Back to Top (โชว์เมื่อเลื่อนลงมาเกิน 300px) ---
        if (winScroll > 300) {
            backToTopBtn.style.display = "block";
            setTimeout(() => backToTopBtn.style.opacity = "1", 10);
        } else {
            backToTopBtn.style.opacity = "0";
            setTimeout(() => backToTopBtn.style.display = "none", 300);
        }
    };

    // คลิกแล้วเลื่อนขึ้นนิ่มๆ
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});