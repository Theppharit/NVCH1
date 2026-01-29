<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// นับจำนวนสินค้าในตะกร้า
$total_cart_items = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $total_cart_items = array_sum($_SESSION['cart']);
}
?>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">JATAWAT<span>.</span></a>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Inventory</a></li> <li><a href="about.php">Our Story</a></li>
            <li><a href="contact.php">Contact</a></li>
            
            <?php if(isset($_SESSION['user_id'])): ?>
                <li class="user-menu">
                    <span class="user-name">
                        👤 <?= htmlspecialchars($_SESSION['username']) ?>
                    </span>
                </li>

                <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <li><a href="admin_dashboard.php" class="admin-link">Dashboard</a></li>
                <?php endif; ?>

                <li><a href="logout.php" class="logout-link">Logout</a></li>
                
            <?php else: ?>
                <li><a href="login.php" class="login-btn">Login / Register</a></li>
            <?php endif; ?>
        </ul>

        <div class="nav-icons">
            <span class="search-icon" id="open-search">🔍</span>
            <div class="cart-wrapper" onclick="location.href='cart.php'">
                <span class="cart-icon">🛒</span>
                <span class="badge" id="cart-count"><?= $total_cart_items ?></span>
            </div>
            <div class="mobile-toggle" onclick="toggleMenu()">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    <div id="search-overlay" class="search-overlay">
        <div class="search-wrapper">
            <div class="search-box-container">
                <input type="text" id="search-input" placeholder="SEARCH MODELS..." autocomplete="off">
                <div class="search-close-btn" id="close-search">&times;</div>
            </div>
            <div class="search-bar-line"></div>
        </div>
    </div>
</nav>

<style>
    /* ปรับแต่ง Navbar โดยรวม */
    .navbar {
        background: rgba(10, 10, 10, 0.95) !important;
        backdrop-filter: blur(10px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .logo { color: #fff !important; font-family: 'Inter', sans-serif; font-weight: 800; }
    .logo span { color: #00f2ff; text-shadow: 0 0 10px rgba(0, 242, 255, 0.5); }

    .nav-links a {
        color: #bbb !important;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .nav-links a:hover { color: #00f2ff !important; }

    /* สไตล์ปุ่ม Admin และ User */
    .user-name { color: #00f2ff; font-weight: 600; font-size: 0.9rem; }
    .admin-link { border: 1px solid #00f2ff !important; padding: 5px 15px !important; border-radius: 20px !important; color: #00f2ff !important; }
    .logout-link { color: #ff4d4d !important; font-weight: 600; }

    /* ตกแต่ง Badge ตะกร้าให้ดูเป็น Tech */
    .cart-icon { font-size: 1.3rem; }
    .badge {
        background: #00f2ff !important;
        color: #000 !important;
        border: none !important;
        box-shadow: 0 0 10px rgba(0, 242, 255, 0.5);
        top: -5px !important;
        right: -8px !important;
    }

    /* Mobile Menu */
    @media (max-width: 768px) {
        .nav-links.active { 
            background: #111 !important;
            border-top: 1px solid #222;
        }
    }

    /* Search Overlay Customization */
    .search-overlay {
        background: rgba(0, 0, 0, 0.98) !important;
    }
    #search-input {
        color: #00f2ff !important;
        font-family: 'Inter', sans-serif;
    }
    .search-bar-line { background: #00f2ff !important; }
</style>

<script>
    // ระบบเปิด-ปิด Search
    const openSearch = document.getElementById('open-search');
    const closeSearch = document.getElementById('close-search');
    const searchOverlay = document.getElementById('search-overlay');

    if(openSearch) {
        openSearch.onclick = () => {
            searchOverlay.classList.add('active');
            setTimeout(() => document.getElementById('search-input').focus(), 300);
        };
    }
    if(closeSearch) {
        closeSearch.onclick = () => searchOverlay.classList.remove('active');
    }

    // Toggle Mobile Menu
    function toggleMenu() {
        const links = document.getElementById('navLinks');
        links.classList.toggle('active');
    }
</script>