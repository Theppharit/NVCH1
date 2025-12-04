<?php include('include/head.php') ?>

<body>
    <?php include('include/navbar.php') ?>

    <main class="main">
        <section class="menu section" id="menu">
            <h4 class="section__subtitle">OUR MENU</h4>
            <h2 class="section__title">The Most Popular</h2>

            <div class="menu__container container grid">
               <?php
                // 1. INCLUDE DATABASE CONNECTION (Which now provides a MySQLi object $conn)
                include('conn/conn.php'); 

                // Check for connection failure before continuing
                if (!isset($conn) || !$conn) {
                    echo "<p style='color: red; text-align: center; grid-column: 1 / -1;'>FATAL ERROR: Could not establish a database connection. Check your 'conn/conn.php' file.</p>";
                } else {
                    // 2. DEFINE SQL QUERY (FIXED: ORDER BY 'id')
                    $sql = "SELECT name, amount, price, image_path FROM tbl_menu ORDER BY id ASC";

                    try {
                        // 3. EXECUTE THE QUERY using MySQLi
                        $result = mysqli_query($conn, $sql);

                        // 4. LOOP THROUGH RESULTS AND GENERATE HTML
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($item = mysqli_fetch_assoc($result)) {
                                // Split the name for the two-line display
                                $name_parts = explode(' ', $item['name'], 2);
                                $first_line = htmlspecialchars($name_parts[0]);
                                $second_line = htmlspecialchars(isset($name_parts[1]) ? $name_parts[1] : '');
                                $price_formatted = number_format($item['price'], 2);

                                echo '
                                <article class="menu__card">
                                    <img src="' . htmlspecialchars($item['image_path']) . '" alt="' . $first_line . ' ' . $second_line . '" class="menu__img" />

                                    <div>
                                        <h3 class="menu__name">
                                            ' . $first_line . ' <br />
                                            ' . $second_line . '
                                        </h3>
                                        <p class="menu__amount">' . htmlspecialchars($item['amount']) . '</p>
                                        <h3 class="menu__price">$' . $price_formatted . '</h3>
                                    </div>

                                    <button class="menu__button">
                                        <i class="ri-shopping-bag-3-fill"></i>
                                    </button>
                                </article>';
                            }
                        } else {
                            echo "<p style='text-align: center; grid-column: 1 / -1;'>No menu items found in the database or query failed.</p>";
                        }

                    } catch(Exception $e) {
                        // Error handling is less specific with procedural MySQLi, but still catches general issues
                        echo "<p style='color: red; text-align: center; grid-column: 1 / -1;'>Database Query Error.</p>";
                    }
                }
                ?>
            </div>
        </section>
    </main>

    <?php include('include/footer.php') ?>

    <?php include('include/add-js.php') ?>

</body>

</html>