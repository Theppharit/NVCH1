<?php include('head.php') ?>
   
   <body>
      <!--==================== HEADER ====================-->
<?php include('../include/navbar.php') ?>

      <!--==================== MAIN ====================-->
      <main class="main">


<form action="add-menu.php?me_id=<?= $_SESSION['me_id'] ?>" method="post">
    
   <section class="menu section" id="menu">

        <h1 class="">เพิ่มเมนูอาหาร</h1>

        <input type="text" name="m_name" id="" class="" placeholder="ชื่อเมนู">
        <input type="text" name="m_amount" id="" class="" placeholder="จำนวน">
        <input type="text" name="m_price" id="" class="" placeholder="ราคา">
        <input type="hidden" name="me_id" value="<?= $_SESSION['me_id'] ?>">
        <button type="submit">เพิ่มเมนู</button>


   </section>
         

</form>
     

      </main>

      <!--==================== FOOTER ====================-->
<?php include('../include/footer.php') ?>
      
      <!--==================== JS ====================-->
<?php include('include/add-js.php') ?>
   </body>
</html>