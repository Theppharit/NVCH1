<nav class="navbar">
    <div class="nav-container">
        <div class="logo">LUXE<span>.</span></div>

        <ul class="nav-links" id="navLinks">
            <li><a href="index.php">Home</a></li>
            <li><a href="shop.php">Shop</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            
            <?php if(isset($_SESSION['admin_id'])): ?>
                <li><a href="admin_dashboard.php" style="color: #c5a059;">Dashboard</a></li>
                <li><a href="logout.php" style="color: #ff6b6b;">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
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

<script>
    function toggleMenu() {
        const links = document.getElementById('navLinks');
        links.classList.toggle('active');
    }
</script>