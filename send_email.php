<?php

$errors = [];

if (!empty($_POST)) {
  $name = $_POST['inputNome'];
  $date = $_POST['inputDate'];
  $CPF = $_POST['inputCPF'];
 
  if (empty($name)) {
      $errors[] = 'Nome está vazio';
  }

  if (empty($date)) {
      $errors[] = 'Não selecionou a data';
  }
  if (empty($CPF)) {
      $errors[] = 'Inserir CPF';
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $name = isset($_POST['inputNome']) ? strip_tags(trim($_POST['name'])) : '';
    $date = isset($_POST['inputDate']) ? trim($_POST['inputDate']) : '';
    $CPF = isset($_POST['inputCPF']) ? strip_tags(trim($_POST['inputCPF'])) : '';

    // Validar campos do formulário
    if (empty($name)) {
        $errors[] = 'Nome está vazio';
    }

    if (empty($date)) {
        $errors[] = 'Data está vazio';
    }

    if (empty($CPF)) {
        $errors[] = 'CPF está vazio';
    }

    // Se não houver erros, enviar email
    if (empty($errors)) {
        // Endereço de email do destinatário (substitua pelo seu próprio)
        $recipient = "luanaavalimm@hotmail.com";

        // Cabeçalhos adicionais
        $headers = "From: $name";

        // Enviar email
        if (mail($recipient, $CPF, $headers)) {
            echo "Formulário enviado com sucesso!";
        } else {
            echo "Envio de formulário falhou. Por favor tente novamente mais tarde.";
        }
    } else {
        // Exibir erros
        echo "O formulário possui os seguintes erros:<br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }
} else {
    // Solicitação não é POST, exibir erro 403 proibido
    header("HTTP/1.1 403 Forbidden");
    echo "Não tem permissões para aceder a esta página.";
}
?>