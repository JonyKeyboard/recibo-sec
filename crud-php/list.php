<?php
include_once "conexao.php";

$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)){

    //Calculando o inicio da visualização
    $qnt_result_pg = 10;
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;

    $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    $dados = "<div class='table-responsive'>
                <table class='table table-striped table-bordered'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>";
    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
        //var_dump($row_usuario);
        extract($row_usuario);
        $dados .= "<tr>
                        <td>$id</td>
                        <td>$nome</td>
                        <td>$email</td>
                        <td>Ações</td>          
                    </tr>";
    }

    $dados .= "</tbody>
                </table>
                    </div>";
    
    // paginação - soma da quantidade de users
    $query_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
    $result_pg = $conn->prepare($query_pg);
    $result_pg->execute();
    $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

    //Quantidade de paginas
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $dados .= '<nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>';                

    echo $dados;

}else {
    echo "<div class='alert alert-danger' role='alert'>
            Não foi encontrado nenhum registro!
         </div>";
}