<?php include('include/head.php') ?>
<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ดึงข้อมูลรถยนต์ทั้งหมด
    $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
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
                <span class="subtitle">PREMIUM SELECTION BY JATAWAT</span>
                <h1>DRIVE THE EXTRAORDINARY</h1>
                <p>สัมผัสประสบการณ์เหนือระดับกับยนตรกรรมคัดสรรพิเศษ เพื่อรสนิยมที่ไร้ขีดจำกัด</p>
                <div class="hero-btns">
                    <a href="#inventory" class="btn-primary">View Inventory</a>
                    <a href="about.php" class="btn-secondary">Our Story</a>
                </div>
            </div>
        </div>
    </header>

    <section class="products" id="inventory">
        <div class="section-header">
            <h2>Available Vehicles</h2>
            <div class="line"></div>
        </div>

      <div class="product-grid">
    <?php if (count($products) > 0): ?>
       <?php foreach ($products as $row): ?>
    <div class="product-card">
        <div class="product-img" style="background-image: url('<?= htmlspecialchars($row['image_url']) ?>');">
            <div class="overlay-btn" onclick="openQuickView(this)">Examine</div>
        </div>
        <div class="product-info">
            <p style="color: #00f2ff; font-size: 0.75rem; margin-bottom: 5px; text-transform: uppercase; letter-spacing: 1px; font-weight: 600;">
                <?= htmlspecialchars($row['category']) ?>
            </p>
            <h3><?= htmlspecialchars($row['name']) ?></h3>
            <p style="font-size: 0.85rem; color: #666; margin-bottom: 8px;">จำนวนในสต็อก: <?= $row['stock'] ?> คัน</p>
            
            <p class="price" style="color: #fff; font-size: 1.2rem; font-weight: 700;">
                ฿<?= number_format($row['price']) ?>
            </p>
            
            <?php if ($row['status'] === 'active' && $row['stock'] > 0): ?>
                <button class="add-btn" onclick="addToCart(<?= $row['id'] ?>)" style="background: #00f2ff; color: #000; font-weight: bold;">
                    Book Now
                </button>
            <?php else: ?>
                <button class="add-btn" style="background:#222; color: #555; cursor:not-allowed;" disabled>
                    <?= ($row['stock'] <= 0) ? 'Sold Out' : 'Unavailable' ?>
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
                badge.style.boxShadow = '0 0 15px #00f2ff';
                setTimeout(() => { 
                    badge.style.transform = 'scale(1)'; 
                    badge.style.boxShadow = 'none';
                }, 200);
            }
        } else if (data.status === 'out_of_stock') {
            alert(data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('ไม่สามารถเพิ่มลงในรายการจองได้');
    });
}
</script>
    <?php else: ?>
        <p style="text-align:center; width:100%; color: #555;">ขณะนี้ยังไม่มีรถในรายการสต็อก</p>
    <?php endif; ?>
</div>
        
    </section>
  <?php include('include/footer.php') ?>

<div id="quickViewModal">
    <div class="modal-container">
        <span class="modal-close">&times;</span>
        <img id="imgFull" src="" alt="Vehicle Image" style="border-radius: 8px;">
        <div id="caption" style="color: #00f2ff; font-weight: 600; text-transform: uppercase;"></div>
    </div>
</div>

  <script src="assets/main.js"></script>
</body>
</html>