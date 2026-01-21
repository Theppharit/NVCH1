<?php include('head.php') ?>
   
   <body>
      <!--==================== HEADER ====================-->
<?php include('navbar.php') ?>

      <!--==================== MAIN ====================-->
<main class="main">

   <section class="menu section" id="menu">
<?php 
$sql_m = "SELECt * FROM tbl_menu";
$result_m = mysqli_query($conn, $sql_m);

?>



<table class="table">



<tr>
    <th class="menu">รหัสสินค้า</th>
    <th class="menu">ชื่อเมนู</th>
    <th class="menu">รูปภาพ</th>
    <th class="menu">ปริมาณ</th>
    <th class="menu">ราคา</th>
    <th class="menu">แก้ไข & ลบ</th>
</tr>

<?php while ($row_m = mysqli_fetch_assoc ($result_m)) { ?>


<tr>
    <td class="td-menu"><?= $row_m['m_id'] ?></td>
    <td class="td-menu"><?= $row_m['m_name'] ?></td>
    <td class="td-menu"><img src="../assets/img/<?= $row_m['m_img']?>" alt="" class="td-img"></td>
    <td class="td-menu"><?= $row_m['m_prince'] ?></td>
    <td class="td-menu"><?= $row_m['m_id'] ?></td>
    <td class="td-menu"><?= $row_m['m_id'] ?></td>
    
    <td class="td-menu">
    <a href="#" class="td-menu" ><i class="ri-pencil-line"></i></a>
    <a href="#" class="td-menu" ><i class="ri-delete-bin-6-line"></i></a>
</td>

</tr>

<?php }  ?>

</table>




    
   </section>

</main>

      <!--==================== FOOTER ====================-->
<?php include('../include/footer.php') ?>
      
<?php include('add-js.php') ?>

   </body>
   
</html>