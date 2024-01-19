<?php

session_start(); // Iniciar a sessao
ob_start();

// Incluir a conexao com BD
include_once "conexao.php";

// Receber o ID do usuario
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
//$id = 100;

if ($id) {
    try {
        // QUERY para recuperar as informacoes do usuario
        $query_usuario = "SELECT imagem FROM produtos WHERE id=:id LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':id', $id);
        $result_usuario->execute();

        // Acessa o IF quando encontrar o usuario no BD
        if (($result_usuario) and ($result_usuario->rowCount() != 0)) {
            $query_apagar_usuario = "DELETE FROM produtos WHERE id=:id LIMIT 1";
            $apagar_usuario = $conn->prepare($query_apagar_usuario);
            $apagar_usuario->bindParam(':id', $id);

            // Acessa o IF quando excluir o registro com sucesso
            if ($apagar_usuario->execute()) {
                // Ler as informcoes do usuario
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                extract($row_usuario);

                // Verificar se existe o nome da imagem salva no banco de dados
                if(!empty($imagem)){
                    $diretorio = "imagens/$id";
                    $img = "imagens/$id/$imagem";

                    // Apagar a imagem
                    if(file_exists($img)){
                        unlink($img);
                    }

                    // Apagar o diretorio
                    if(file_exists($diretorio)){
                        rmdir($diretorio);
                    }
                }
                $_SESSION['msg'] = "<center><p style='color: green;'>Produto apagado com sucesso!</p>";
                header("Location: index.php");
            } else {
                $_SESSION['msg'] = "<center><p style='color: #f00;'>Erro: Produto não apagado com sucesso!</p>";
                header("Location: index.php");
            }
        } else {
            $_SESSION['msg'] = "<center><p style='color: #f00;'>Erro: Produto não encontrado!</p>";
            header("Location: index.php");
        }
    } catch (Exception $erro) {
        $_SESSION['msg'] = "<center><p style='color: #f00;'>Erro: Produto não apagado com sucesso!</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<center><p style='color: #f00;'>Erro: Produto não encontrado!</p>";
    header("Location: index.php");
}
