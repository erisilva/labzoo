@extends('layouts.app')

@section('title', 'Tutores' . ' - ' . __('New'))

@section('css-header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tutors.index') }}">Tutores</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('New') }}
                </li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <form method="POST" action="{{ route('tutors.store') }}">
            @csrf
            <div class="row g-3">

                <div class="col-md-6">
                    <label for="nome" class="form-label">{{ __('Name') }} <strong
                            class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
                        id="nome" value="{{ old('nome') ?? '' }}" maxlength="180">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="nascimento" class="form-label">Nascimento <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('nascimento') is-invalid @enderror" name="nascimento"
                        id='nascimento' value="{{ old('nascimento') ?? '' }}">
                    @error('nascimento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="cpf" class="form-label">CPF <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                        id="cpf" value="{{ old('cpf') ?? '' }}">
                    @error('cpf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="rg" class="form-label">RG <strong class="text-info">(Opcional)</strong></label>
                    <input type="text" class="form-control @error('rg') is-invalid @enderror" name="rg"
                        id="cpf" value="{{ old('rg') ?? '' }}">
                    @error('rg')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Contatos --}}

                <div class="col-md-2">
                    <label for="cel" class="form-label">Celular <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('cel') is-invalid @enderror" name="cel"
                        id="cel" value="{{ old('cel') ?? '' }}" maxlength="20">
                    @error('cel')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="tel" class="form-label">Telefone <strong class="text-info">(Opcional)</strong></label>
                    <input type="text" class="form-control" name="tel" id="tel" value="{{ old('tel') ?? '' }}"
                        maxlength="20">
                </div>

                <div class="col-md-3">
                    <label for="email" class="form-label">E-mail <strong class="text-info">(Opcional)</strong></label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        id="email" value="{{ old('email') ?? '' }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="cep" class="form-label">CEP <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('cep') is-invalid @enderror" name="cep"
                        id="cep" value="{{ old('cep') ?? '' }}">
                    @error('cep')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="logradouro" class="form-label">Logradouro <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro"
                        id="logradouro" value="{{ old('logradouro') ?? '' }}" maxlength="100">
                    @error('logradouro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="numero" class="form-label">Número <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('numero') is-invalid @enderror" name="numero"
                        id="numero" value="{{ old('numero') ?? '' }}" maxlength="10">
                    @error('numero')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="complemento" class="form-label">Complemento <strong
                            class="text-info">(Opcional)</strong></label>
                    <input type="text" class="form-control" name="complemento" id="complemento"
                        value="{{ old('complemento') ?? '' }}" maxlength="100">
                </div>

                <div class="col-md-3">
                    <label for="bairro" class="form-label">Bairro <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro"
                        id="bairro" value="{{ old('bairro') ?? '' }}" maxlength="80">
                    @error('bairro')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="cidade" class="form-label">Cidade <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('cidade') is-invalid @enderror" name="cidade"
                        id="cidade" value="{{ old('cidade') ?? 'Contagem' }}" maxlength="80">
                    @error('cidade')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="uf" class="form-label">UF <strong class="text-danger">(*)</strong></label>
                    <input type="text" class="form-control @error('uf') is-invalid @enderror" name="uf"
                        id="uf" value="{{ old('uf') ?? 'MG' }}" maxlength="2">
                    @error('uf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="cns" class="form-label">Cartão Nacional de Saúde <strong
                            class="text-info">(Opcional)</strong></label>
                    <input type="text" class="form-control" name="cns" value="{{ old('cns') ?? '' }}"
                        id="cns" maxlength="15">
                </div>

                <div class="col-12">
                    <label for="nota">Notas <strong
                      class="text-info">(Opcional)</strong></label>
                    <textarea class="form-control" name="nota" id="nota" rows="2">{{ old('nota') ?? '' }}</textarea>
                </div>



                <div class="col-12">
                    <button type="submit" class="btn btn-primary"><x-icon icon='plus-circle' />
                        {{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </div>

    <x-btn-back route="tutors.index" />
@endsection

@section('script-footer')
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('locales/bootstrap-datepicker.pt-BR.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $("#cel").inputmask({
                "mask": "(99) 99999-9999"
            });
            $("#tel").inputmask({
                "mask": "(99) 9999-9999"
            });
            $("#cep").inputmask({
                "mask": "99.999-999"
            });
            $("#cpf").inputmask({
                "mask": "999.999.999-99"
            });
            $('#nascimento').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                clearBtn: true,
                language: "pt-BR",
                autoclose: true,
                todayHighlight: true
            });


            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }

            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if (validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });
    </script>

@endsection

