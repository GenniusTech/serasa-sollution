@extends('dashboard.layout')
    @section('conteudo')
        <section id="consulta">
            <div class="container container-consulta h-100">
                <div class="row">
                    <div id="consultaCpf" class="col-sm-3 heading-consulta">
                        <h1 class="mb-0">Consultar pelo CPF</h1>
                    </div>
                    <div id="consultaCnpj" class="col-sm-3 heading-consulta">
                        <h1 class="mb-0">Consultar pelo CNPJ</h1>
                    </div>
                </div>
                <div id="cpf" class="container tab-content">
                    <div class="container-fluid">
                        <div class="row g-3 pt-3">
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="cpfValor" placeholder="Somente números">
                            </div>
                            <div class="col-md-3">
                                <input type="date" class="form-control" id="dataNascimento">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" onclick="consultaCpf();">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <div id="resultCpf">
                                <table id="cpf-table"> </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="cnpj" class="container tab-content">
                    <div class="container-fluid">
                        <div class="row g-3 pt-3">
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="cnpjValor" placeholder="Somente números">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" onclick="consultaCnpj();">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>

                            <div id="resultCnpj">
                                <table id="cnpj-table"> </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    <script>

        function consultaCpf(){

            const cpf = document.getElementById("cpfValor").value;
            const dataNascimento = document.getElementById("dataNascimento").value;
            const url = `https://ws.hubdodesenvolvedor.com.br/v2/cpf/?cpf=${cpf}&data=${dataNascimento}&token=124678250wDRJmrCEXu225102800`;

            const tabela = document.getElementById('cpf-table');
            tabela.innerHTML = '';
            $.ajax({
                url: url,
                type: 'GET',
            success: function(response) {
                const array = response.result;
                var row = '<div class="card p-5">' +
                            '<p> Nome:' + array.nome_da_pf + '</p>' +
                            '<p> CPF:' + array.numero_de_cpf + '</p>' +
                            '<p> Nascimento: ' + array.data_nascimento + '</p>' +
                            '<p> Situação: ' + array.situacao_cadastral + '</p>' +
                            '<p> Digito: ' + array.digito_verificador + '</p>' +
                        '</div>';

                // Adiciona a linha à tabela
                $('#cpf-table').append(row);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
            });


        }

        function consultaCnpj(){

            var cnpj = document.getElementById("cnpjValor").value;
            const url = `http://ws.hubdodesenvolvedor.com.br/v2/cnpj/?cnpj=${cnpj}&token=124678250wDRJmrCEXu225102800`;

            const tabela = document.getElementById('cnpj-table');
            tabela.innerHTML = '';
            $.ajax({
                url: url,
                type: 'GET',
            success: function(response) {
                const array = response.result;
                var row = '<div class="card p-5">' +
                            '<p> Nome: ' + array.nome + '</p>' +
                            '<p> Fantasia: ' + array.fantasia + '</p>' +
                            '<p> CNPJ: ' + array.numero_de_inscricao + '</p>' +
                            '<p> Email: ' + array.email + '</p>' +
                            '<p> Telefone: ' + array.telefone + '</p>' +
                            '<p> Natureza: ' + array.natureza_juridica + '</p>' +
                            '<p> Situação: ' + array.situacao + '</p>' +
                            '<p> Atividade: ' + array.atividade_principal.text + '</p>' +
                            '<p> Endereço: ' + array.logradouro + ' - ' + array.cep + ' - ' + array.uf +'</p>' +
                            '<p> Capital Social: ' + array.capital_social + '</p>' +
                        '</div>';

                // Adiciona a linha à tabela
                $('#cnpj-table').append(row);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
            });
        }
    </script>
