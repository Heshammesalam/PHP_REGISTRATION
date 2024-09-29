<?php include 'inc/header.php'  ?>
<?php include 'inc/navbar.php'  ?>

<?php
 if(isset($_SESSION['auth'] )){
     foreach ($_SESSION['auth'] as $key => $value) {
         echo   $value . "<br>";
     }

 }
?>
<?php include 'inc/footer.php'  ?>
