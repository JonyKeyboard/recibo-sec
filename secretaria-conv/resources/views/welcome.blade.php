<!DOCTYPE html>
<html lang="pt-BR">
    <head>

    </head>
    <body>
<!--------------------------TESTE--------------------------->

        <form method="POST" action="" enctype="multipart/form-data">

            <input type="file" name="imagem" id="imagem" onchange="previewImagem()"/>
            <input type="submit" value="Cadastrar">

        </form>



        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            function previewImagem(){
                var imagem = document.querySelector('input[name=imagem]').files[0];
                var preview = document.querySelector('img');

                var reader = new FileReader();

                reader.onloadend = function(){
                    preview.src = reader.result;
                }

                if(imagem){
                    reader.readAsBinaryString(imagem);
                }else{
                    preview.src = "";
                }

            }
        </script>

    </body>
</html>
