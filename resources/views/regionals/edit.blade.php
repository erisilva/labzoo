@extends('layouts.app')

@section('title', 'Regionais')

@section('content')
<div class="container-fluid">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('regionals.index') }}">
          Regionais
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        {{ __('Edit') }}
      </li>
    </ol>
  </nav>
</div>

<div class="container">
    <x-flash-message status='success'  message='message' />

    <form method="POST" action="{{ route('regionals.update', $regional->id) }}">
    @csrf
    @method('PUT')
    <div class="row g-3">
      <div class="col-md-8">
        <label for="nome" class="form-label">{{ __('Name') }}</label>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') ?? $regional->nome }}">
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror 
      </div>
      <div class="col-md-4">
        <label for="sigla" class="form-label">Sigla</label>
        <input type="text" class="form-control @error('sigla') is-invalid @enderror" name="sigla" value="{{ old('sigla') ?? $regional->sigla }}">
        @error('sigla')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror 
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-primary">
          <x-icon icon='pencil-square' />{{ __('Edit') }}
        </button> 
      </div>  
    </div>
   </form>
</div>

<x-btn-back route="regionals.index" />
@endsection
