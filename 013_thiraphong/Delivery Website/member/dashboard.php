<?php include('head.php') ?>
   
   <body>
      <!--==================== HEADER ====================-->
<?php include('../include/navbar.php') ?>

      <!--==================== MAIN ====================-->
      <main class="main">

<section class="menu section" id="menu">

<form action="add-menu.php?me_id=<?= $_SESSION['me_id'] ?>" method="post">
    
   

        <h1 class="">เพิ่มเมนูอาหาร</h1>

        <input type="text" name="m_name" id="" class="" placeholder="ชื่อเมนู">
        <input type="text" name="m_amount" id="" class="" placeholder="จำนวน">
        <input type="text" name="m_price" id="" class="" placeholder="ราคา">
        <input type="hidden" name="me_id" value="<?= $me_id ?>">
        <button type="submit">เพิ่มเมนู</button>
     
</form>
    
</section>

      </main>

      <!--==================== FOOTER ====================-->
<?php include('../include/footer.php') ?>
      
      <!--==================== JS ====================-->
<?php include('add-js.php') ?>
   </body>
</html>