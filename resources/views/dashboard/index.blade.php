@extends('dashboard.layout')
    @section('conteudo')
        <div id="hero" class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 align-self-center">
                        <div>
                            <h2>
                                Produtos para análise de crédito e cadastro
                            </h2>
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <!--<div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Achei-Recheque</h5>
                                            <p class="card-text">Consulta para operações com cheques.</p>
                                        </div>
                                        <div class="text-center pb-2">
                                            <a href="#modal-novo-lead" type="button" class="btn btn-light btn-sm">Saiba mais</a>
                                            <a href="" type="button" class="btn btn-primary btn-sm">Acessar</a>
                                        </div>
                                    </div>
                                </div>-->
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Relatório CPF/CNPJ</h5>
                                            <p class="card-text">Consulta completa de CPF/CNPJ com protestos, dívidas vencidas, cheques devolvidos, ações,... [+]</p>
                                        </div>
                                        <div class="text-center pb-2">
                                            <a href="#modal-novo-lead" type="button" class="btn btn-light btn-sm">Saiba mais</a>
                                            <a href="/consultaCompleta" type="button" class="btn btn-primary btn-sm">Acessar</a>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Relatório Básico PJ</h5>
                                            <p class="card-text">Consulta de CNPJ com protestos, dívidas vencidas, cheques devolvidos, Serasa Score Po... [+]</p>
                                        </div>
                                        <div class="text-center pb-2">
                                            <a href="#modal-novo-lead" type="button" class="btn btn-light btn-sm">Saiba mais</a>
                                            <a href="" type="button" class="btn btn-primary btn-sm">Acessar</a>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card-list" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">Confira as novidades do Menu de produtos que já estão disponíveis para você.</h5>
                                <ul class="list">
                                    <li>Nenhum custo adicional</li>
                                    <li>Visualize apenas os produtos contratados</li>
                                    <li>Descrições mais completas dos produtos</li>
                                    <li>Organização dos produtos por ordem alfabética</li>
                                    <li>Favorite os produtos que você mais utiliza</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 card-mobile">
                        <div>
                            <h3>
                                Produtos para encontrar novos clientes
                            </h3>
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Infobusca</h5>
                                            <p class="card-text">Solução para localização e identificação de empresas e consumidores online.</p>
                                        </div>
                                        <div class="text-center pb-2">
                                            <a href="#modal-novo-lead" type="button" class="btn btn-light btn-sm">Saiba mais</a>
                                            <a href="/consultaSimples" type="button" class="btn btn-primary btn-sm">Acessar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Criar novo Lead -->
        <div id="modal-novo-lead" class="modal-setor pt-5">
            <div class="modal-content-setor">
                <h5>Relatório Avançado PJ</h5>
                <p>
                    Consulta completa de CNPJ com protestos, dívidas vencidas, cheques devolvidos,
                    ações, falência, limite de crédito, Serasa Score Positivo, cadastro e sócios
                </p>
                <span>O que consta nesse relatório:</span>

                <ul>
                    <li><i class="bi bi-check-lg"></i>Endereço</li>
                    <li><i class="bi bi-check-lg"></i>Limite de Crédito PJ</li>
                    <li><i class="bi bi-check-lg"></i>Informações societárias completas</li>
                    <li><i class="bi bi-check-lg"></i>Identificação cadastral</li>
                    <li><i class="bi bi-check-lg"></i>Telefone e outros</li>
                    <li><i class="bi bi-check-lg"></i>Recuperação judicial e falência</li>
                    <li><i class="bi bi-check-lg"></i>Ações Judiciais</li>
                    <li><i class="bi bi-check-lg"></i>Cheques devolvidos</li>
                    <li><i class="bi bi-check-lg"></i>Antecessores</li>
                    <li><i class="bi bi-check-lg"></i>Consultas à Serasa</li>
                    <li><i class="bi bi-check-lg"></i>CNAE</li>
                    <li><i class="bi bi-check-lg"></i>Dividas em bancos e empresas</li>
                    <li><i class="bi bi-check-lg"></i>Protestos no Brasil</li>
                    <li><i class="bi bi-check-lg"></i>Serasa Score Positivo</li>
                </ul>
                <a href="#" class="modal__close">&times;</a>
            </div>
        </div>
        <!-- Modal Criar novo Lead -->
    @endsection
