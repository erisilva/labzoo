@extends('layouts.app')

@section('title', 'Tutores' . ' - ' . __('Show'))

@section('content')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('tutors.index') }}">
                        Tutores
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    {{ __('Show') }}
                </li>
            </ol>
        </nav>
    </div>




    <div class="container">
        <form action="#" method="post">


            <div class="row g-3">

                <div class="col-md-2">
                    <label for="codigo" class="form-label">ID</label>
                    <input type="text" class="form-control" name="codigo" id="codigo" value="{{ $tutor->id }}"
                        readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="datacadastro" class="form-label">Data Cadastro</label>
                    <input type="text" class="form-control" name="datacadastro" id="datacadastro"
                        value="{{ date('d/m/Y', strtotime($tutor->created_at)) }}" readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="horacadastro" class="form-label">Hora Cadastro</label>
                    <input type="text" class="form-control" name="horacadastro" id="horacadastro"
                        value="{{ date('h:m', strtotime($tutor->created_at)) }}" readonly disabled>
                </div>

                <div class="col-md-6">
                    <label for="nome" class="form-label">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name="nome" id="nome" value="{{ $tutor->nome }}"
                        readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="nascimento" class="form-label">Nascimento</label>
                    <input type="text" class="form-control" name="nascimento" id='nascimento'
                        value="{{ date('d/m/Y', strtotime($tutor->nascimento)) }}" readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $tutor->cpf }}"
                        readonly disabled>
                </div>

                <div class="col-md-2">
                  <label for="rg" class="form-label">RG</label>
                  <input type="text" class="form-control" name="rg" id="rg" value="{{ $tutor->rg}}"
                      readonly disabled>
              </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $tutor->email }}"
                        readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="cel" class="form-label">Celular</label>
                    <input type="text" class="form-control" name="cel" id="cel" value="{{ $tutor->cel }}"
                        maxlength="20" readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="tel" class="form-label">Telefone</label>
                    <input type="text" class="form-control" name="tel" id="tel" value="{{ $tutor->tel }}"
                        maxlength="20" readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="cep" class="form-label">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" value="{{ $tutor->cep }}"
                        readonly disabled>
                </div>

                <div class="col-md-4">
                    <label for="logradouro" class="form-label">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro" id="logradouro"
                        value="{{ $tutor->logradouro }}" maxlength="100" readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="numero" class="form-label">Número</label>
                    <input type="text" class="form-control" name="numero" id="numero"
                        value="{{ $tutor->numero }}" maxlength="10" readonly disabled>
                </div>

                <div class="col-md-4">
                    <label for="complemento" class="form-label">Complemento</label>
                    <input type="text" class="form-control" name="complemento" id="complemento"
                        value="{{ $tutor->complemento }}" maxlength="100" readonly disabled>
                </div>

                <div class="col-md-3">
                    <label for="bairro" class="form-label">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro"
                        value="{{ $tutor->bairro }}" maxlength="80" readonly disabled>
                </div>

                <div class="col-md-3">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade"
                        value="{{ $tutor->cidade }}" maxlength="80" readonly disabled>
                </div>

                <div class="col-md-2">
                    <label for="uf" class="form-label">UF</label>
                    <input type="text" class="form-control" name="uf" id="uf"
                        value="{{ $tutor->uf }}" maxlength="2" readonly disabled>
                </div>

                <div class="col-md-3">
                    <label for="cns" class="form-label">Cartão Nacional de Saúde</label>
                    <input type="text" class="form-control" name="cns" value="{{ $tutor->cns }}"
                        id="cns" maxlength="15" readonly disabled>
                </div>

                <div class="col-12">
                    <label for="nota">Notas</label>
                    <textarea class="form-control" name="nota" id="nota" rows="3" readonly disabled>{{ $tutor->nota }}</textarea>
                </div>
        </form>
    </div>



    @can('tutor-delete')
        <x-btn-trash />
    @endcan

    <x-btn-back route="tutors.index" />

    @can('tutor-delete')
        <x-modal-trash class="modal-sm">
            <form method="post" action="{{ route('tutors.destroy', $tutor->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <x-icon icon='trash' /> {{ __('Delete this record?') }}
                </button>
            </form>
        </x-modal-trash>
    @endcan

@endsection
