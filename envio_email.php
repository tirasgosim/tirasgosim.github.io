<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Pega os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Validação simples
    if(empty($nome) || empty($email) || empty($mensagem)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    // Configurações do email
    $destinatario = "emaildestino@exemplo.com"; // Substitua com o email de destino
    $assunto = "Nova mensagem de contato de $nome";

    // Cria o corpo do email
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Mensagem: $mensagem\n";

    // Cabeçalhos do email
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Envia o email
    if(mail($destinatario, $assunto, $corpo, $headers)) {
        echo "Email enviado com sucesso!";
    } else {
        echo "Falha ao enviar o email.";
    }
}
?>
