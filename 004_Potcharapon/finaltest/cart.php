<?php 
// เปิดการแสดง Error ทั้งหมด (แก้หน้าขาว)
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include('include/head.php');

// เชื่อมต่อ DB (เช็คชื่อฐานข้อมูลพี่ด้วยนะ)
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("เชื่อมต่อฐานข้อมูลไม่ได้: " . $e->getMessage());
}

$cart_items = [];
$total_price = 0;

// ดึงข้อมูลสินค้าจาก Session
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $id => $qty) {
        $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            $product['qty'] = $qty;
            $product['subtotal'] = $product['price'] * $qty;
            $total_price += $product['subtotal'];
            $cart_items[] = $product;
        }
    }
}
?>

<body>
    <?php include('include/navbar.php') ?>

    <div style="padding: 120px 10% 50px; min-height: 80vh; font-family: 'Poppins', sans-serif;">
        <h2 style="font-family: 'Playfair Display', serif; border-bottom: 2px solid #c5a059; display: inline-block; margin-bottom: 30px;">Shopping Bag</h2>

        <?php if (empty($cart_items)): ?>
            <div style="text-align: center; padding: 50px;">
                <p style="color: #888;">ตะกร้าของคุณยังว่างเปล่า</p>
                <a href="index.php" style="color: #c5a059; text-decoration: none;">กลับไปช้อปปิ้ง</a>
            </div>
        <?php else: ?>
            <table style="width: 100%; border-collapse: collapse;">
                <tr style="border-bottom: 1px solid #eee; text-align: left; color: #888; font-size: 0.8rem;">
                    <th style="padding: 15px 0;">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($cart_items as $item): ?>
                <tr style="border-bottom: 1px solid #f9f9f9;">
                    <td style="padding: 20px 0; display: flex; align-items: center;">
                        <img src="<?= $item['image_url'] ?>" style="width: 70px; height: 90px; object-fit: cover; margin-right: 15px;">
                        <div>
                            <p style="font-weight: 600; margin: 0;"><?= $item['name'] ?></p>
                        </div>
                    </td>
                    <td>$<?= number_format($item['price'], 2) ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td style="font-weight: 600; color: #c5a059;">$<?= number_format($item['subtotal'], 2) ?></td>
                    <td>
                        <a href="cart_action.php?remove=<?= $item['id'] ?>" style="color: #ff6b6b; text-decoration: none; font-size: 0.8rem;">ลบ</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <div style="text-align: right; margin-top: 40px;">
                <p style="font-size: 1.2rem;">Total: <span style="color: #c5a059; font-weight: 700;">$<?= number_format($total_price, 2) ?></span></p>
                <button onclick="location.href='checkout.php'" style="background: #1a1a1a; color: #fff; padding: 15px 40px; border: none; cursor: pointer; margin-top: 15px;">CHECKOUT NOW</button>
            </div>
        <?php endif; ?>
    </div>

    <?php include('include/footer.php') ?>
            <script src="assets/main.js"></script>

</body>