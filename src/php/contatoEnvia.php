<?php 
/* Envio de E-mail mail()
Arquivo contatoEnvia.php - PHP
criado: 21/1/2020
atualizado: 21/11/2020
Criado por: @BrossLightyear
@copyright 2020 Bross
@author Mario Veiga <mariovpirani@gmail.com>
www.tosempreai.com.br
instagram: @mariovpirani
 ***********************************************************
 */
require_once "recaptcha.php";

// ALTERAR COM SUA CHAVE RECAPTCHA
$secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
 
// Alterar Aqui
$site = "www.suaurl.com.br";
$nomeEmpresa = "Sua Empresa";
$telefoneEmpresa = "Seu Telefone";
$urlLogo = "http://tosempreai.com.br/wp-content/uploads/2017/06/tosempreai.png";
//AQUI ENVIO O PRIMEIRO EMAIL PARA O DESTINATARIO
$seuEmail = "seuemailaqui@gmail.com";








// *************************
// Não alterar pra baixo
// empty response

$bross = json_decode(file_get_contents('php://input'), true);

$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);
// if submitted check response
if ($bross['g-recaptcha-response']) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $bross['g-recaptcha-response']
    );
}

if ($response != null && $response->success) {
    $bross = array_slice($bross, 0, -1);
    $texto = "<h4>Formulário</h4><br>";
    foreach ($bross as $key => $value) {
        $texto .= "<b>".ucfirst($key)."</b>: ".$value.'<br>';
    }
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From:" . $bross['email'] . "\r\n";
    mail($seuEmail, $bross['assunto'], $texto, $headers);

    //AQUI ENVIO O PARA O CLIENTE
    $headers2 = "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers2 .= "From:" . $seuEmail . " \r\n";
    $texto .= "Seu e-mail foi recebido por um de nossos atendentes<br>
                Em breve será respondido!<br>
                <br>
                Departamento Comercial ".$nomeEmpresa."<br>
                ".$site."<br>
                ".$telefoneEmpresa."<br>
                <br>
                ";
    if (!empty($urlLogo)) {
        $texto .= "<img src='".$urlLogo."'>";
    }
    mail($bross['email'], 'RE: '.$bross['assunto'], $texto, $headers2);
    return json_encode(http_response_code(200));
} else {
    return json_encode(http_response_code(401));
}

?>