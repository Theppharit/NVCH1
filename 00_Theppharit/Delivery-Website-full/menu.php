<?php include('include/head.php') ?>

<body>
    <!--==================== HEADER ====================-->
    <?php include('include/navbar.php') ?>

    <!--==================== MAIN ====================-->
    <main class="main">

        <!--==================== MENU ====================-->
<<<<<<< HEAD

        <?php

    $sql_M = "SELECT * FROM tbl_menu";
    $result_M= mysqli_query($conn, $sql_M);

    ?>
=======
        <?php

        $sql_m = "SELECT * FROM tbl_menu";
        $result_m = mysqli_query($conn, $sql_m);

        ?>
>>>>>>> 1e77a88ec925de9bf075238e88d005390d8027a0

        <section class="menu section" id="menu">
            <h4 class="section__subtitle">OUR MENU</h4>
            <h2 class="section__title">The Most Popular</h2>

            <div class="menu__container container grid">
<<<<<<< HEAD

            <?php while ($row_M = mysqli_fetch_assoc($result_M)) { ?>

                <article class="menu__card">
                    <img src="assets/img/<?= $row_M['M_img'] ?>" alt="image" class="menu__img" />

                    <div>
                        <h3 class="menu__name">
                            <?= $row_M['M_name'] ?>
                            
                        </h3>
                        <p class="menu__amount"><?= $row_M['M_amount'] ?></p>
                        <h3 class="menu__price"><?= $row_M['M_pirc'] ?></h3>
                    </div>
=======

                <?php while ($row_m = mysqli_fetch_assoc($result_m)) { ?>
>>>>>>> 1e77a88ec925de9bf075238e88d005390d8027a0

                    <article class="menu__card">
                        <img src="assets/img/<?= $row_m['m_img'] ?>" alt="image" class="menu__img" />

<<<<<<< HEAD
                <?php } ?>

                
=======
                        <div>
                            <h3 class="menu__name">
                                <?= $row_m['m_name'] ?>
                            </h3>
                            <p class="menu__amount"><?= $row_m['m_amount'] ?></p>
                            <h3 class="menu__price">$<?= $row_m['m_price'] ?></h3>
                        </div>

                        <button class="menu__button">
                            <i class="ri-shopping-bag-3-fill"></i>
                        </button>
                    </article>

                <?php } ?>

>>>>>>> 1e77a88ec925de9bf075238e88d005390d8027a0
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <?php include('include/footer.php') ?>

    <?php include('include/add-js.php') ?>

</body>

</html>