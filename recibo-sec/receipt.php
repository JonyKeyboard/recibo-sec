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
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <form action="">
            <div class="card-body">
                <div class="row">
                    
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sacado</label>
                                        <input class="form-control" type="text" placeholder="Digite o nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Valor</label>
                                        <input class="form-control" type="number" placeholder="Digite o valor">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Emissão</label>
                                        <input class="form-control" type="date">
                                    </div>
                                </div>
                                
                            </div>   
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Descrição</label>
                                <textarea class="form-control" rows="3" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary receipt-btn" value="Gerar recibo">   
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