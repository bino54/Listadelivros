


function stringContida(string1, string2) {
    // Converte ambas as strings para minúsculas antes de comparar
    var str1LowerCase = string1.toLowerCase();
    var str2LowerCase = string2.toLowerCase();

    // Verifica se a string2 está contida na string1 (agora em minúsculas)
    return str1LowerCase.includes(str2LowerCase);
}




function botaoclicado(produtos){
    var texto = document.getElementById("inputsearch").value;
    if(texto ===""){
        alert("O campo de entrada está vazio");
    }else{
        document.getElementById("teste").innerHTML="";
        //console.log(produtos);
        let array = [];
        for(let i=0;i < produtos.length; i++){
            if(stringContida(produtos[i].descricao,texto) || stringContida(produtos[i].nomedolivro,texto)){
                console.log(produtos[i].descricao);
                array.push(produtos[i]);
                console.log(array);
            }
        }
        inserirnatabela(array);

    }
}

function inserirnatabela(produtos){
    var tbody = document.getElementById("teste");
    for(let i=0;i<produtos.length;i++){
        var row = document.createElement("tr");
        var cellid = document.createElement("th");
        cellid.scope = "row";
        cellid.textContent = produtos[i].id;
        var cellimg = document.createElement("td");
        var imagem = document.createElement("img");
        imagem.src = produtos[i].imagem;
        imagem.width = 200;
        imagem.heigth = 200;
        cellimg.appendChild(imagem);
        var cellnomedolivro = document.createElement("td");
        cellnomedolivro.textContent = produtos[i].nomedolivro;
        var cellautor = document.createElement("td");
        cellautor.textContent = produtos[i].autor;
        var celldescricao = document.createElement("td");
        celldescricao.textContent = produtos[i].descricao;
        var celltipodelivro = document.createElement("td");
        celltipodelivro.textContent = "Meu";
        var cellpreco = document.createElement("td");
        cellpreco.textContent = "24,90";
        var cellaccoes = document.createElement("td");
        var button1 = document.createElement("button");
        var button2 = document.createElement("button");
        button1.textContent = "Resumo";
        button1.className = "btn btn-success";
        button2.textContent = "Apagar";
        button2.className = "btn btn-danger";
        cellaccoes.appendChild(button1);
        cellaccoes.appendChild(button2);

        row.appendChild(cellid);
        row.appendChild(cellimg);
        row.appendChild(cellnomedolivro);
        row.appendChild(cellautor);
        row.appendChild(celldescricao);
        row.appendChild(celltipodelivro);
        row.appendChild(cellpreco);
        row.appendChild(cellaccoes);
        tbody.appendChild(row);
    }
}






function enviarajax2(produto){
    var xhr = new XMLHttpRequest();
    var url = "receber_post_json.php";


    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log("Resposta do servidor:", xhr.responseText);
                document.getElementById('result').innerHTML = xhr.responseText;
                produto.id = xhr.responseText;
            } else {
                console.log("Ocorreu um erro na solicitação.");
            }
        }
    };

    xhr.send(JSON.stringify(pedido));
}




function enviarpagina(produto){
    var objetoJSON =JSON.stringify(produto);

    window.location.href = "resumo.php?objeto=" + encodeURIComponent(objetoJSON);
}
































