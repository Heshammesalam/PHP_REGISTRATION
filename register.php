<?php include 'inc/header.php'  ?>
<?php include 'inc/navbar.php'  ?>
<?php
if(isset($_SESSION['auth'])){
header('Location: index.php');
}
?>
  <div class="container">
        <div class="row">
            <div class="col-8 mx-auto my-5">
              <h1 class="border p-2 my-2 text-center">Register</h1>
                <form class="border p-3" action="handelers/handelRegister.php" method="post">
                       <?php  if(isset($_SESSION['errors'])): foreach ($_SESSION['errors'] as $error) : ?>
                            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
                          <?php
                              endforeach;
                              unset($_SESSION['errors']);
                              endif;
                           ?>

                    <div class="mb-3">
                        <label for="name"  class="form-label">Name </label>
                        <input type="text" name="name" class="form-control" id="name" >
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <button type="submit" value="register" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
  </div>
<?php include 'inc/footer.php'  ?>
