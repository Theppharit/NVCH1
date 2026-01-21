<?php include('head.php') ?>

<body>
    <!--==================== HEADER ====================-->
    <?php include('navbar.php') ?>

    <!--==================== MAIN ====================-->
    <main class="main">

        <section class="menu section" id="menu">


            <?php

            $sql_m = "SELECT * FROM tbl_menu";
            $result_m = mysqli_query($conn, $sql_m);

            ?>

        
        <table class="table">

            <tr>
                <th class="th-menu">รหัสสินค้า</th>
                <th class="th-menu">ชื่อเมนู</th>
                <th class="th-menu">รูปภาพ</th>
                <th class="th-menu">ปริมาณ</th>
                <th class="th-menu">ราคา</th>
                <th class="th-menu">แก้ไข & ลบ</th>
            </tr>

        <?php while ($row_m = mysqli_fetch_assoc($result_m)) { ?>


            <tm$row_m>
                <td class="td-menu"><?= $row_m['m_id'] ?></td>
                <td class="td-menu"><?= $row_m['m_name'] ?></td>
                <td class="td-menu"><?= $row_m['m_img'] ?></td>
                <td class="td-menu"><?= $row_m['m_amount'] ?></td>
                <td class="td-menu"><?= $row_m['m_price'] ?></td>
                <td class="td-menu"><?= $row_m['sv_img'] ?></td>
            </tm$row_m

        
        <?php } ?>


        </table>


        </section>

    </main>

    <!--==================== FOOTER ====================-->
    <?php include('../include/footer.php') ?>

    <?php include('add-js.php') ?>

</body>

</html>