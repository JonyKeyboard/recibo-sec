<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMEAD-CGPB</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <!--header começo-->
    <header>
        <div class="logo">
            <h3>Comead-<span>Sec</span></h3>
        </div>
        <div class="right">
            <a href="#" class="btn-sair">Sair</a>
        </div>
    </header>
    <!--header final-->
    <!--sidebar começo-->
    <div class="sidebar">
        <center>
            <img src="/img/comead.jpg" class="image" alt="">
            <h2>Secretaria</h2>
        </center>
        <a href="#"><span>Cadastro Geral</span></a>
        <a href="#"><span>Igrejas</span></a>
        <a href="#"><span>Secretaria</span></a>
        <a href="#"><span>Configurações</span></a>
    </div>
    <!--sidebar final-->
    <!-- conteúdo -->
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
    </main>
    <!-- fim do conteúdo -->
    
    <footer>
        <p>Stanley &copy; 2022</p>
    </footer>
    
</body>
</html>