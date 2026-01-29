<?php include('include/head.php') ?>
<?php 
session_start();
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ดึงข้อมูลสินค้าทั้งหมด
    $stmt = $pdo->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<body>
  <?php include('include/navbar.php') ?>
    <header class="hero">
        <div class="hero-overlay">
            <div class="hero-content">
                <span class="subtitle">Spring / Summer 2026</span>
                <h1>Elevate Your Style</h1>
                <p>Discover the new collection featuring sustainable materials and timeless design.</p>
                <div class="hero-btns">
                    <a href="#" class="btn-primary">Shop Collection</a>
                    <a href="#" class="btn-secondary">View Lookbook</a>
                </div>
            </div>
        </div>
    </header>

    <section class="products">
        <div class="section-header">
            <h2>Featured Products</h2>
            <div class="line"></div>
        </div>

      <div class="product-grid">
    <?php if (count($products) > 0): ?>
       <?php foreach ($products as $row): ?>
    <div class="product-card">
        <div class="product-img" style="background-image: url('<?= htmlspecialchars($row['image_url']) ?>');">
            <div class="overlay-btn" onclick="openQuickView(this)">Quick View</div>
        </div>
        <div class="product-info">
            <p style="color: #c5a059; font-size: 0.8rem; margin-bottom: 5px; text-transform: uppercase;"><?= htmlspecialchars($row['category']) ?></p>
            <h3><?= htmlspecialchars($row['name']) ?></h3>
            <p style="font-size: 0.85rem; color: #888; margin-bottom: 8px;">คงเหลือ: <?= $row['stock'] ?> ชิ้น</p>
            <p class="price">$<?= number_format($row['price'], 2) ?></p>
            
            <?php if ($row['status'] === 'active' && $row['stock'] > 0): ?>
                <button class="add-btn" onclick="addToCart(<?= $row['id'] ?>)">Add to Cart</button>
            <?php else: ?>
                <button class="add-btn" style="background:#333; cursor:pointer;" onclick="alert('สินค้าไม่พร้อมขาย')">
                    <?= ($row['stock'] <= 0) ? 'Out of Stock' : 'Not Available' ?>
                </button>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

<script>
function addToCart(productId) {
    fetch('cart_action.php?id=' + productId)
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        if(data.status === 'success') {
            const badge = document.getElementById('cart-count');
            if (badge) {
                badge.innerText = data.totalItems;
                badge.style.transform = 'scale(1.4)';
                badge.style.transition = '0.2s';
                setTimeout(() => { badge.style.transform = 'scale(1)'; }, 200);
            }
        } else if (data.status === 'out_of_stock') {
            // แจ้งเตือนเมื่อสินค้าเกินสต็อก
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('เกิดข้อผิดพลาดในการเพิ่มสินค้า');
    });
}
</script>
    <?php else: ?>
        <p style="text-align:center; width:100%;">No products found.</p>
    <?php endif; ?>
</div>
        
    </section>
  <?php include('include/footer.php') ?>

<div id="quickViewModal">
    <div class="modal-container">
        <span class="modal-close">&times;</span>
        <img id="imgFull" src="" alt="Product Image">
        <div id="caption"></div>
    </div>
</div>

  <script src="assets/main.js"></script>
</body>
</html>