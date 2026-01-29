<?php 
session_start();
include('include/head.php');

// 1. เชื่อมต่อฐานข้อมูล
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // ดึงข้อมูลสินค้าทั้งหมด (เอาเฉพาะตัวที่พร้อมขาย)
    $stmt = $pdo->query("SELECT * FROM products WHERE status = 'active' ORDER BY id DESC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

<style>
    .shop-header { padding: 150px 0 50px; text-align: center; background: #f9f9f9; }
    .shop-container { padding: 50px 8%; }
    
    /* Grid ระบบสินค้า */
    .product-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); 
        gap: 30px; 
    }

    .product-card { 
        background: #fff; 
        transition: transform 0.3s ease; 
        position: relative;
    }
    
    .product-card:hover { transform: translateY(-5px); }

    .product-img { 
        width: 100%; 
        height: 350px; 
        background-size: cover; 
        background-position: center;
        position: relative;
        overflow: hidden;
    }

    /* ปุ่มลอยเวลา Hover */
    .product-card .add-btn {
        position: absolute;
        bottom: -50px;
        left: 0;
        width: 100%;
        background: #1a1a1a;
        color: #fff;
        padding: 15px;
        text-align: center;
        cursor: pointer;
        transition: 0.3s;
        border: none;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .product-card:hover .add-btn { bottom: 0; }

    .product-info { padding: 20px 0; text-align: center; }
    .product-info h3 { font-size: 1.1rem; margin: 10px 0; font-family: 'Playfair Display', serif; }
    .product-info .price { color: #c5a059; font-weight: 700; font-size: 1.2rem; }
    .category { font-size: 0.75rem; color: #888; text-transform: uppercase; letter-spacing: 1px; }
    
    .out-of-stock-label {
        position: absolute;
        top: 10px;
        left: 10px;
        background: #ff4444;
        color: #fff;
        padding: 5px 10px;
        font-size: 0.7rem;
        z-index: 10;
    }
</style>

<body>
    <?php include('include/navbar.php'); ?>

    <header class="shop-header">
        <h1 style="font-family: 'Playfair Display', serif; font-size: 3rem;">Our Collections</h1>
        <p style="color: #888; letter-spacing: 2px;">Sophistication in every detail.</p>
    </header>

    <main class="shop-container">
        <div class="product-grid">
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $row): ?>
                <div class="product-card">
                    <?php if ($row['stock'] <= 0): ?>
                        <div class="out-of-stock-label">Out of Stock</div>
                    <?php endif; ?>

                    <div class="product-img" style="background-image: url('<?= htmlspecialchars($row['image_url']) ?>');">
                        <?php if ($row['stock'] > 0): ?>
                            <button class="add-btn" onclick="addToCart(<?= $row['id'] ?>)">Add to Cart</button>
                        <?php endif; ?>
                    </div>

                    <div class="product-info">
                        <span class="category"><?= htmlspecialchars($row['category']) ?></span>
                        <h3><?= htmlspecialchars($row['name']) ?></h3>
                        <p class="price">$<?= number_format($row['price'], 2) ?></p>
                        <p style="font-size: 0.8rem; color: #bbb;">Stock: <?= $row['stock'] ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; grid-column: 1/-1;">ไม่พบสินค้าในระบบ</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include('include/footer.php'); ?>

    <script>
    function addToCart(productId) {
        fetch('cart_action.php?id=' + productId)
        .then(response => response.json())
        .then(data => {
            if(data.status === 'success') {
                const badge = document.getElementById('cart-count');
                if (badge) {
                    badge.innerText = data.totalItems;
                    badge.style.transform = 'scale(1.4)';
                    setTimeout(() => { badge.style.transform = 'scale(1)'; }, 200);
                }
            } else if (data.status === 'out_of_stock') {
                alert(data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
    </script>
    <script src="assets/main.js"></script>
</body>