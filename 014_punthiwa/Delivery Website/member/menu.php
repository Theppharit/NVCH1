<?php include('include/head.php') ?>

  <body>
    <!--==================== HEADER ====================-->
   <?php include('include/navbar.php') ?>

<main class="main">



     <section class="menu section" id="menu">
     <?php

    $sql_sv = "SELECT * FROM tbl_menu";
    $result_sv = mysqli_query($conn, $sql_m);

    ?>
     
     
     <table class="table">
           <thead>
               <tr>
                        <th class="th-menu">รหัสสินค้า</th>
                        <th class="th-menu">ชื่อเมนู</th>
                        <th class="th-menu">รูปภาพ</th>
                        <th class="th-menu">ปริมาณ</th>
                        <th class="th-menu">ราคา</th>
                        <th class="th-menu">แก้ไข&ลบ</th>
               </tr>
           
               <?php while ($row_sv = mysqli_fetch_assoc($result_sv)) { ?>

           <tr>
                        <td class="th-menu"><?php  $row_sv['menu_id']; ?></td>
                        <td class="th-menu"><?php  $row_sv['menu_name']; ?></td>
                        <td class="th-menu"><img src="../assets/img/<?php  $row_sv['menu_image']; ?>" alt="Menu Image" width="100"></td>
                        <td class="th-menu"><?php  $row_sv['menu_awount']; ?></td>
                        <td class="th-menu"><?php  $row_sv['menu_price']; ?></td>
                        <td class="th-menu">แก้ไข&ลบ</td>
 </tr>
      <?php } ?>
           
           
           
           
           
           
            </thead>
           <tbody>
           
           
            
              
      </section>





<!--==================== FOOTER ====================-->
    <?php include('include/footer.php') ?>

   <?php include('include/add-js.php') ?> 
  </body>
</html>