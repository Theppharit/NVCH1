<?php
session_start();
// Security check: If no session exists, kick them back to login.php
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | LUXE</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-wrapper { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background: #1a1a1a; color: white; padding: 20px; }
        .sidebar h3 { border-bottom: 1px solid #444; padding-bottom: 10px; }
        .sidebar a { display: block; color: #ccc; padding: 10px 0; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover { color: #c5a059; }
        .main-content { flex: 1; padding: 40px; background: #f4f4f4; }
        .stats-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
        .stat-card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <div class="admin-wrapper">
        <aside class="sidebar">
            <h3>LUXE Admin</h3>
            <p>Welcome, <?php echo $_SESSION['username']; ?></p>
            <nav>
                <a href="admin_dashboard.php">Dashboard</a>
                <a href="manage_products.php">Manage Products</a>
                <a href="manage_customers.php">Manage Customers</a>
                <a href="logout.php" style="color: #ff6b6b; margin-top: 20px;">Logout</a>
            </nav>
        </aside>

        <main class="main-content">
            <h1>Backend Overview</h1>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Products</h3>
                    <p>Manage your inventory and prices.</p>
                </div>
                <div class="stat-card">
                    <h3>Customers</h3>
                    <p>View and edit customer details.</p>
                </div>
                <div class="stat-card">
                    <h3>System Status</h3>
                    <p>Database: Connected</p>
                </div>
            </div>
        </main>
    </div>

</body>
</html>