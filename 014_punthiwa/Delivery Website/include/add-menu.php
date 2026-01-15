<?php
session_start();
include_once('../conn/conn.php');

$m_name=$_POST['m_name'];
$m_amount=$_POST['m_amount'];
$m_price=$_POST['m_price'];

$sql="INSERT INTO tbl_menu (m_name,m_amount,m_price,me_id)
 VALUES 
 ('$m_name','$m_amount','$m_price','$me_id')";
$result=mysqli_query($conn,$sql);

if($result){
   header("location:../menu.php");
 exit();

}else{
    header("Location: member/dashboard.php?me_id=$me_id");
    exit();
}
?>
 