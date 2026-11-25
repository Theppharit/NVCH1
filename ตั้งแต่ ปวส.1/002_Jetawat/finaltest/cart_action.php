<?php
session_start();
ob_clean(); 

// 1. เชื่อมต่อ DB (เช็คตัวแปรให้ตรงกับเครื่องพี่)
$host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
} catch (PDOException $e) {
    die("DB Error");
}

// --- [ส่วนที่ 1: ระบบลบสินค้า] ---
// ต้องอยู่บนสุด เพราะใช้การ Redirect (header location)
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    header("Location: cart.php"); // ลบเสร็จกระโดดกลับหน้าตะกร้า
    exit;
}

// --- [ส่วนที่ 2: ระบบเพิ่มสินค้า + เช็คสต็อก] ---
// ส่วนนี้ใช้สำหรับ AJAX (เลขเด้งหน้า index)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ดึงสต็อกจริงจาก DB
    $stmt = $pdo->prepare("SELECT stock FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
        echo json_encode(['status' => 'error', 'message' => 'ไม่พบสินค้า']);
        exit;
    }

    $current_stock = $product['stock'];
    if (!isset($_SESSION['cart'])) { $_SESSION['cart'] = []; }
    
    $qty_in_cart = isset($_SESSION['cart'][$id]) ? $_SESSION['cart'][$id] : 0;

    // เช็คว่าหยิบเกินสต็อกไหม
    if ($qty_in_cart < $current_stock) {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]++;
        } else {
            $_SESSION['cart'][$id] = 1;
        }

        $totalItems = array_sum($_SESSION['cart']);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'success',
            'totalItems' => $totalItems
        ]);
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'status' => 'out_of_stock',
            'message' => 'ขออภัย สินค้านี้เหลือเพียง ' . $current_stock . ' ชิ้นเท่านั้น'
        ]);
    }
    exit;
}