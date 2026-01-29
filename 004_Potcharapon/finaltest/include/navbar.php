<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// นับจำนวนสินค้าทั้งหมดในตะกร้าจาก Session
$total_cart_items = 0;
if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    $total_cart_items = array_sum($_SESSION['cart']);
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
            <div class="cart-wrapper" onclick="location.href='cart.php'" style="cursor: pointer; position: relative;">
                <span style="font-size: 1.5rem;">🛒</span>
                <span class="badge" id="cart-count">
    <?= isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0 ?>
</span>
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
            <input type="text" id="search-input" placeholder="SEARCH..." autocomplete="off">
            <div class="search-close-btn" id="close-search">&times;</div>
        </div>
        <div class="search-bar-line"></div>
    </div>
</div>
</nav>

<style>
    .nav-links { display: flex; align-items: center; list-style: none; gap: 20px; }
    .user-menu { font-size: 0.9rem; }
    
    /* ตกแต่ง Badge ตัวเลขรถเข็น */
    .cart-wrapper { position: relative; display: inline-block; }
    .badge {
        position: absolute;
        top: -8px;
        right: -10px;
        background: #1a1a1a;
        color: #c5a059;
        font-size: 0.7rem;
        font-weight: bold;
        padding: 2px 6px;
        border-radius: 50%;
        border: 1px solid #c5a059;
        min-width: 18px;
        text-align: center;
        transition: transform 0.3s ease;
    }

    @media (max-width: 768px) {
        .nav-links.active { 
            display: flex; 
            flex-direction: column; 
            position: absolute; 
            top: 70px; 
            background: #fff; 
            width: 100%; 
            left: 0; 
            padding: 20px; 
            box-shadow: 0 10px 10px rgba(0,0,0,0.1); 
            z-index: 100;
        }
    }
</style>

<script>
    function toggleMenu() {
        const links = document.getElementById('navLinks');
        links.classList.toggle('active');
    }
</script>