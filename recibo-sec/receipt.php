<?php
  require_once("template/header.php");

  require_once("dao/receiptDAO.php");
  
  $receiptDao = new ReceiptDAO($conn, $BASE_URL);
  $receiptsData = $receiptDao->findAll();

?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Recibos gerados</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>newreceipt.php" class="btn btn-primary sub-header-btn">Novo recibo</a>
                </div>
            </div>
            
            <div class="card-body">
    
                <table id="my_datatables" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sacado</th>
                            <th>Valor</th>
                            <th>Emissão</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($receiptsData as $receipt): ?>
                        <tr>
                            <td><?= $receipt->payer ?></td>
                            <td><?= $receipt->value ?></td>
                            <td><?= $receipt->emission ?></td>
                            <td class="actions-column">
                                <a class="btn btn-primary btn-sm" href="<?= $BASE_URL ?>editreceipt.php?id=<?= $receipt->id ?>">
                                    Editar
                                </a>
                                <form action="<?= $BASE_URL ?>receipt_process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $receipt->id ?>">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Deletar">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sacado</th>
                            <th>Valor</th>
                            <th>Emissão</th>
                            <th>Ação</th>
                        </tr>
                    </tfoot>
                </table>
               
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