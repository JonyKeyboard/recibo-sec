<?php
  require_once("template/header.php");

  require_once("dao/CardDAO.php");
  
  $cardDao = new CardDAO($conn, $BASE_URL);
  $cardData = $cardDao->findAll();

?>
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Credenciais geradas</h3>
                <div class="card-tools">
                    <a href="<?= $BASE_URL ?>newcard.php" class="btn btn-primary sub-header-btn">Novo membro</a>
                </div>
            </div>
            
            <div class="card-body">
    
                <table id="my_datatables" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>#</th>
                            <th>#</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cardData as $card): ?>
                        <tr>
                            <td><?= $receipt->payer ?></td>
                            <td><?= $receipt->value ?></td>
                            <td><?= $receipt->emission ?></td>
                            <td class="actions-column">
                                <a class="btn btn-primary btn-sm" href="#">
                                    Editar
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>#</th>
                            <th>#</th>
                            <th>#</th>
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