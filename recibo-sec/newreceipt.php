<?php
  require_once("template/header.php")
?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Gerador de Recibos</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>receipt.php" class="btn btn-primary sub-header-btn">Voltar</a>
                </div>
            </div>
            <form action="<?= $BASE_URL ?>receipt_process.php" id="add-receipt-form" method="POST">
                <input type="hidden" name="type" value="create">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sacado</label>
                                        <input type="text" class="form-control" name="payer" placeholder="Digite o nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input type="text" class="form-control valor" name="value" step="0.01" min="0.01" placeholder="0,00">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emissão</label>
                                        <input type="date" class="form-control" name="emission" value="<?= date("Y-m-d"); ?>">
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary myforms-btn" value="Gerar recibo">   
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