<?php
require_once("template/header.php");

require_once("models/User.php");
require_once("dao/ReceiptDAO.php");

//$user = new User();
$userDao = new UserDao($conn, $BASE_URL);
$userData = $userDao->verifyToken(true);

$receiptDao = new ReceiptDAO($conn, $BASE_URL);
$id = filter_input(INPUT_GET, "id");

if(empty($id)) {
    $message->setMessage("O recibo não foi encontrado!", "danger", "receipt.php");
}else{
    $receiptData = $receiptDao->findById($id);

    if(!$receiptData) {
        $message->setMessage("O recibo não foi encontrado!", "danger", "receipt.php");
    }
} 

?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Editor de Recibos</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>receiptpdf.php?id=<?= $receiptData->id ?>" class="btn btn-secondary sub-header-btn">Imprimir</a>
                    <a href="<?= $BASE_URL ?>receipt.php" class="btn btn-primary sub-header-btn">Voltar</a>
                </div>
            </div>
            <form action="<?= $BASE_URL ?>receipt_process.php" id="add-receipt-form" method="POST">
                <input type="hidden" name="type" value="update">
                <input type="hidden" name="users_id" value="<?= $userData->id ?>">
                <input type="hidden" name="id" value="<?= $receiptData->id ?>">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sacado</label>
                                        <input type="text" class="form-control" name="payer" placeholder="Digite o nome" value="<?= $receiptData->payer ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="text" class="form-control valor" name="value" placeholder="0,00" value="<?= $receiptData->value ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emissão</label>
                                        <input type="date" class="form-control" name="emission" value="<?= $receiptData->emission ?>">
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" rows="3" name="description"><?= $receiptData->description ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary myforms-btn" value="Editar recibo">   
                        </div>
                    </div>
                </div>
            </form>
            <div class="card-footer">
                <div class="float-right">Usuário responsável: <?= $userData->name ?></div>
            </div>
        </div>
    </div>

</section>

<?php
  require_once("template/footer.php")
?>