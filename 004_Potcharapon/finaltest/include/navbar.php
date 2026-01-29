<?php 
// ต้องมีบรรทัดนี้ที่บนสุดเสมอเพื่อให้ PHP จำได้ว่าใคร Login อยู่
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">LUXE<span>.</span></a>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <li class="user-menu">
                    <span style="color: #c5a059; font-weight: 600;">
                        👤 <?= htmlspecialchars($_SESSION['username']) ?>
                    </span>
                </li>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="admin_dashboard.php" style="border: 1px solid #c5a059; padding: 5px 10px; border-radius: 4px;">Dashboard</a></li>
                <?php endif; ?>

                <li><a href="logout.php" style="color: #ff6b6b;">Logout</a></li>
                
            <?php else: ?>
                <li><a href="login.php">Login/Register</a></li>
            <?php endif; ?>
        </ul>

        <div class="nav-icons">
            <span class="search-icon">🔍</span>
            <div class="cart-wrapper">
                <span>🛒</span>
                <span class="badge">0</span>
            </div>
            <div class="mobile-toggle" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</nav>

<style>
    /* เพิ่ม CSS เล็กน้อยเพื่อให้ Navbar ดูดีขึ้น */
    .nav-links { display: flex; align-items: center; list-style: none; gap: 20px; }
    .user-menu { font-size: 0.9rem; }
    @media (max-width: 768px) {
        .nav-links.active { display: flex; flex-direction: column; position: absolute; top: 70px; background: #fff; width: 100%; left: 0; padding: 20px; box-shadow: 0 10px 10px rgba(0,0,0,0.1); }
    }
</style>

<script>
    function toggleMenu() {
        const links = document.getElementById('navLinks');
        links.classList.toggle('active');
    }
</script>