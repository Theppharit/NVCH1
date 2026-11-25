<?php 
    if (session_status() === PHP_SESSION_NONE) { session_start(); }
    
    // เชื่อมต่อ DB (ข้อมูลเดิมของพี่)
    $host = "localhost"; $db = "luxe_shop"; $user = "root"; $pass = "";
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // --- 1. ส่วนการลบสินค้า ---
        if (isset($_GET['delete_id'])) {
            $id = $_GET['delete_id'];
            $sql = "DELETE FROM products WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
            header("Location: manage_products.php");
            exit();
        }

        // --- 2. ส่วนการบันทึกข้อมูลรถใหม่ ---
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $category = $_POST['category']; 
            $status = $_POST['status'];
            $image_url = $_POST['image_url'];

            $sql = "INSERT INTO products (name, price, stock, category, status, image_url) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $price, $stock, $category, $status, $image_url]);
            
            header("Location: manage_products.php");
            exit();
        }

        $stmt = $pdo->query("SELECT * FROM products ORDER BY id DESC");
        $all_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
    ?>

    <?php include('include/head.php') ?>
    <link rel="stylesheet" href="assets/style.css">

    <body style="background: #0a0a0a;">
        <?php include('include/navbar.php') ?>

        <div class="manage-container" style="padding: 120px 5% 50px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h2 style="color: #00f2ff; font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 2px;">
                    Car Inventory Management
                </h2>
                <span style="color: #666; font-size: 0.9rem;">Admin: <?= htmlspecialchars($_SESSION['username']) ?></span>
            </div>

            <div class="add-product-form" style="background: #111; padding: 30px; border-radius: 12px; border: 1px solid #222; margin-bottom: 50px; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                <h3 style="color: #fff; margin-bottom: 25px; font-size: 1.2rem;">+ Register New Vehicle</h3>
                <form action="" method="POST" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                    
                    <div class="form-group">
                        <label style="color: #888; display: block; margin-bottom: 8px; font-size: 0.8rem;">Model Name</label>
                        <input type="text" name="name" placeholder="เช่น Porsche 911 GT3" required style="width: 100%; padding: 12px; background: #000; color: #fff; border: 1px solid #333; border-radius: 4px;">
                    </div>

                    <div class="form-group">
                        <label style="color: #888; display: block; margin-bottom: 8px; font-size: 0.8rem;">Price (฿)</label>
                        <input type="number" name="price" placeholder="ระบุราคาสุทธิ" required style="width: 100%; padding: 12px; background: #000; color: #fff; border: 1px solid #333; border-radius: 4px;">
                    </div>
                    
                    <div class="form-group">
                        <label style="color: #888; display: block; margin-bottom: 8px; font-size: 0.8rem;">Units in Stock</label>
                        <input type="number" name="stock" placeholder="จำนวนรถ" required style="width: 100%; padding: 12px; background: #000; color: #fff; border: 1px solid #333; border-radius: 4px;">
                    </div>

                    <div class="form-group">
                        <label style="color: #888; display: block; margin-bottom: 8px; font-size: 0.8rem;">Category</label>
                        <select name="category" style="width: 100%; padding: 12px; background: #000; color: #fff; border: 1px solid #333; border-radius: 4px;">
                            <option value="Supercar">Supercar</option>
                            <option value="Luxury Sedan">Luxury Sedan</option>
                            <option value="Sport SUV">Sport SUV</option>
                            <option value="Classic">Classic</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label style="color: #888; display: block; margin-bottom: 8px; font-size: 0.8rem;">Image Path</label>
                        <input type="text" name="image_url" placeholder="assets/img/cars/..." required style="width: 100%; padding: 12px; background: #000; color: #fff; border: 1px solid #333; border-radius: 4px;">
                    </div>
                    
                    <div class="form-group">
                        <label style="color: #888; display: block; margin-bottom: 8px; font-size: 0.8rem;">Sale Status</label>
                        <select name="status" style="width: 100%; padding: 12px; background: #000; color: #fff; border: 1px solid #333; border-radius: 4px;">
                            <option value="active">Available (พร้อมขาย)</option>
                            <option value="inactive">Reserved (จองแล้ว/ปิดการขาย)</option>
                        </select>
                    </div>

                    <div style="grid-column: 1 / -1; text-align: right; margin-top: 10px;">
                        <button type="submit" name="add_product" style="background: #00f2ff; color: #000; border: none; padding: 12px 40px; cursor: pointer; font-weight: bold; border-radius: 4px; transition: 0.3s; text-transform: uppercase;">Update Inventory</button>
                    </div>
                </form>
            </div>

            <div style="overflow-x: auto; background: #111; border-radius: 12px; border: 1px solid #222;">
                <table style="width: 100%; border-collapse: collapse; color: #fff; min-width: 900px;">
                    <thead>
                        <tr style="background: #1a1a1a; color: #00f2ff; border-bottom: 2px solid #222;">
                            <th style="padding: 20px; text-align: left;">Vehicle</th>
                            <th style="padding: 20px; text-align: left;">Model Name</th>
                            <th style="padding: 20px; text-align: left;">Category</th>
                            <th style="padding: 20px; text-align: right;">Price</th>
                            <th style="padding: 20px; text-align: center;">Stock</th>
                            <th style="padding: 20px; text-align: center;">Status</th>
                            <th style="padding: 20px; text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all_products as $p): ?>
                        <tr style="border-bottom: 1px solid #1a1a1a; transition: 0.3s;" onmouseover="this.style.background='#151515'" onmouseout="this.style.background='transparent'">
                            <td style="padding: 15px; text-align: center;">
                                <img src="<?= htmlspecialchars($p['image_url']) ?>" style="width: 80px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #333;">
                            </td>
                            <td style="padding: 15px; font-weight: 600;"><?= htmlspecialchars($p['name']) ?></td>
                            <td style="padding: 15px; color: #888;"><?= htmlspecialchars($p['category']) ?></td>
                            <td style="padding: 15px; text-align: right; color: #00f2ff; font-weight: bold;">฿<?= number_format($p['price']) ?></td>
                            
                            <td style="padding: 15px; text-align: center; color: <?= $p['stock'] <= 0 ? '#ff4444' : '#fff' ?>;">
                                <?= $p['stock'] ?> <?= $p['stock'] <= 0 ? '<br><span style="font-size:10px;">(SOLD OUT)</span>' : '' ?>
                            </td>

                            <td style="padding: 15px; text-align: center;">
                                <span style="background: <?= $p['status'] == 'active' ? 'rgba(0, 242, 255, 0.1)' : '#333' ?>; color: <?= $p['status'] == 'active' ? '#00f2ff' : '#888' ?>; padding: 4px 12px; border-radius: 20px; font-size: 11px; border: 1px solid <?= $p['status'] == 'active' ? '#00f2ff' : '#444' ?>;">
                                    <?= strtoupper($p['status']) ?>
                                </span>
                            </td>

                            <td style="padding: 15px; text-align: center;">
                                <a href="manage_products.php?delete_id=<?= $p['id'] ?>" 
                                onclick="return confirm('ยืนยันการลบข้อมูลรถคันนี้ออกจากระบบ?');" 
                                style="color: #ff4444; text-decoration: none; font-size: 13px; font-weight: bold; border: 1px solid #ff4444; padding: 5px 10px; border-radius: 4px; transition: 0.3s;">
                                    REMOVE
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php include('include/footer.php') ?>
        <script src="assets/main.js"></script>
    </body>