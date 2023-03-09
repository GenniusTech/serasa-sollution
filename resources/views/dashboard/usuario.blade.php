@extends('dashboard.layout')
    @section('conteudo')

            <div id="creditos" class="container container-creditos h-100">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 p-5">
                        <h2>
                            USUÁRIOS
                            <hr>
                        </h2>
                        <div class="row">
                            <div id="consultaCpf" class="col-sm-6 heading-consulta">
                                <h1 class="mb-0">Cadastrar novo usuário</h1>
                            </div>
                            <div id="consultaCnpj" class="col-sm-6 heading-consulta">
                                <h1 onclick="listUser();" class="mb-0">Listagem de usuários</h1>
                            </div>
                        </div>
                        <div id="cpf" class="container tab-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-8 pt-2">
                                        <input type="text" name="name" class="form-control" placeholder="Nome">
                                    </div>
                                    <div class="col-sm-8 pt-2">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="col-sm-8 pt-2">
                                        <input type="text" name="password" class="form-control" placeholder="Senha">
                                    </div>
                                    <div class="col-sm-8 pt-2">
                                        <select id="tipo" class="form-select">
                                            <option selected>Tipo</option>
                                            <option value="1">Admin</option>
                                            <option value="2">Consultor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="pt-4">
                                    <a type="button" onclick="newUser();" class="btn btn-success">Cadastrar</a>
                                </div>
                            </div>
                        </div>
                        <div id="cnpj" class="container tab-content">
                            <div class="container-fluid">
                                <div style="overflow-x:auto;" id="tabela" class="pt-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endsection

    <script>

        function listUser() {

            const tabela = document.querySelector('#tabela');

            fetch('http://127.0.0.1:8000/api/listUser')
            .then(resposta => resposta.json())
            .then(dados => {
                console.log(dados);
                const tabelaHTML = `
                <table class="table w-100">
                    <thead>
                    <tr>
                        <th scope="row">Nome</th>
                        <th>Email</th>
                        <th class="text-center">Consultas</th>
                        <th class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    ${dados.map(item => `
                        <tr>
                        <td>${item.name}</td>
                        <td>${item.email}</td>
                        <td class="text-center">${item.consultas}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger options" onclick="dellUser(${item.id})"> <i class="bi bi-trash"></i> </button>
                        </td>
                        </tr>
                    `).join('')}
                    </tbody>
                </table>
                `;

                tabela.innerHTML = tabelaHTML;
            })
            .catch(erro => console.log(erro));
        };

        function newUser() {

            let password = $('input[name=password]').val();

            if(password.length < 6){
                Swal.fire(
                    'Erro!',
                    'A senha precisa obter no mínimo 6 caracteres',
                    'error',
                );
            }else{
                fetch('http://127.0.0.1:8000/api/addUser', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        name:       $('input[name=name]').val(),
                        email:      $('input[name=email]').val(),
                        password:   $('input[name=password]').val(),
                        tipo:       $('#tipo option:selected').val(),
                        consultas:  500,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire(
                        'Sucesso!',
                        data.message,
                        'success',
                    );
                    $(':input').val('');
                })
                .catch(error => {
                    console.log(error);
                    Swal.fire(
                        'Erro!',
                        'Tente novamente mais tarde!',
                        'error',
                    );
                });
            }

        }

        function dellUser(id) {

            fetch(`http://127.0.0.1:8000/api/dellUser/${id}`, {
                method: 'DELETE',
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao deletar entidade');
                }
                Swal.fire(
                    'Sucesso!',
                    response.message,
                    'success',
                );

                listUser();
            })
            .catch(error => {
                Swal.fire(
                    'Erro!',
                    'Tente novamente mais tarde!',
                    'error',
                );
            });

        }

    </script>
