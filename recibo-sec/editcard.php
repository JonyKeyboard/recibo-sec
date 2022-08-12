<?php
require_once("template/header.php");
require_once("models/User.php");
require_once("dao/CardDAO.php");

//$user = new User();
$userDao = new UserDAO($conn, $BASE_URL);
$userData = $userDao->verifyToken(true);

$cardDao = new CardDAO($conn, $BASE_URL);
$id = filter_input(INPUT_GET, "id");

if(empty($id)) {
    $message->setMessage("O membro não foi encontrado!", "danger", "card.php");
}else{
    $cardData = $cardDao->findById($id);
    //var_dump($cardData);exit;

    if(!$cardData) {
        $message->setMessage("O membro não foi encontrado!", "danger", "card.php");
    }else if($cardData->image == "") {
        $cardData->image = "user.png";
        
    }
} 
?>
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Gerador de Credenciais</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>cardpdf.php?id=<?= $cardData->id ?>" target="_blank" class="btn btn-secondary sub-header-btn">Imprimir</a>
                    <a href="<?= $BASE_URL ?>card.php" class="btn btn-primary sub-header-btn">Voltar</a>
                </div>
            </div>
            <form action="<?= $BASE_URL ?>card_process.php" id="add-receipt-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="type" value="update">
                <input type="hidden" name="users_id" value="<?= $userData->id ?>">
                <input type="hidden" name="id" value="<?= $cardData->id ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="name" value="<?= $cardData->name ?>" placeholder="Digite o nome">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Registro</label>
                                        <input type="text" class="form-control registro" name="register" value="<?= $cardData->register ?>" placeholder="Digite o registro">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Cpf</label>
                                        <input type="text" class="form-control cpf" name="cpf" value="<?= $cardData->cpf ?>" placeholder="Digite o Cpf">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Rg</label>
                                        <input type="text" class="form-control" name="generalRecord" value="<?= $cardData->generalRecord ?>" placeholder="Digite o Rg">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Estado civil</label>
                                        <select class="form-control" name="maritalStatus">
                                            <option value="Casado" <?= $cardData->maritalStatus === "Casado" ? "selected" : "" ?>>Casado</option>
                                            <option value="Viúvo" <?= $cardData->maritalStatus === "Viúvo" ? "selected" : "" ?>>Viúvo</option>
                                            <option value="Divorciado" <?= $cardData->maritalStatus === "Divorciado" ? "selected" : "" ?>>Divorciado</option>
                                            <option value="Outro" <?= $cardData->maritalStatus === "Outro" ? "selected" : "" ?>>Outro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" class="form-control" name="placeOfBirth" value="<?= $cardData->placeOfBirth ?>" placeholder="Digite a naturalidade">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Cargo</label>
                                        <select class="form-control" name="position">
                                            <option value="Pastor"<?= $cardData->position === "Pastor" ? "selected" : "" ?>>Pastor</option>
                                            <option value="Evangelista"<?= $cardData->position === "Evangelista" ? "selected" : "" ?>>Evangelista</option>
                                            <option value="Presbítero"<?= $cardData->position === "Presbítero" ? "selected" : "" ?>>Presbítero</option>
                                            <option value="Diácono"<?= $cardData->position === "Diácono" ? "selected" : "" ?>>Diácono</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Função</label>
                                        <input type="text" class="form-control" name="function" value="<?= $cardData->function ?>" placeholder="Digite a função">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Igreja onde serve</label>
                                        <input type="text" class="form-control" name="worksplace" value="<?= $cardData->worksplace ?>" placeholder="Digite a igreja onde serve">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Validade</label>
                                        <input type="text" class="form-control monthpicker" name="validity" value="<?= $cardData->validity ?>" placeholder="Digite a validade" readonly>
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-4">
                            <div id="card-image-container" style="background-image: url('<?= $BASE_URL ?>img/members/<?= $cardData->image ?>')"></div>
                            <div class="form-group">
                                <label for="image">Foto:</label>
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary myforms-btn" value="Editar membro">   
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