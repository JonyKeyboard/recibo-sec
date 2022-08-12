<?php
  require_once("template/header.php");
  require_once("models/User.php");
  
  //$user = new User();
  $userDao = new UserDAO($conn, $BASE_URL);
  $userData = $userDao->verifyToken(true);
  
?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Gerador de Credenciais</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>card.php" class="btn btn-primary sub-header-btn">Voltar</a>
                </div>
            </div>
            <form action="<?= $BASE_URL ?>card_process.php" id="add-receipt-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="create">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" placeholder="Digite o nome">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Registro</label>
                                        <input type="text" class="form-control registro" name="register" placeholder="Digite o registro">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Cpf</label>
                                        <input type="text" class="form-control cpf" name="cpf" placeholder="Digite o Cpf">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rg</label>
                                        <input type="text" class="form-control" name="generalRecord" placeholder="Digite o Rg">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Estado civil</label>
                                        <select class="form-control" name="maritalStatus">
                                            <option value="Casado">Casado</option>
                                            <option value="Viúvo">Viúvo</option>
                                            <option value="Divorciado">Divorciado</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" class="form-control" name="placeOfBirth" placeholder="Digite a naturalidade">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select class="form-control" name="position">
                                            <option value="Pastor">Pastor</option>
                                            <option value="Evangelista">Evangelista</option>
                                            <option value="Presbítero">Presbítero</option>
                                            <option value="Diácono">Diácono</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Função</label>
                                        <input type="text" class="form-control" name="function" placeholder="Digite a função">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Igreja onde serve</label>
                                        <input type="text" class="form-control" name="worksplace" placeholder="Digite a igreja onde serve">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Validade</label>
                                        <input type="text" class="form-control monthpicker" name="validity" placeholder="Digite a validade" readonly>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary myforms-btn" value="Salvar">   
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