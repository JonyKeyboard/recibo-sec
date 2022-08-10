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
                            <th>Registro</th>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Cargo</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cardData as $card): ?>
                        <tr>
                            <td class="registro"><?= $card->register ?></td>
                            <td><?= $card->name ?></td>
                            <td class="cpf"><?= $card->cpf ?></td>
                            <td><?= $card->position ?></td>
                            <td class="actions-column">
                                <a class="btn btn-primary btn-sm" href="<?= $BASE_URL ?>editcard.php?id=<?= $card->id ?>">
                                    Editar
                                </a>
                                <form action="<?= $BASE_URL ?>card_process.php" method="POST">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?= $card->id ?>">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Deletar">
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Registro</th>
                            <th>Nome</th>
                            <th>Cpf</th>
                            <th>Cargo</th>
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