<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>

    <div class="container" id="lista"></div>

    <script>
        //selecionando a div onde a lista sera exibida
        let lista = document.getElementById('lista');
        
        let funcionario = { };


        function getFuncionarios(){
                isLoading = true;

            fetch('http://localhost/API-PWII/backend/listar_funcionarios.php',
                {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }
            )
            .then(response => response.json())
            .then(response => {
                
                response.funcionarios.forEach(fun => {
                    // montando o visual da lista
                    let row = document.createElement('div');
                    row.classList.add('row');
                    row.setAttribute('id', fun.CodFun);
                    row.setAttribute('onclick', 'alert("Funcionario ' + fun.Nome + ' selecionado de id ' + fun.CodFun + '")');

                    let col = document.createElement('div');
                    col.classList.add('col-12');

                    let p = document.createElement('p');
                    p.innerText = fun.CodFun + ' - ' + fun.Nome;

                    col.appendChild(p);
                    row.appendChild(col);
                    lista.appendChild(row);
                });

            })
            .catch(erro => {
                console.log(erro);
            })
            .finally(()=>{
                isLoading = false;
            })
        }

        getFuncionarios(); // Buscar Dados
    </script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>    
</body>
</html>