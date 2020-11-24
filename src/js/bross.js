function enviarFormBross() {
                var elements = document.getElementById("formBross").elements;
                var obj ={};
                for(var i = 0 ; i < elements.length ; i++){
                    var item = elements.item(i);
                    if(item.name !== 'botao') {
                        obj[item.name] = item.value;
                    }
                }
                obj = JSON.stringify(obj)
                var response = grecaptcha.getResponse();
                if(response.length == 0) 
                { 
                    alert("Preencha o Recaptcha"); 
                    return false;
                } else {
                    var el = document.querySelector('.formularioBross');
                    var div = document.createElement('div');
                    div.setAttribute('class','enviando');
                    el.prepend(div)
                    fetch("src/php/contatoEnvia.php", {
                        method: "POST", 
                        headers: {
                           "Content-Type": "application/json"
                        },    
                        body: obj
                    }).then(res => {
                        div.remove()
                        document.getElementById("formBross").reset();
                        alert('Enviado com Sucesso');
                    });
                }
                return false;
            }
        