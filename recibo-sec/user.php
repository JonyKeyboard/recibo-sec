<?php
  require_once("template/header.php");

  require_once("dao/UserDAO.php");
  

  $userDao = new UserDAO($conn, $BASE_URL);


?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Usuários cadastrados</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>newuser.php" class="btn btn-primary sub-header-btn">Novo usuário</a>
                </div>
            </div>
            <form action="">
            <div class="card-body">
                <div class="row">
                    
                    <?php var_dump($userDao->findAll()); ?>
                        
                </div>
            </div>
            </form>
            <div class="card-footer">
                <br>
            </div>
        </div>
    </div>

</section>

<?php
  require_once("template/footer.php")
?>