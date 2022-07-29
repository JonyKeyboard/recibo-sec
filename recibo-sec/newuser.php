<?php
  require_once("template/header.php")
?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Cadastro de usuário</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>user.php" class="btn btn-primary sub-header-btn">Voltar</a>
                </div>
            </div>
            <form action="<?= $BASE_URL ?>user_process.php" method="POST">
                <input type="hidden" name="type" value="register">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" placeholder="Digite o nome">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Digite o email">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <label>Nivel de acesso</label>
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="access_level" value="common_user" checked>
                                            <label class="form-check-label">Usuário comum</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="access_level" value="administrator">
                                            <label class="form-check-label">Administrador</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" name="password" placeholder="Digite a senha">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirmação de senha</label>
                                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirme a senha">
                                    </div>
                                </div>
                                
                            </div>   
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary myforms-btn" value="Cadastrar usuário">   
                        </div>
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