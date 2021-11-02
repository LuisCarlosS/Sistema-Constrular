function enviarDados(){
    let nome = document.getElementById("nome")
    let precocompra = document.getElementById("precocompra")
    let precovenda = document.getElementById("precovenda")
    let estoque = document.getElementById("estoque")
    let categoria = document.getElementById("categoria")

    let msgError = ''
    if(nome.value.trim() == ""){
        msgError += "Preencha o campo nome<br>"
        nome.style.border = '1px solid #f00'
    }else{
        nome.style.border = '1px solid #000'
    }

    if(precocompra.value.trim() == ""){
        msgError += "Preencha o campo preço de compra<br>"
        precocompra.style.border = '1px solid #f00'
    }else{
        precocompra.style.border = '1px solid #000'
    }

    if(precovenda.value.trim() == ""){
        msgError += "Preencha o campo preço de venda<br>"
        precovenda.style.border = '1px solid #f00'
    }else{
        precovenda.style.border = '1px solid #000'
    }

    if(estoque.value.trim() == ""){
        msgError += "Preencha o campo estoque<br>"
        estoque.style.border = '1px solid #f00'
    }else{
        estoque.style.border = '1px solid #000'
    }

    if(categoria.value.trim() == ""){
        msgError += "Preencha o campo categoria<br>"
        categoria.style.border = '1px solid #f00'
    }else{
        categoria.style.border = '1px solid #000'
    }

    if(msgError != ''){
        document.getElementById("resposta").innerHTML = msgError
    }else{
        document.getElementById("resposta").innerHTML = ''
        alert("Dados enviados com sucesso")
    }
}

document.getElementById("btn").addEventListener("click", enviarDados)
