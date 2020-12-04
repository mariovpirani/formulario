# Formulário em Javascript e PHP com autenticação Recaptcha
Formulário Javacript + Recaptcha + PHP 

Esse formulário foi criado para facilitar a vida dos iniciantes em programação.<br>
Utilizei SASS, HTML, Javascript PURO e PHP nesse form.

Não necessita de jquery nem bootstrap

### Em breve irei disponibilizar um form dinâmico.

## Demo
https://tosempreai.com.br/git/formulario/

## Recaptcha Google 
https://www.google.com/recaptcha/admin/

## COMO USAR ??
Nesse modelo é utilizado o mail() do php

## Arquivos / Tree

├── index.html<br>
├── src<br>
│   css<br>
│   ├── formulario.css<br>
│   js<br>
│   ├── bross.js<br>
│   php<br>
│   ├── recaptcha.php<br>
│   └── contatoEnvia.php<br>
│   imagens<br>
│   ├── 200.gif<br>

### Passos

- [ ] Alterar Recaptcha do código html
- [ ] Alterar no php todas informações referente a sua empresa
    - [ ] $secret = "suachavevaiaqui";
    - [ ] $site = "www.suaurl.com.br";
    - [ ] $nomeEmpresa = "Sua Empresa";
    - [ ] $telefoneEmpresa = "Seu Telefone";
    - [ ] $urlLogo = "http://tosempreai.com.br/wp-content/uploads/2017/06/tosempreai.png";
    - [ ] $seuEmail = "seuemailaqui@gmail.com";

### O que devo fazer para utiliza-lo?
Basta copiar todo conteúdo da div

### Passo 1

- [ ] Passo 1

```HTML
<div class="formularioBross">
    <form id="formBross" onsubmit="return(enviarFormBross());" method="POST">
        <input class="inputBross" name="nome" placeholder="Nome" required>
        <input class="inputBross" name="email" placeholder="E-mail" required type="email">
        <input class="inputBross" name="whatsapp" placeholder="Whatsapp" required>
        <select name="assunto" class="selectBross" required>
            <option disabled selected>-- Assunto</option>
            <option value="Orçamento" >Orçamento</option>
            <option value="Contato" >Contato</option>
        </select>
        <textarea class="textareaBross" name="mensagem" placeholder="Digite sua mensagem" ></textarea>
        <div class="recaptchaBross">
        <span class="g-recaptcha" id="rcaptcha"  data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></span>
        </div>
        <button type="submit" name="botao" >Enviar Contato</button>
    </form>
</div>
```
Alterar o **data-sitekey** com seu [Recaptcha](https://www.google.com/recaptcha/admin/)


### Passo 2

- [ ] Passo 2
Alterar as **variaveis** do arquivo (src/php/contatoEnvia.php)
    ### Chave Secreta
    - [ ] $secret = "suachavevaiaqui";
    ### Seu site
    - [ ] $site = "www.suaurl.com.br";
    ### Nome da Empresa
    - [ ] $nomeEmpresa = "Sua Empresa";
    ### Telefone de sua empresa (11) 1111-1111
    - [ ] $telefoneEmpresa = "Seu Telefone";
    ### Url de seu logo ou deixe em branco
    - [ ] $urlLogo = "";
    ### Seu E-mail
    - [ ] $seuEmail = "seuemailaqui@gmail.com";

### Passo 3
Instanciar o js, css e recaptcha
```HTML
<link rel="stylesheet" href="src/css/formulario.css">
<script src="https://www.google.com/recaptcha/api.js" async defer> </script>
<script src="src/js/bross.js" async defer> </script>
```

### Caso queira colocar novos input basta seguir os passos abaixo

Inserir entre os input 
```
<input class="inputBross" name="nomedocampo" placeholder="Nome do Campo" required>
```
inserir o input alterando o **name** e o **placeholder** - apenas isso

### LEMBRANDO que o php irá reconhecer o campo automáticamente na hora do disparo


### NÃO EXCLUIR CAMPO NOME, EMAIL E ASSUNTO SÃO NECESSÁRIOS PARA UM BOM FUNCIONAMENTO


# Pronto para usar
Mario Veiga - @mariovpirani<br>
Bross Lightyear - @brosslightyear<br>



