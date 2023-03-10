@extends('dashboard.layout')

    @section('conteudo')
        <section id="consulta">
            <div class="container container-consulta">
                <div class="row">
                    <div id="consultaCpf" class="col-sm-12 col-md-12 col-lg-12 heading-consulta">
                        <h1 class="mb-0">Consultar pelo CPF/CNPJ</h1>
                    </div>
                </div>
                <div id="cpf" class="container tab-content">
                    <div class="container-fluid">
                        <div class="row g-3 pt-3">
                            <form action="{{ route('consultaApi') }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <input type="number" name="id" class="form-control" placeholder="Somente números">
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-3">
                                        <button type="submit">
                                            <i class="bi bi-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                @if (isset($base64Image))
                <div style="border: 1px solid #ffffff; min-height: 600px;"  class="row bg-white">
                    <div class="col-sm-12 col-md-12 col-lg-12 myDivToPrint" id="result">
                        <div class="m-2 text-center">
                            <img src="{{ asset('serasa/img/logo.png') }}" style="width: 30%; height: auto;">
                        </div>
                        <div class="m-2 text-center">
                            <img id="imgConsulta" src="data:image/jpeg;base64,{{ $base64Image }}" style="width: 60%; height: auto;">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                        <button type="button" onclick="geraPdf()" class="btn btn-success">GERAR PDF</button>
                    </div>
                </div>
                @endif
                @if (isset($erro))
                    <div style="border: 1px solid #ffffff;"  class="row bg-white">
                        <div class="col-sm-12 col-md-12 col-lg-12 myDivToPrint" id="result">
                            <div class="m-2 text-center">
                                <img src="{{ asset('serasa/img/logo.png') }}" style="width: 30%; height: auto;">
                            </div>
                            <div class="m-2 text-center">
                                <p>{{ $erro }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endsection

    <script>
        function geraPdf(){
            window.print();
        };

        window.addEventListener('load', function() {
            const imagem = document.getElementById('imgConsulta');
            console.log(imagem.offsetHeight);
            const pequena = 583;
            const media = 682;
            const longa = 2000;

            if(imagem.offsetHeight <= pequena){
                imagem.classList.add('pequena');
            }

            if(imagem.offsetHeight > pequena && imagem.offsetHeight <= media){
                imagem.classList.add('media');
            }

            if(imagem.offsetHeight > media && imagem.offsetHeight <= longa){
                imagem.classList.add('longa');
            }

        });
    </script>
