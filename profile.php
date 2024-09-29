<?php include 'inc/header.php'  ?>

<?php

   if(!isset($_SESSION['auth'])){
       header('Location: login.php');
   }
?>
<?php include 'inc/navbar.php'  ?>
<div class="container">
    <div class="row">
        <div class="col-4 mx-auto mt-5">
            <div style="width: 100% ;text-align: center">
                <div class="card" style="width: 18rem;">
                    <ul class="list-group list-group-flush">
                        <?php foreach ($_SESSION['auth'] as $key => $value) : ?>
                            <li class="list-group-item"><?php echo $value; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>
<?php include 'inc/footer.php'  ?>
