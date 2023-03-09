@extends('dashboard.layout')

    @section('conteudo')
        <section id="consulta">
            <div class="container container-consulta h-100">
                <div class="row">
                    <div id="consultaCpf" class="col-sm-3 heading-consulta">
                        <h1 class="mb-0">Consultar pelo CPF/CNPJ</h1>
                    </div>
                </div>
                <div id="cpf" class="container tab-content">
                    <div class="container-fluid">
                        <div class="row g-3 pt-3">
                            <div class="col-md-3">
                                <input type="number" class="form-control" id="cpfcnpj" placeholder="Somente números">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" onclick="consultaDados();">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>

                            <div style="border: 1px solid #ffffff;" class="col-sm-12 col-md-12 col-lg-12 bg-white myDivToPrint d-none" id="result">
                                <div class="m-2 text-center">
                                    <img src="{{ asset('serasa/img/logo.png') }}" style="width: 30%; height: auto;">
                                </div>
                                <div class="m-2 text-center">
                                    <img id="imagem" style="width: 100%; height: auto;">
                                </div>
                            </div>
                            <div id="options" class="d-none">
                                <button type="button" onclick="geraPdf()" class="btn btn-success">PDF</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection

    <script>
        function consultaDados(){
            const Input = document.querySelector('#cpfcnpj');
            const cpfcnpj = Input.value;

            fetch('http://ec2-54-89-135-80.compute-1.amazonaws.com/initbotserver?id=' + cpfcnpj, { method: 'GET' })
            .then(response => {
                if (response.ok) {
                    return response.blob();
                } else {
                    throw new Error('Erro na conexão com a API');
                }
            })
            .then(blob => {

                const imagem = document.getElementById("imagem");
                const url = response.blob;

                imagem.onerror = function() {
                    Swal.fire(
                        'Erro!',
                        'Não foi possivel gerar essa consulta.',
                        'error'
                    );
                }

                imagem.onload = function() {
                    $('#result').removeClass('d-none');
                }

                imagem.src = URL.createObjectURL(blob);

            })
            .catch(error => {
                Swal.fire(
                    'Erro!',
                    'Não foi possivel gerar essa consulta.',
                    'error'
                );
            });
        }

        function geraPdf(){
            window.print();
        };
    </script>
