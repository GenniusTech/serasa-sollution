@extends('layout')
    @section('conteudo')
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <form class="login100-form validate-form" method="POST" action="{{ route('auth') }}">
                        <input type="hidden" value={{  csrf_token() }} name="_token">
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('serasa/img/logo.png') }}" alt="" class="w-50">
                        </div>
                        <span class="login100-form-title p-b-43 pb-3">
                            Acessar minha área
                        </span>
                        <div>
                            @if($mensagem = Session::get('erro'))
                                {{ $mensagem }}
                            @endif
                            @if ($errors->any())
                            <div style="background-color: rgb(227, 112, 112); color:white;text-align: center; border-radius:5px;">
                                <ul class="alert alert-error">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                            <label for="floatingInput">E-mail</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" placeholder="Senha">
                            <label for="floatingPassword">Senha</label>
                        </div>
                        {{-- <div class="d-inline-flex pt-3">
                            <a href="#" class="pe-5 password">Esqueci minha senha</a>
                            <input
                                class="form-check-input"
                                type="checkbox"
                                value=""
                                id="defaultCheck1"
                            >
                            <label class="form-check-label ps-1" for="defaultCheck1">
                                Mantenha-me conectado
                            </label>
                        </div> --}}
                        <div class="d-grid gap-2 pt-4 button-login">
                            <button class="btn btn-primary" type="submit">Acessar</button>
                        </div>
                    </form>
                    <div class="login100-more" style="background-image: url({{ asset('serasa/img/fundo_serasa.jpg')}});">
                        <div class="container">
                            <div class="row">
                                <h2>Acesso aos produtos</h2>
                                <p>Olá, Seja bem-vindo</p>
                            </div>
                            <div class="row portais gy-3">
                                <span>Conheça outros portais exclusivos</span>
                                <div class="col-6">
                                    <div class="p-3 portais-item">
                                        <img src="assets/img/certificate_icon.svg" alt="" width="30px">
                                        Soluções para empresas
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 portais-item">
                                        <img src="assets/img/big_data_icon.svg" alt="" width="30px">
                                        Soluções de marketing
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 portais-item">
                                        <img src="assets/img/credit_card_icon.svg" alt="" width="30px">
                                        Certificado digital
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 portais-item">
                                        <img src="assets/img/profile_icon.svg" alt="" width="30px">
                                        Soluções para consumidores
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
