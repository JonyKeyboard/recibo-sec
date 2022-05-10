<?php
    include_once("templates/header.php");
?>
    <!-- área conteúdo -->
    <main>
        <form id="contact-form">
            <nav>
                <h2>Navegação</h2>
                <input type="submit" value="Novo ">
                <input type="submit" value="Cadastrar">
                <input type="submit" value="Editar">
                <input type="submit" value="Excluir">
                <input type="submit" value="Imprimir">
            </nav>
            <hr/>
            <div id="form-main">
                <div class="form-item-left">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" placeholder="Digite seu nome">
                
                    <label for="email">Cargo:</label>
                    <input type="text" name="email" placeholder="Digite seu e-mail">
              
                    <label for="phone">Telefone:</label> 
                    <input type="text" name="phone" placeholder="Digite seu telefone">
                </div>
                <div class="form-item-right">
                    <label class="label-observ" for="msg">Observação:</label>
                    <textarea name="msg" placeholder="Observações"></textarea>
                </div>
            </div>
        </form>
       

     <!-- listagem -->
     <table border="1" id="search-container">
        <?php foreach($obreiros as $obreiro):?>
            <tr>
                <td><?= $obreiro['nome'] ?></td>
                <td><?= $obreiro['comead'] ?></td>
                <td><?= $obreiro['cargo'] ?></td>
            </tr>
        <?php endforeach; ?>
          

        </table>
    <!-- fim da listagem -->


    </main>
    <!-- fim área conteúdo -->

   
   
<?php
    include_once("templates/footer.php");
?>
